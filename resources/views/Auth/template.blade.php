<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Srgepp - Get more done in less time</title>
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
        <meta name="theme-color" content="#0102A1">

        {{-- icon --}}
        <link rel="icon" type="image/png" href="{{ url('assets/logo/Srgepp_logo.png') }}">
        <style>
            body {
                font-family: 'Poppins';
            }
            .navbar-nav .nav-item:not(:last-child) {
                padding-right: 2rem;
            }
            
            .vh-100 {
                min-height: 100vh;
            }
        </style>
    </head>
    <body class="bg-primary">
        <!-- for content -->
        @yield('main-content')
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/5c65d8dae4.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>