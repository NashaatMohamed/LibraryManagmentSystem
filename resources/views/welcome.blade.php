<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Styles -->
        <style>
            a{
                text-decoration-line: none
            }
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="">
            <div class="bg-dark">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block  ">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm  dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white ps-5">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white ps-5">Register</a>
                        @endif
                    @endauth
                </div>
            @endif</div>
        </div>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
          
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://www.w3schools.com/bootstrap5/ny.jpg" alt="Los Angeles" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="https://www.w3schools.com/bootstrap5/ny.jpg" alt="Chicago" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="https://www.w3schools.com/bootstrap5/ny.jpg" alt="New York" class="d-block w-100">
              </div>
            </div>
          
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        <div class=" p-4 bg-dark text-white text-center">
            <p>Footer</p>
          </div>
    </body>
</html>
