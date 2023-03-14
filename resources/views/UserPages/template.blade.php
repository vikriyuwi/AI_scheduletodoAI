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

            body p{
                font-weight: 300;
            }

            body h5{
                font-weight: 500;
            }

            .jumbotron{
                margin-top: -64px
            }

            #header img {
                width:200%;
                margin-left: -50%;
                margin-top: -30%;
                margin-bottom: -50%;
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
            .link:hover {
                text-decoration: underline !important;
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
        </style>
        @yield('additional-style')
    </head>
    <body class="bg-body-tertiary overflow-x-hidden w-100">
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
              <a class="navbar-brand" href="#">
                <img src="{{ url('assets/logo/Srgepp_logo_text_blue.png') }}" alt="Logo" height="24" class="d-inline align-text-top">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbarText" style="">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 pe-5">
                  <li class="nav-item me-3">
                    <a href="{{ Request::url() === url('/') ? '#' : url('/') }}" class="nav-link active" aria-current="page">Home</a>
                  </li>
                  <li class="nav-item me-3">
                      <a href="{{ Request::url() === url('/') ? '#howto' : url('/').'#howto' }}" class="nav-link" aria-current="page">How to</a>
                  </li>
                  <li class="nav-item me-3">
                      <a href="{{ Request::url() === url('contact-us') ? '#' : url('contact-us') }}" class="nav-link" aria-current="page">Contact Us</a>
                  </li>
                </ul>
                @guest
                <a href="{{ url('auth/') }}" class="link link-primary fw-bold">
                    Login <i class="fa-solid fa-arrow-right"></i>
                </a>
                @else
                <a href="{{ url('todo') }}" class="btn btn-primary rounded-pill fw-bold me-4">
                  Manage Todo
                </a>
                <a href="{{ url('auth/logout') }}" class="link link-primary fw-bold">
                  Logout <i class="fa-solid fa-arrow-right"></i>
                </a>
                @endauth
              </div>
            </div>
        </nav>

        <!-- for content -->
        <section id="main" class="d-none">
            @yield('main-content')
        </section>
        {{-- footer section --}}
        <section id="footer">
            <div class="myFooter">
                <div class="container">
                    <footer class="py-5">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                        <ul class="nav flex-column">
                            <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                            <img src="{{ url('assets/logo/icon.png') }}" alt="Logo" height="70" class="d-inline align-text-top">
                            </a>
                            <p class="text-muted">&copy; 2023</p>
                        </ul>
                        </div>
                
                        <div class="col-md-2 mb-3">
                        <h5 class="fw-bold">Support</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ url('/') }}" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="{{ url('faq') }}" class="nav-link p-0 text-muted">FAQs</a></li>
                        </ul>
                        </div>
                
                        <div class="col-md-2 mb-3">
                        <h5 class="fw-bold">About</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About us</a></li>
                            <li class="nav-item mb-2"><a href="{{ url('contact-us') }}" class="nav-link p-0 text-muted">Contact us</a></li>
                            <li class="nav-item mb-2"><a href="{{ url('terms-and-privacy') }}" class="nav-link p-0 text-muted">Terms & Privacy</a></li>
                        </ul>
                        </div>
                
                        <div class="col-md-5 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn myButton" type="button">Subscribe</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </footer>
                </div>
            </div>
        </section>  
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/5c65d8dae4.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(window).on('load', function(){
                $('#loading-screen').addClass('d-none');
                $('#main').removeClass('d-none');
                $('#main').addClass('d-block');
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