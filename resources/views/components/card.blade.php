<div class="card mx-auto card-w shadow text-center mb-5 border-3 card-border-custom">
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : '\img\default-no-image.jpg'}}" class="card-img-top" alt="Immagine dell'articolo {{$article->title}}">
    <div class="card-body card-body-bg">
        <h4 class="card-title">{{$article->title}}</h4>
        <h6 class="card-subtitle text-body-secondary">{{$article->price}} €</h6>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{route('article.show', compact('article'))}}" class="btn btn-outline-custom-2">Dettaglio</a>
            <a href="{{route('article.byCategory', ['category' => $article->category])}}" class="btn btn-outline-custom-2">Categoria</a>
        </div>
    </div>
</div>