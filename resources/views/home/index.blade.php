<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="logo">LOGO</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#" class="btn">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Work that we produce for our clients</h1>
            <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard.</p>
            <a href="#" class="btn">Get more details</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/joy_stick.png') }}" alt="Game Controller">
        </div>
    </section>

    <div class="container">
        <section class="trending-games mb-5">
            <h3 class="text-start mb-5"><b>Currently Trending Games</b></h3>
            <div class="games-grid mt-5">
                <div class="game-card">
                    <img src="{{ asset('img/leutik1.png') }}" alt="Game 1">
                    <p>40 Followers</p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/leutik2.png') }}" alt="Game 2">
                    <p>40 Followers</p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/leutik3.png') }}" alt="Game 3">
                    <p>40 Followers</p>
                </div>
                <div class="game-card">
                    <img src="{{ asset('img/leutik4.png') }}" alt="Game 4">
                    <p>40 Followers</p>
                </div>
            </div>
        </section>

        <section class="text-center mt-5 mb-5">
            <h3><b>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati natus aut totam eligendi nulla
                    recusandae.</b></h3>
        </section>

        <section class="project-highlight">
          <div class="project-content">
              <h2 class="mt-3"><b>Lorem Ipsum</b></h2>
              <p class="mt-3 mb-3 half-width">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi nihil ex temporibus totam alias eligendi, animi dolor deleniti, dolores aperiam voluptatem, quos amet cupiditate aliquam.</p>
          </div>
          <div class="project-image">
              <img src="img/spoderman.png" alt="Highlight Image">
          </div>
      </section>

        <section class="recent-projects">
            <h2 class="mt-3" align="center">Our Recent Projects</h2>
            <p class="mt-3" align="center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quibusdam
                fugit voluptatum modi, alias vel vitae enim natus velit minima, est necessitatibus voluptate earum
                consequuntur.</p>
            <div class="projects-grid">
                <img src="{{ asset('img/leutik2.png') }}" alt="Project 1">
                <img src="{{ asset('img/leutik2.png') }}" alt="Project 2">
                <img src="{{ asset('img/leutik2.png') }}" alt="Project 3">
                <img src="{{ asset('img/leutik2.png') }}" alt="Project 4">
                <img src="{{ asset('img/leutik2.png') }}" alt="Project 5">
                <img src="{{ asset('img/leutik2.png') }}" alt="Project 6">
            </div>
        </section>
    </div>
    <footer class="footer">
      <div class="footer-container">
          <div class="footer-column">
              <p class="footer-logo">LOGO</p>
              <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
              <p class="footer-email">@logo</p>
          </div>
          <div class="footer-column">
              <h3>About Us</h3>
              <ul>
                  <li><a href="#">Zeux</a></li>
                  <li><a href="#">Portfolio</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Contact Us</a></li>
              </ul>
          </div>
          <div class="footer-column">
              <h3>Contact Us</h3>
              <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
              <p>+908 89097 890</p>
          </div>
          <div class="footer-column footer-social">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          </div>
      </div>
      <div class="footer-bottom">
          <p>Copyright © 2022 prodesigner All rights Reserved</p>
      </div>
  </footer>
</body>

</html>
