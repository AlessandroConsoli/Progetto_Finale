<x-layout>
    <div class="container-fluid text-center bg-body-tertiary">
        <section class="row vh-80 body-bg justify-content-center align-items-center">
            @if (session()->has('message'))
            <div class="alert alert-success text-center shadow rounded w-50 mt-5">
            {{session('message')}}
            </div>
            @endif
            @if (session()->has('errorMessage'))
            <div class="alert alert-danger text-center shadow rounded w-50 mt-5">
            {{session('errorMessage')}}
            </div>
            @endif
            <div class="col-12 d-flex justify-content-center align-items-center bg-header">
                <div class="col-3">
                    <img src="/img/bg_1.png" alt="fashion style girl" class="header-girl-img">
                </div>
                <div class="col-5">
                    <h1 class="header-h1-custom text-white text-shadow">Presto.it</h1>
                    @auth
                        <a class="btn btn-header-custom" href="{{route('article.create')}}">{{__('ui.createAnArticle')}}</a>
                    @endauth
                </div>
                <div class="col-3">
                    <img src="/img/ps5.png" alt="console ps5 limited ed" class="img-fluid header-console-img">
                </div>
            </div>
        </section>

        {{-- Middle section --}}

        <section class="row bg-middle-section">            
            <div class="col-12 col-md-3"></div>
            <div class="col-12 col-md-2">
                <i class="fa-solid fa-5x fa-truck-fast custom-fa-icons"></i>
                <p class="fw-bold">{{__('ui.shipping')}}</p>
            </div>
            <div class="col-12 col-md-2">
                <i class="fa-solid fa-5x fa-headset custom-fa-icons"></i>
                <p class="fw-bold">{{__('ui.supportCustomer')}}</p>
            </div>
            <div class="col-12 col-md-2">
                <i class="fa-solid fa-5x fa-credit-card custom-fa-icons"></i>
                <p class="fw-bold">{{__('ui.securePayments')}}</p>
            </div>
            <div class="col-12 col-md-3"></div>            
        </section>

        {{-- Card section --}}

        <section class="row welcome-card-section-bg height-custom justify-content-center align-items-center py-5">
            <div>
                <a class="my-5 recent-articles-h2 text-shadow text-light text-nowrap bg-recentArticles text-decoration-none">{{__('ui.recentArticles')}}</a>
            </div>
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{__('ui.noArticles')}}
                    </h3>
                </div>
            @endforelse
        </section>
    </div>
</x-layout>