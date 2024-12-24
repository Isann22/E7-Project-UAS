<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:100" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css'])
</head>

<body style="  font-family: 'Poppins', sans-serif;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <main class="content">
        @yield('content')
    </main>

</body>

</html>