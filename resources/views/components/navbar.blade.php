<nav class="shadow navbar fixed-top navbar-expand-lg bg-body-tertiary border-bottom border-body fs-custom" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('about-us')}}">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active navbar-text-color" aria-current="page" href="{{route('homepage')}}">{{__('ui.homepage')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active navbar-text-color" aria-current="page" href="{{route('article.index')}}">{{__('ui.allArticles')}}</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active navbar-text-color" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.browseCategories')}}
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li>
                  <a href="{{route('article.byCategory', ['category' => $category])}}" class="dropdown-item text-capitalize text-custom-dropdown">{{__("ui.$category->name")}}</a>
                </li>
                @if (!$loop->last)
                    <hr class="dropdown-divider">
                @endif
            @endforeach
          </ul>
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active navbar-text-color" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.hello')}}, {{Auth::user()->name}}!
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item text-custom-dropdown" href="{{route('logout')}}" 
              onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
              >logout</a>
              <form 
              action="{{route('logout')}}"
              method="POST"
              id="form-logout"
              class="d-none"
              >
              @csrf
            </form>
          </li>
          <li>
            <a href="{{route('article.create')}}" class="dropdown-item text-custom-dropdown">{{__('ui.createAnArticle')}}</a>
          </li>
          @if (Auth::user()->is_revisor)
          <li>
            <a class="dropdown-item text-custom-dropdown" href="{{route('revisor.index')}}">{{\App\Models\Article::toBeRevisionedCount()}} {{__('ui.toCheck')}}</a>
          </li>
          @endif
        </ul>
      </li>      
      @else
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle navbar-text-color" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('ui.hello')}}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item text-custom-dropdown" href="{{route('login')}}">Login</a></li>
          <li><a class="dropdown-item text-custom-dropdown" href="{{route('register')}}">{{__('ui.register')}}</a></li>
        </ul>
      </li>      
      @endauth
      </ul>
      <li class="nav-item dropdown active ms-auto">
        <a class="nav-link dropdown-toggle navbar-text-color" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('ui.changeLang')}}
        </a>
        <ul class="dropdown-menu">
          <li><x-_locale lang="it" /></li>
          <li><x-_locale lang="en" /></li>
          <li><x-_locale lang="es" /></li>
        </ul>
      </li>      
      <li class="nav-item navbar-text-color ms-auto li-custom">
        <a class="nav-link active" aria-current="page" href="{{route('about-us')}}">{{__('ui.about-us')}}</a>
      </li>     
      <form class="d-flex ms-auto" role="search" action="{{route('article.search')}}" method="GET">
        <input class="form-control me-2 navbar-text-color custom-placeholder" name="query" type="search" placeholder="{{__('ui.searchArticle')}}" aria-label="Search">
        <button class="btn search-text-color border body-bg-custom" type="submit">{{__('ui.search')}}</button>
      </form>
      
    </div>
  </div>
</nav>