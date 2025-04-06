<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Image;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleEdit extends Component
{
    use WithFileUploads;

    public $article;         // Istanza dell'articolo da modificare
    public $title;
    public $description;
    public $price;
    public $category;        // ID della categoria selezionata

    public $newImages = [];  // Nuove immagini caricate
    public $temporary_images; // Per il binding dei file upload
    public $oldImages;       // Collezione di record Image già esistenti

    public $categories;      // Lista delle categorie per il dropdown

    public function mount(Article $article)
    {
        $this->article     = $article;
        $this->title       = $article->title;
        $this->description = $article->description;
        $this->price       = $article->price;
        $this->category    = $article->category_id;
        $this->oldImages   = $article->images; // Assumi che Article abbia una relazione hasMany Images
        $this->categories  = Category::all();
    }

    // Quando vengono caricati file temporanei, li aggiunge a newImages
    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images'   => 'max:6',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->newImages[] = $image;
        }
    }

    // Rimuove una nuova immagine dall'elenco (prima dell'upload)
    public function removeImage($key)
    {
        if (array_key_exists($key, $this->newImages)) {
            unset($this->newImages[$key]);
        }
    }

    // Aggiorna l'articolo e gestisce l'upload e la pipeline dei job per le immagini nuove
    public function updateArticle()
{
    $this->validate([
        'title'       => 'required|min:5',
        'description' => 'required|min:10',
        'price'       => 'required|numeric',
        'category'    => 'required|exists:categories,id',
        'newImages.*' => 'image|max:1024',
    ]);

    // Aggiorna i campi base dell'articolo
    $this->article->update([
        'title'       => $this->title,
        'description' => $this->description,
        'price'       => $this->price,
        'category_id' => $this->category,
    ]);

    // Gestione delle nuove immagini caricate
    if (count($this->newImages) > 0) {
        foreach ($this->newImages as $image) {
            $folder = "articles/{$this->article->id}";
            $path = $image->store($folder, 'public');

            $newImage = $this->article->images()->create([
                'path' => $path,
            ]);

            // Dispatcha la chain dei job per processare l'immagine in background
            RemoveFaces::withChain([
                new ResizeImage($newImage->path, 300, 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)
            ])->dispatch($newImage->id);
        }
        // Pulisce la cartella temporanea usata da Livewire
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
        $this->reset('newImages');
        $this->oldImages = $this->article->fresh()->images;
    }

    // Notifica all'utente che l'articolo è stato aggiornato e che l'elaborazione delle immagini avviene in background
    session()->flash('success', 'Articolo aggiornato correttamente! Nota: l\'elaborazione delle immagini avviene in background, attendi qualche secondo e aggiorna la pagina per vedere le modifiche.');

    return redirect()->route('article.show', $this->article->id);
}

    // Rimuove un'immagine già esistente: cancella sia il file fisico che il record nel database
    public function removeOldImage($imageId)
    {
        $img = $this->article->images()->find($imageId);
        if ($img) {
            Storage::disk('public')->delete($img->path);
            $img->delete();
            $this->oldImages = $this->article->fresh()->images;
        }
    }

    public function render()
    {
        // Se usi un layout Blade personalizzato, puoi includerlo direttamente nella view
        return view('livewire.article-edit')->layout('components.layout');
    }
}