<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schedule Todo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            :root {
                --app-height: -webkit-fill-available;
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

        </style>
    </head>
    <body>
        {{-- loading screen --}}
        <section id="loading-screen" class="vh-100 bg-theme">
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
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}"><span class="fw-bold">Sregep</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/todo') }}">Todo Management</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user-astronaut"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa-solid fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear"></i> Setting</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ url('/auth/logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
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

            $('.link').append(' <i class="fa-solid fa-arrow-up-right-from-square"></i>')
        </script>

        @yield('additionalScript')
    </body>
</html>