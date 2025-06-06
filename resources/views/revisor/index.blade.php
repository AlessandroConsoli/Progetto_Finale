<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-8">
                <div class="rounded shadow bg-body-secondary border border-2 border-dark">
                    <h1 class="display-5 text-center pb-2">
                        {{__('ui.revDash')}}
                    </h1>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @if ($article_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow" alt="Immagine {{$key + 1}} dell'articolo {{$article_to_check->title}}">
                                </div>
                                <div class="col-md-5 ps-3">
                                    <div class="card-body">
                                        <h5>Labels</h5>
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                #{{$label}},
                                            @endforeach                                            
                                        @else
                                            <p class="fst-italic">No labels</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <h5>Ratings</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{$image->adult}}"></div>
                                            </div>
                                            <div class="col-10">adult</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{$image->violence}}"></div>
                                            </div>
                                            <div class="col-10">violence</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{$image->spoof}}"></div>
                                            </div>
                                            <div class="col-10">spoof</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{$image->racy}}"></div>
                                            </div>
                                            <div class="col-10">racy</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{$image->medical}}"></div>
                                            </div>
                                            <div class="col-10">medical</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- @for ($i = 0; $i < 6; $i++) --}}
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="\img\default-no-image.jpg" class="img-fluid rounded shadow" alt="img Segnaposto">
                                    <h4>{{__('ui.noImage')}}</h6>
                                </div>
                            {{-- @endfor --}}
                        @endif
                    </div>
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between align-items-center">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>{{__('ui.author')}}: {{ $article_to_check->user->name }}</h3>
                        <h4>{{ $article_to_check->price }}€</h4>
                        <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                        <div class="col-10 text-center text-break">{{ $article_to_check->description }}</div>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger ms-5 me-2 py-2 px-5 fw-bold">{{__('ui.refuse')}}</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success me-5 py-2 px-5 fw-bold">{{__('ui.accept')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        {{__('ui.noRev')}}
                    </h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">{{__('ui.returnToHome')}}</a>
                </div>
            </div>
        @endif

    </div>
</x-layout>