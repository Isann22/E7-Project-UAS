<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.ico') }}">
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

    <section class="hero d-flex container">
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


    <div id="about" class="container my-5 text-light">
        <h1 class="text-center">About Us</h1>
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-6 col-lg-6 text-sm-center">
                <h1>"Esport Lebih Dekat" </h1>
                <p>Arena Acces, platform online yang menghubungkan penggemar esport
                    dengan
                    turnamen terkini dan tiket terlengkap. Kami berkomitmen menyajikan pengalaman
                    esport takterlupakan.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="about-img  d-flex justify-content-center">
                    <img src="{{ asset('img/leutik3.png') }}" alt="" width=300 height="auto">
                </div>
            </div>


        </div>
    </div>

    <div class="container mb-5">
        <section class="fitur text-light">
            <h3 class="container text-start"><b>Features</b></h3>
            <div class="games-grid mt-2">
                <div class="game-card">
                    <img src="{{ asset('img/leutik1.png') }}" alt="Game 1">
                    <p>Lorem, ipsum.</p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Game 2">
                    <p>Lorem, ipsum.</p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/leutik3.png') }}" alt="Game 3">
                    <p>Lorem, ipsum.</p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/leutik4.png') }}" alt="Game 4">
                    <p>Lorem, ipsum.</p>
                </div>
            </div>
        </Section>

            <section class="text-light text-center mt-5 mb-5">
                <h3><b>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati natus aut totam eligendi nulla
                        recusandae.</b></h3>
            </section>
    
            <section class=" text-light project-highlight mt-5 mb-5">
                <div class="project-content">
                    <h2 class="mt-3"><b>Lorem Ipsum</b></h2>
                    <p class="mt-3 mb-3 half-width">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi nihil ex
                        temporibus totam alias eligendi, animi dolor deleniti, dolores aperiam voluptatem, quos amet
                        cupiditate aliquam.</p>
                </div>
                <div class="project-image">
                    <img src="img/spoderman.png" alt="Highlight Image">
                </div>
            </section>
    
            <section class="text-light recent-projects mt-5 mb-5">
                <h4 class="mt-3" align="center">Our Recent Projects</h4>
                <p class="mt-3 mb-5" align="center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quibusdam
                    fugit voluptatum modi, alias vel vitae enim natus velit minima, est necessitatibus voluptate earum
                    consequuntur.</p>
                <div class="projects-grid mb-5">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Project 1">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Project 2">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Project 3">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Project 4">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Project 5">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Project 6">
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
