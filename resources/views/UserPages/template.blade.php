<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schedule Todo</title>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
        <link href="{{ url('/assets/css/srgepp.min.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

        {{-- web info --}}
        <meta property="og:image" content="{{ url('assets/logo/thumbnail.png') }}" />
        <meta name="keywords" content="srgepp,sregep,ai todo"/>
        <meta name="author" content="Fikriyuwi | Vinchen Amigo" />
        <meta name="title" content="Sregep - Get more done in less time" />
        <meta name="description" content="organizing your priorities has never been easier - effortlessly input your tasks and seamlessly track their progress all in one place.">
        <meta name="theme-color" content="#F8F9FA">

        {{-- icon --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ url('favicon/site.webmanifest') }}">


        <style>
            :root {
                --app-height: -webkit-fill-available;
            }
            .navbar-nav .nav-item:not(:last-child) {
                padding-right: 2rem;
            }
            body{
                font-family: 'Poppins';
            }
            body a, .nav-link{
                font-size: 18px;
            }

            body a{
                color: #0102A1;
            }

            body h1{
                font-size: 64px;
                font-weight: 700;
            }

            body h2{
                font-size: 48px;
                font-weight: 700;
            }

            body p{
                font-weight: 300;
            }

            body h5{
                font-weight: 500;
            }

            .jumbotron{
                margin-top: -64px
            }

            .w1 img{
                width: 507px;
                margin-top:-45px;
                margin-left: 64px;
            }
            .w2 img{
                width: 450px;
                margin-left: -112px;
                margin-top: -112px;
            }

            .w3 img{
                width: 507px;
                margin-top:-126px;
                margin-right:-126px;
            }

            .w4 img{
                width: 507px;
                margin-top:-186px;
                margin-left:126px;
            }

            .w5 img{
                width: 450px;
                margin-left: -112px;
                margin-top: -186px;
            }

            .s2p img{
                width: 707px;
            }

            .howTo .col-2{
                border-radius: 18px;
                background-color: #FE8B11;
                color: #000000;
                font-weight: 500;
                width: 50px;
                height: 50px;
            }

            .myButton{
                background-color: #0102A1;
                color: #ffffff;
                border-radius: 32px;
                font-weight: 500;
            }

            .myButton:hover{
                background-color: #FE8B11;
                color: #000000;
                border-radius: 32px;
            }

            .card4{
                height: 360px;
                background-color: #0102A1;
                border-radius: 24px;
                color: #ffffff;
            }

            .card4 a{
                color: #ffffff;
            }

            .myButton2{
                background-color: #FE8B11;
                color: #000000;
                border-radius: 32px;
                font-weight: 500;
            }

            .myButton2:hover{
                color: #0102A1;
                background-color: #ffffff;
            }

            .myFooter{
                background-color: #FAFAFF;
            }

            #newsletter1{
                border-radius: 32px;
                margin-right: -40px;
            }

            .link {
                text-decoration: none;
            }

            .bg-body-tertiary {
                background-color: #F8F9FA;
            }

            .bg-body {
                background-color: #FFFFFF !important;
            }

            .form-control {
                background-color: #F8F9FA;
                border: none;
            }
        </style>
        @yield('additional-style')
    </head>
    <body class="bg-body-tertiary">
        {{-- loading screen --}}
        <section id="loading-screen" class="vh-100 bg-body-tertiary">
            <div class="container vh-100 d-flex">
                <div class="row my-auto mx-auto">
                    <div class="col-12">
                        <div class="spinner">
                            <div class="double-bounce1 bg-warning"></div>
                            <div class="double-bounce2 bg-warning"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container py-3 sticky-top bg-body-tertiary">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img src="{{ url('assets/logo/Srgepp_logo_text_blue.png') }}" alt="Logo" height="24" class="d-inline align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse show" id="navbarText" style="">
                  <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 pe-5">
                    <li class="nav-item me-3">
                      <a href="#jumbotron" class="nav-link active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="#howto" class="nav-link" aria-current="page">How to</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="#about" class="nav-link" aria-current="page">About</a>
                    </li>
                  </ul>
                  @guest
                  <a href="{{ url('auth/') }}" class="link link-primary fw-bold">
                      login <i class="fa-solid fa-arrow-right"></i>
                  </a>
                  @else
                  <a href="{{ url('todo') }}" class="btn btn-primary rounded-pill fw-bold me-4">
                    start manage your task
                  </a>
                  <a href="{{ url('auth/logout') }}" class="link link-primary fw-bold">
                    logout <i class="fa-solid fa-arrow-right"></i>
                  </a>
                  @endauth
                </div>
              </div>
            </nav>
        </div>
        <!-- for content -->
        @yield('main-content')
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/5c65d8dae4.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(window).on('load', function(){
                $('#loading-screen').addClass('d-none');
            })

            var csrf = $('input[name="_token"]')[0];

            const storedTheme = localStorage.getItem('theme')
        
            const getPreferredTheme = () => {
                if (storedTheme) {
                    return storedTheme
                }
        
                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }
        
            const setTheme = function (theme) {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
                } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }
        
            setTheme(getPreferredTheme())
        
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (storedTheme !== 'light' || storedTheme !== 'dark') {
                setTheme(getPreferredTheme())
                }
            })
        
            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme())
        
                document.querySelectorAll('[data-bs-theme-value]')
                .forEach(toggle => {
                    toggle.addEventListener('click', () => {
                    const theme = toggle.getAttribute('data-bs-theme-value')
                    localStorage.setItem('theme', theme)
                    setTheme(theme)
                    showActiveTheme(theme)
                    })
                })
            })

            function pagePost(path, params) {

                // The rest of this code assumes you are not using a library.
                // It can be made less verbose if you use one.
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = path;

                for (const key in params) {
                    if (params.hasOwnProperty(key))
                    {
                        const hiddenField = document.createElement('input');
                        hiddenField.type = 'hidden';
                        hiddenField.name = key;
                        hiddenField.value = params[key];

                        form.appendChild(hiddenField);
                    }
                }

                form.appendChild(csrf);

                document.body.appendChild(form);
                form.submit();

            }

            // $('.link').append(' <i class="fa-solid fa-arrow-up-right-from-square"></i>');
        </script>

        @yield('additionalScript')
    </body>
</html>