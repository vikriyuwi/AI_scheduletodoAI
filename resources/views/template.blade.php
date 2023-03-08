<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schedule Todo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
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

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/todo') }}">Todo Management</a>
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
        </script>

        @yield('additionalScript')
    </body>
</html>