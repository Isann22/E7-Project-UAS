<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/hehe1.png') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=poppins:100" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/dashboard.css'])

    @stack('styles')

</head>

<body style="font-family: 'Poppins', sans-serif;"">
    <div id="app">
        @include('layouts.navigation')
    </div>

    <main class="content py-5 mt-5" style="min-height: 100vh;position: relative">
        @yield('content')
    </main>


    @include('layouts.footer')


    <div class="footer">
        @stack('scripts')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded',
            function() {
                const navItems = document
                    .querySelectorAll('.nav-link');

                navItems.forEach(item => {
                    item.addEventListener('click',
                        function() {
                            navItems.forEach(navItem => navItem
                                .classList.remove('active'));
                            this.classList.add('active');
                        });
                });
            });

        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-80px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>



</body>

</html>
