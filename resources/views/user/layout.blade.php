<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .checked {
            color: rgb(255, 208, 0);

        }

        .nochecked {
            color: black;
        }
        .category{
            text-decoration: none;

            color: black;
        }

        .fav:hover{
          color: red;

        }
    </style>
    {{-- font aswoame cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">
        <nav class="navbar  navbar-expand-md navbar-dark  navbar-light bg-primary  shadow-sm">
            <div class="container ">

                {{-- left side in navbar --}}

                <a class="navbar-brand" href="{{ route('getprofile')}}">
                  my Profile
                 </a>
                <a class="navbar-brand me-4" href="{{route('home')}}"> Mktabty</a>


                <a class="navbar-brand me-4 " href="{{ route('cart.list') }}">
                    My books
                </a>
                <a class="navbar-brand me-4" href="{{ route('favorites.create') }}">
                    {{-- {{ config('app.name', 'favorites') }} --}}
                    favorites
                </a>
                {{-- left side in navbar --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    

            <div class="btn-group">
               
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('home') }}">All rates</a></li>

                    {{-- @foreach ($data as $rate)
                        <li><a class="dropdown-item" href="#">{{ $rate['rate'] }} stars</a></li>
                    @endforeach --}}


                </ul>
            </div>





 {{-- Example single danger button --> --}}
<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 me-5">
    <p class="pt-2">ordered by </p>

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      rate
    </button>

    <ul class="dropdown-menu">
        <form method="get" action="{{route('home')}}">
      <li><a class="dropdown-item" href="{{route('home')}}">All rates</a></li>




      @foreach (range(1,5) as $rate)
       @php
         $checked =[];
         if(isset($_GET['filter'])){
            $checked =$_GET['filter'];

         }
       @endphp
       <li >
        <label for="stars-{{$rate}}">
            <input type="checkbox" id="stars-{{$rate}}"
            name="filter[rate][]"
            value="{{$rate}}"
            @if (in_array($rate,$checked))
            checked
            @endif>
            {{$rate}}stars
        </label>
       </li>
        @endforeach
          <button type="submit"  class="btn btn-primary"> filter</button>
        </form>
    </ul>
</div>

 <a href="{{Route('search')}}"><button type="submit" class="btn btn-primary">Search</button></a>

<form method="get" action="{{route('home')}}">
    <button type="submit"  name="latest" class="btn btn-primary ">latest</button>
</form>

  </div>
    </div>
    <!-- search -->


    <main class="row  ">


        <div class="col-3 m-4">

            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    @foreach ($user as $bookuser)
                  <li class="list-group-item"><a href="{{url('category/'.$bookuser->id)}}">  {{$bookuser->type}}</a></li>
                  @endforeach

                </ul>
              </div>



            </div>



        <div class="col-8 m-0  ">

            @yield('content')
        </div>

    </main>

        @yield('script')

</body>

</html>
