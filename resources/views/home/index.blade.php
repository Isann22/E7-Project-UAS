<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/arena.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/css/homie.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/logotajudin1.png') }}" height="40" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto d-flex gap-4">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#about">About Us</a>
                        <a class="nav-link" href="#">Contact</a>
                        <a href="{{ route('login') }}" class="comic-button">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero d-flex container" style="margin-bottom: 200px;">
        <div class="hero-content">
            <h1>Arena Acces
            </h1>
            <p>Temukan dan Pesan Tiket Turnamen Favoritmu! Nikmati Pengalaman Esport Terbaik dengan Arena Acces. <br>
                #Esport Lebih Dekat, Tiket Lebih Mudah!
            </p>

            <a href="#" class="ctas">Get more details</a>
        </div>
        <div class=" d-flex justify-content-end hero-image">
            <img src="{{ asset('img/joy_stick.png') }}" alt="Game Controller">
        </div>
    </section>


    <div id="about" class="container  text-light" style="margin-bottom: 200px;">
        <h1 class="text-center hidden" style="visibility: hidden;">About Us</h1>
        <div class="row justify-content-center align-items-center mt-5">
            <h1 class="text-center mb-5">About Us</h1>
            <div class="col-sm-12 col-md-6 col-lg-6 text-sm-center">
                <h1>"Esport Lebih Dekat" </h1>
                <p>Arena Acces, platform online yang menghubungkan penggemar esport
                    dengan
                    turnamen terkini dan tiket terlengkap. Kami berkomitmen menyajikan pengalaman
                    esport takterlupakan.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="about-img  d-flex justify-content-center">
                    <img src="{{ asset('img/mel.png') }}" alt="" width=500 height="500">
                </div>
            </div>


        </div>
    </div>

    <div class="container mb-5">
        <section class="fitur text-light " style='margin-top: 100px;'>
            <h3 class="container text-start"><b>Features</b></h3>
            <div class="games-grid mt-2">
                <div class="game-card">
                    <img src="{{ asset('img/tiket.png') }}" alt="Game 1">
                    <p><b>Pencarian kategori tiket</b></p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/pembayaran.png') }}" alt="Game 2">
                    <p><b>Pemesanan dan pembayaran</b></p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/lokasi.png') }}" alt="Game 3">
                    <p><b>Detail acara dan lokasi interaktif</b></p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/customer.png') }}" alt="Game 4">
                    <p><b>Customer servis</b></p>
                </div>
            </div>
        </Section>

        <section class="text-light text-center mt-5 mb-5">
            <h3 style="font-size: 1.5rem;"><b>Temukan pemain terbaik untuk timmu dan menangkan setiap pertandingan!</b>
            </h3>
            <p style="font-size: 1.5rem;">Dengan pemain yang tepat, kamu bisa menguasai setiap pertandingan dan mencapai
                puncak kejayaan.</p>
            <p style="font-size: 1.5rem;">Jangan ragu untuk memilih pemain yang sesuai dengan strategi dan gaya bermain
                timmu.</p>
            <p style="font-size: 1.5rem;">Setiap pemain memiliki keahlian unik yang bisa memberikan keuntungan besar
                dalam turnamen.</p>
        </section>

        <section class=" text-light project-highlight mt-5 mb-5">
            <div class="project-content">
                <h2 class="mt-3"><b>Raih Kemenangan Bersama Tim Tebaikmu!</b></h2>
                <p class="mt-3 mb-3 half-width">Bergabunglah dengan komunitas pemain terbaik dan buktikan kemampuanmu di
                    arena turnamen.
                    Pilih pemain yang tepat, susun strategi jitu, dan bawa timmu menuju kemenangan gemilang.
                    Setiap pertandingan adalah kesempatan untuk menunjukkan keahlianmu dan meraih kejayaan.</p>
            </div>
            <div class="project-image">
                <img src="img/11.png" style="width: 1500px; height: 500px;" alt="Highlight Image">
            </div>
        </section>

        <section class="text-light recent-projects mt-5 mb-5">
            <h4 class="mt-3" align="center">Daftar tim terbaik kami tahun ini</h4>
            <p class="mt-3 mb-5" align="center">Tim ini telah bekerja keras dan berlatih tanpa henti untuk mencapai
                puncak kejayaan.
                Dengan semangat juang yang tinggi dan strategi yang matang, mereka siap menghadapi setiap tantangan dan
                meraih kemenangan.</p>
            <div class="projects-grid mb-5">
                <img src="{{ asset('img/3.png') }}" alt="Project 1">
                <img src="{{ asset('img/15.jpg') }}" alt="Project 2">
                <img src="{{ asset('img/2.png') }}" alt="Project 3">
                <img src="{{ asset('img/4.png') }}" alt="Project 4">
                <img src="{{ asset('img/19.jpg') }}" alt="Project 5">
                <img src="{{ asset('img/14.jpg') }}" alt="Project 6">
            </div>
        </section>


        <div class="container my-5 p-5 rounded shadow-lg text-center text-light"
            style="background-color: rgb(7, 7, 46)">
            <h1>Bergabung Sekarang</h1>
            <p>Jadi bagian dari Arena Acces dan rasakan keseruan esport!</p>

            <button class="comic-button">Click me!</button>
        </div>
    </div>
    <footer class="container-fluid   p-4 rounded shadow-lg text-light" style=" background-color: #1a3370;">
        <div class="d-lg-flex justify-content-between">
            <div>
                <span>LOGO</span>
            </div>
            <div class="copyright">
                <p>developed and maintained by <a href="#" target="_blank">company</a></p>
            </div>
            <div>
                <ul class="d-flex gap-3 list-unstyled">
                    <li><a href="#"><i class="bi bi-facebook text-light"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter  text-light"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram  text-light"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
