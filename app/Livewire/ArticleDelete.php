<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleDelete extends Component
{

    public $article;

    public function deleteArticle(){
        if ($this->article->user->id == Auth::id()) {
            $articleName = $this->article->title;
            if ($this->article->images->count()) {
                Storage::delete($this->article->images);
            }
            $this->article->delete();
            return redirect()->route('homepage')->with('successMessage', 'Articolo "' . $articleName .  '" eliminato');
        } else {
            return redirect()->route('homepage')->with('errorMessage', 'Non disponi delle autorizzazioni per cancellare questo articolo');
        }
    }

    public function render()
    {
        return view('livewire.article-delete');
    }
}