<x-layout>
  <div class="container-fluid text-center bg-body-tertiary">
    <div class="row vh-80 body-bg justify-content-center align-items-center">
      <div class="col-12">
        <h1 class="display-1 mt-custom">Dettagli dell'articolo</h1>
        @if (session()->has('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <div class="my-5">
        </div>
      </div>
    </div>
    <div class="row justify-content-center align-items-center height-custom py-5 body-bg">
      <div class="col-12 col-md-6 mb-3">
        @if ($article->images->count() > 0)
        <div id="carouselExampleCaptions" class="carousel slide custom-carousel" data-bs-ride="carousel" data-bs-wrap="true">
          <div class="carousel-indicators">
            @foreach ($article->images as $key => $image)
            <button type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="{{$key}}"
            @if ($loop->first) class="active" aria-current="true" @endif
            aria-label="Slide {{$key + 1}}">
          </button>
          @endforeach
        </div>
        <div class="carousel-inner">
          @foreach ($article->images as $key => $image)
          <div class="carousel-item @if ($loop->first) active @endif">
            <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="Immagine {{$key + 1}} dell'articolo {{$article->title}}">
            <div class="carousel-caption d-none d-md-block carousel-text">
              <h5>Immagine {{$key + 1}}</h5>
            </div>
          </div>
          @endforeach
        </div>
        @if ($article->images->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon carousel-text" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon carousel-text" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        @endif
      </div>
      @else
      <img src="https://ps.w.org/replace-broken-images/assets/icon-256x256.png?rev=2561727" alt="Nessuna immagine inserita">
      @endif
    </div>    
    <div class="col-12 col-md-6 height-custom text-center d-flex align-items-center justify-content-center">
      <div class="col-6 border border-dark body-bg">
        <h2 class="my-5">{{$article->title}}</h2>
        <h6 class="my-5 text-center">{{$article->description}}</h4>
          <h5 class="my-5">Prezzo: {{$article->price}}€</h3>
          </div>
        </div>
        {{-- pulsante delete (solo per revisori o per l'autore dell'articolo) --}}
        @auth
          @if (Auth::user()->is_revisor)
            <div class= "d-flex justify-content-center mb-2">
              <a class="btn btn-outline-custom-2" href="{{ route('article.edit', $article->id) }}">Modifica l'articolo</a>
            </div>
            <div class= "d-flex justify-content-center mb-2">
              <livewire:article-delete :article="$article" />
            </div>
            @elseif (Auth::id() == $article->user->id)
            <div class= "d-flex justify-content-center mb-2">
              <a class="btn btn-outline-custom-2" href="{{ route('article.edit', $article->id) }}">Modifica l'articolo</a>
            </div>
            <div class= "d-flex justify-content-center mb-2">
              <livewire:article-delete :article="$article" />
            </div>
            @else
        {{-- Altrimenti mostrami il tasto per diventare revisore --}}
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <span class="me-3">Vuoi diventare revisore?</span>
                <a href="{{ route('become.revisor') }}" class="btn btn-success btn-rounded">
                  Candidati qui!
                </a>
              </p>
            </section>
          @endif
        @endauth
        {{-- end pulsante delete --}}
        <div>
          <a class="btn btn-outline-custom-2" href="{{route('article.index')}}">Torna all'archivio articoli</a>
        </div>
      </div>
    </div>
  </x-layout>