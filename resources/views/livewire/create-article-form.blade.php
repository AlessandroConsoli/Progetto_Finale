<form class="shadow rounded p-5 my-5 create-form-body-bg" wire:submit="store">
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{session('success')}}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">{{__('ui.title')}}</label>
        <input type="text" id="title" 
            class="form-control body-bg border border-2 border-dark rounded shadow @error('title') is-invalid @enderror" wire:model.live.debounce.150ms="title">
        @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{__('ui.description')}}</label>
        <textarea id="description" cols="30" rows="10" 
            class="form-control body-bg border border-2 border-dark rounded shadow @error('description') is-invalid @enderror" wire:model.live.debounce.150ms="description"></textarea>
        @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">{{__('ui.price')}} in €</label>
        <input type="text" id="price" 
            class="form-control body-bg border border-2 border-dark rounded shadow @error('price') is-invalid @enderror" wire:model.live.debounce.150ms="price">
        @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">{{__('ui.imageUpload')}}</label>
        <input type="file" wire:model.live="temporary_images" multiple class="form-control body-bg border border-2 border-dark rounded shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
        @error('temporary_images.*')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
        @error('temporary_images')
        <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>{{__('ui.photoPreview')}}</p>
                <div class="row border border-2 border-dark rounded shadow py-4 mb-3">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div 
                            class="img-preview mx-auto shadow rounded"
                            style="background-image: url({{$image->temporaryUrl()}})">
                            </div>
                            <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="mb-3">
        <label for="" class="form-label">{{__('ui.selectCategory')}}</label>            
        <select id="category" wire:model.blur="category"
            class="form-control body-bg border border-2 border-dark rounded shadow label-custom @error('category') is-invalid @enderror">
            <option label disabled class="text-dark"> {{__('ui.selectCategory')}} </option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{__("ui.$category->name")}}</option>
            @endforeach
        </select>
        @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-dark border-2 body-bg px-5">{{__('ui.create')}}</button>
    </div>
</form>
