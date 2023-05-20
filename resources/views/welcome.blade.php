<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GRUPO 03 - RHU115</title>
    <title></title>
    <link rel="icon" type="image/x-icon" href="{{ asset('inicio/assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('inicio/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{ asset('inicio/assets/mp4/bg.mp4') }}" type="video/mp4" />
    </video>
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h1 class="fst-italic lh-1 mb-4">GRUPO 03 - RHU115</h1>
                <p class="mb-5">Proyecto de ciclo de la materia de Recursos Humanos. Año 2023. Facultad de
                    Ingeniería. Escuela de Ingeniería de Sistemas Informáticos. Universidad de El
                    Salvador.</p>
            </div>
        </div>
    </div>
    <!-- Social Icons-->
    <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
    <div class="social-icons">
        @if (Route::has('login'))
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                @auth
                    <a class="btn btn-dark m-3" href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a>
                @else
                    <a class="btn btn-dark m-3" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i></a>

                    @if (Route::has('register'))
                        <a class="btn btn-dark m-3" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('inicio/js/scripts.js') }}"></script>
</body>

</html>
