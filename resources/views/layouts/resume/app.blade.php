<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personal - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" /> --}}
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../resources/css/home.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/home.css', 'resources/sass/app.scss', 'resources/js/app.js'])


    <style>

        main{
            /* background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); */
        }
        .navbar {

            position: sticky;
            top: 0;
            z-index: 1;
       
        }
    </style>
</head>


<body class="d-flex flex-column h-100">


    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Start
                        Bootstrap</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="{{ route('resume.home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('resume.resume') }}">Resume</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('resume.project') }}">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('resume.contact') }}">Contact</a></li>

                        {{-- @if (Auth::user() && Auth::user()->is_admin)
                        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">dashboard</a></li>
                        @endif --}}

                        {{-- this second method to make a page for super admin 
                        but you need first to give the Gate in AutServiceProvider --}}
                        @can('dashboard')
                            <li class="nav-item"><a class="btn btn-info" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endcan


                    </ul>
                </div>
            </div>
        </nav>

        <!-- About Section-->
        @yield('content')
    </main>

    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-center flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; <span class="text-uppercase">{{ $profile->name }}</span>
                        2023</div>
                </div>
                {{-- <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div> --}}
            </div>
        </div>
    </footer>

</body>

</html>
