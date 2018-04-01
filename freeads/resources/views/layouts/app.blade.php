<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Free Adds</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          Free Adds
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>
          <ul class="navbar-nav m-auto">
            <form class="form-inline" method="POST" action ="{{ url('/search') }}" role="search">

              {{ csrf_field() }}
              <div>
                <input type="search" id="tags" name="tags" class="form-control" placeholder="Search on Free Adds">
                <input type="search" id="couleur" name="couleur" class="form-control" placeholder="Color">
                <input type="search" id="ville" name="ville" class="form-control" placeholder="Near">
                <select name="catégorie" class="form-control">
                  <option value="">Category</option>
                  <option value="Clothes">Clothes</option>
                  <option value="Jewelleries">Jewelleries</option>
                  <option value="Media">Media</option>
                  <option value="Toys">Toys</option>
                  <option value="Lifestyle">Lifestyle</option>
                  <option value="Other">Other</option>
                </select>
                <select name="taille" class="form-control">
                  <option value="">Size</option>
                  <option value="XS">XS</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                </select>
                <button class="form-control">Search</button>
              </div>
            </form>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('auth.edit', Auth::user()->id)}}">Edit My Profile</a>
                  <a class="dropdown-item" href="/annonces">
                    {{ __('Annonces') }}
                  </a>
                  <a class="dropdown-item" href="/users">
                    {{ __('Sellers') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

              </div>
            </li>

          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-light d-flex justify-content-end" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
    @if (Auth::check())
     <a class="btn btn-sm btn-outline-secondary p-2" href="/messages" type="button">Messages<?php $count = Auth::user()->newThreadsCount(); ?>
     @if($count > 0)
         <span class="label label-danger">( {{ $count }} )</span>
       @endif
     @endif
</a>
      @if (Auth::check())<a class="btn btn-sm btn-outline-secondary p-2" href="/messages/create" type="button">Compose Message</a>@endif
  </nav>
  <main class="py-4">
    @yield('content')
  </main>
</div>
</body>
</html>
