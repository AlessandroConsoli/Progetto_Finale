<div class="container my-5">
    <h1 class="text-center mt-custom">Modifica Articolo</h1>
    
    <form wire:submit.prevent="updateArticle">

        {{-- Titolo --}}
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control body-bg border border-2 border-dark rounded shadow" wire:model.defer="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label class="form-label">Descrizione</label>
            <textarea class="form-control body-bg border border-2 border-dark rounded shadow" wire:model.defer="description" rows="3"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Prezzo --}}
        <div class="mb-3">
            <label class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control body-bg border border-2 border-dark rounded shadow" wire:model.defer="price">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select class="form-select body-bg border border-2 border-dark rounded shadow" wire:model.defer="category">
                <option value="">Seleziona categoria</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Upload nuove immagini --}}
        <div class="mb-3">
            <label class="form-label">Aggiungi nuove immagini</label>
            <input type="file" class="form-control body-bg border border-2 border-dark rounded shadow" wire:model="temporary_images" multiple>
            @error('temporary_images.*') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Anteprima immagini nuove --}}
        @if ($newImages)
            <div class="row my-4">
                @foreach ($newImages as $key => $image)
                    <div class="col-md-2 mb-2 position-relative">
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded">
                        <button type="button" wire:click="removeImage({{ $key }})" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 me-3">x</button>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Immagini esistenti --}}
        @if ($oldImages->count() > 0)
            <h5>Immagini già caricate:</h5>
            <div class="row">
                @foreach ($oldImages as $img)
                    <div class="col-md-2 mb-2 position-relative">
                        <img src="{{ $img->getUrl(300, 300) }}" class="img-fluid rounded">
                        <button type="button" wire:click="removeOldImage({{ $img->id }})" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1">x</button>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success">Salva Modifiche</button>
            <a href="{{ route('article.show', $article->id) }}" class="btn btn-secondary">Annulla</a>
        </div>
    </form>
</div>