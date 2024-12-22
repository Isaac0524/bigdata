<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ClimaTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">  
    <link rel="stylesheet" href="css/main.css">

    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- favicons -->
    <link rel="icon" href="images/letter-c.png" type="image/x-icon">
</head>

<body id="top">

    <!-- Header -->
    <header id="header" class="row">
        <div class="header-logo">
            <a href="index.html"></a>
        </div>
        <nav id="header-nav-wrap">
            <ul class="header-main-nav">
                <li class="current"><a class="smoothscroll" href="#" title="home"><h3 style="color: black;">Home</h3></a></li>
            </ul>
        </nav>
    </header>

    <!-- Home Section -->
    <section id="home" data-parallax="scroll" data-image-src="images/weather.jpg" data-natural-width=3000 data-natural-height=2000>
        <div class="overlay"></div>
        <div class="home-content">
            <div class="row contents">
                <div class="home-content-left">
                    <h3 data-aos="fade-up">Bienvenue sur ClimaTrack</h3>
                    <h1 data-aos="fade-up">
                        Suivez en temps réel <br>
                        la Température et l'Humidité <br>
                        où que vous soyez.
                    </h1>

                    <!-- Formulaire de recherche -->
                    <div class="search-bar" data-aos="fade-up">
                        <form action="{{ route('weather.search') }}" method="POST">
                            @csrf
                            <input type="text" class="search-input" name="query" placeholder="Entrez le nom du pays ou de la ville" required>
                            <button class="search-button" type="submit">Rechercher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image à droite (inchangée) -->
    <div class="home-image-right">
        <img src="images/iphone-app-470.png" 
            srcset="images/iphone-app-470.png 1x, images/iphone-app-470.png 2x"  
            data-aos="fade-up">
    </div>

    <!-- Social Media Links -->
    <ul class="home-social-list">
        <li>
            <a href="#"><i class="fa fa-facebook-square"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
        </li>
    </ul>

    <!-- Scroll Down -->
    <div class="home-scrolldown">
        <a href="#about" class="scroll-icon smoothscroll">
            <span>Scroll Down</span>
            <i class="icon-arrow-right" aria-hidden="true"></i>
        </a>
    </div>

    <!-- Preloader -->
    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       

</body>

</html>
