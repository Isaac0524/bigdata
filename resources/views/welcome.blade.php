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
    <!-- favicons -->
    <link rel="icon" href="images/letter-c.png" type="image/x-icon">
</head>
<style>
        .search-bar {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 20px auto;
        text-align: left;
    }

    .search-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .form-label i {
        margin-right: 5px;
        color: #007BFF;
    }

    .search-input,
    .date-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background: #fff;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease;
    }

    .search-input:focus,
    .date-input:focus {
        border-color: #007BFF;
        outline: none;
    }

    .date-helper-text {
        font-size: 12px;
        color: #888;
        margin-top: 5px;
    }

    .search-button {
        background: #007BFF;
        color: #fff;
        border: none;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .search-button i {
        font-size: 18px;
    }

    .search-button:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }

    .search-button:active {
        background: #004080;
        transform: translateY(0);
    }

</style>

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
                  <!-- Formulaire de recherche amélioré -->
                    <div class="search-bar" data-aos="fade-up">
                        <form action="{{ route('weather.search') }}" method="POST" class="search-form">
                            @csrf
                            <div class="form-group">
                                <label for="query" class="form-label">
                                    <i class="fa fa-search"></i> Rechercher un lieu :
                                </label>
                                <input type="text" class="search-input" id="query" name="query" placeholder="Entrez le nom du pays ou de la ville" required>
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-label">
                                    <i class="fa fa-calendar"></i> Date (1995-2016) :
                                </label>
                                <input type="date" class="date-input" id="date" name="date" required>
                                <p class="date-helper-text">La date doit être comprise entre janvier 1995 et décembre 2016.</p>
                            </div>
                            <button class="search-button" type="submit">
                                <i class="fa fa-search"></i> Rechercher
                            </button>
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
    
    <script>
    // Vérifier s'il existe un message d'erreur dans la session
    @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: '{{ session('error') }}',
            confirmButtonColor: '#007BFF'
        });
    @endif
</script>
       

</body>

</html>
