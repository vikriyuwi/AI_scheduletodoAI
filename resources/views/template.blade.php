<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Srgepp - Get more done in less time</title>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
        <link href="{{ url('/assets/css/srgepp.min.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
        {{-- web info --}}
        <meta property="og:image" content="{{ url('assets/logo/thumbnail.png') }}" />
        <meta name="keywords" content="srgepp,sregep,ai todo"/>
        <meta name="author" content="Fikriyuwi | Vinchen Amigo" />
        <meta name="title" content="Srgepp - Get more done in less time" />
        <meta name="description" content="organizing your priorities has never been easier - effortlessly input your tasks and seamlessly track their progress all in one place.">
        <meta name="theme-color" content="#F8F9FA">

        {{-- icon --}}
        <link rel="icon" type="image/png" href="{{ url('assets/logo/Srgepp_logo.png') }}">
        <style>
            :root {
                --app-height: -webkit-fill-available;
            }
            body {
                font-family: 'Poppins';
            }
            .navbar-nav .nav-item:not(:last-child) {
                padding-right: 2rem;
            }
            .scrollable .status-card {
                /* min-height: 300px; */
                min-width: 300px;
            }
            .card-group.card-group-scroll {
                overflow-x: auto;
                flex-wrap: nowrap;
            }

            .card-group.card-group-scroll .status-card {
                border: none;
                padding: 0.4rem;
                box-sizing: border-box;
            }

            .vh-100 {
                min-height: var(--app-height);
            }

            #loading-screen {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1500;
            }

            /* loading animation */
            .spinner {
                width: 40px;
                height: 40px;

                position: relative;
                margin: 100px auto;
            }

            .double-bounce1, .double-bounce2 {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                opacity: 0.6;
                position: absolute;
                top: 0;
                left: 0;
                
                -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
                animation: sk-bounce 2.0s infinite ease-in-out;
            }

            .double-bounce2 {
                -webkit-animation-delay: -1.0s;
                animation-delay: -1.0s;
            }

            @-webkit-keyframes sk-bounce {
                0%, 100% { -webkit-transform: scale(0.0) }
                50% { -webkit-transform: scale(1.0) }
            }

            @keyframes sk-bounce {
                0%, 100% { 
                    transform: scale(0.0);
                    -webkit-transform: scale(0.0);
                } 50% { 
                    transform: scale(1.0);
                    -webkit-transform: scale(1.0);
                }
            }

            .bg-theme {
                background-color: var(--bs-body-bg);
            }

            /* #loading-screen {
                background-color: var(--bs-body-bg);
            } */

            .bg-trans-warning {
                --bs-bg-opacity: 0.05;
                background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important;
            }

            .bg-trans-primary {
                --bs-bg-opacity: 0.03;
                background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
            }

            .bg-trans-secondary {
                --bs-bg-opacity: 0.08;
                background-color: rgba(var(--bs-secondary-rgb), var(--bs-bg-opacity)) !important;
            }

            .bg-trans-success {
                --bs-bg-opacity: 0.1;
                background-color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important;
            }

            .bg-trans-danger {
                --bs-bg-opacity: 0.05;
                background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
            }

            .bg-trans-info {
                --bs-bg-opacity: 0.05;
                background-color: rgba(var(--bs-info-rgb), var(--bs-bg-opacity)) !important;
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

            .h-100 {
                height: 100%;
            }

            .nav-profile img {
                height: 2rem;
                width: 2rem;
            }
        </style>
        {{-- <style>
            @media (prefers-color-scheme: dark) {
                :root {
                    --bs-card-bg: #2B3036 !important;
                    --bs-primary: #2B3036 !important;
                }

                .bg-body {
                    background-color: #212529 !important;
                    color:white;
                }

                .bg-body-tertiary {
                    background-color: #2B3036;
                    color:white;
                }

                [class="card"] {
                    background-color: #212529 !important;
                }

                .form-control {
                    background-color: #2B3036;
                    border: none;
                    color: white;
                }

                .form-control:focus {
                    background-color: #2B3036;
                    color: white;
                }

                .modal-content {
                    background-color: #212529;
                    border: none;
                    color: white;
                }

                .button-close {
                    color: white !important;
                }

                .link .link-primary {
                    color: var(--bs-primary);
                }
            }
        </style> --}}
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
        <nav class="navbar navbar-expand-lg py-3 sticky-top bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('assets/logo/Srgepp_logo_text_blue.png') }}" alt="Logo" height="24" class="d-inline align-text-top">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbarText" style="">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 pe-5">
                  <li class="nav-item me-3">
                    <a href="{{url('todo')}}" class="nav-link active" aria-current="page">Manage todo</a>
                  </li>
                  <li class="nav-item me-3">
                      <a href="{{url('/')}}" class="nav-link" aria-current="page">Back to home</a>
                  </li>
                </ul>
                @guest
                <a href="{{ url('auth/') }}" class="link link-primary fw-bold">
                    login <i class="fa-solid fa-arrow-right"></i>
                </a>
                @else
                <div class="nav-item dropdown">
                    <a class="nav-link btn btn-secondary rounded-pill fw-bold text-white d-flex" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile p-1">
                            <img src="{{ Auth::user()->user_picture }}" alt="" class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('auth/logout') }}">Logout</a></li>
                    </ul>
                </div>
                @endauth
              </div>
            </div>
        </nav>
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