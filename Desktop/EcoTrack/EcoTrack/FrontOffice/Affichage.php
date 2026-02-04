
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Logistica - Shipping Company Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!--Template type de borne electrique-->
    <link href="css/TypeBorneElectrique.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- borne Electrique-->
    <script src="js/BorneElectrique.js"></script>
    <!--Temps Estimé-->
    <script src="js/tempsEstime.js"></script>
    


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">EcoTrack</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Accueil</a>
                <a href="about.html" class="nav-item nav-link">À propos</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a  class="dropdown-item">Module Eco</a>
                        <a  class="dropdown-item">Module Transport</a>
                        <a  class="dropdown-item">Module Evenement</a>
                        <a  class="dropdown-item active">Module Don</a>
                    </div>
                </div>
                <a href="Connexion.php" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<!-- ===== Page Header Start ===== -->
<div class="page-header">

    <!-- Slider -->
    <div class="swiper header-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url('images/nature.jpg')"></div>
            <div class="swiper-slide" style="background-image:url('images/earth.jpg')"></div>
            <div class="swiper-slide" style="background-image:url('images/arbre.jpg')"></div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="header-overlay"></div>

    <!-- Content -->
    <div class="container py-5 header-content">
        <h1 class="display-3 text-white text-center mb-3">Gestion X</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="#">Accueil</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active">Gestion X</li>
            </ol>
        </nav>

        <!-- Eco Cards -->
        <div class="row eco-cards text-center">

            <!-- Eau -->
            <div class="col-md-4 mb-4">
                <div class="eco-card">
                    <img src="images/eau.jpeg" alt="Eau">
                    <div class="eco-card-overlay">
                        <i class="fas fa-tint"></i>
                        <p>
                            Le gaspillage de l’eau épuise les ressources naturelles,
                            détruit les écosystèmes et menace l’avenir des générations futures.
                        </p>
                    </div>
                </div>
                <h5 class="eco-card-title">Préserver l’eau</h5>
            </div>

            <!-- Déchets -->
            <div class="col-md-4 mb-4">
                <div class="eco-card">
                    <img src="images/dechet.jpeg" alt="Déchets">
                    <div class="eco-card-overlay">
                        <i class="fas fa-recycle"></i>
                        <p>
                            Les déchets mal gérés polluent les sols, les océans et l’air,
                            mettant en danger la biodiversité et la santé humaine.
                        </p>
                    </div>
                </div>
                <h5 class="eco-card-title">Réduire les déchets</h5>
            </div>

            <!-- Énergie -->
            <div class="col-md-4 mb-4">
                <div class="eco-card">
                    <img src="images/Air_Pollution.jpeg" alt="Énergie & Transport">
                    <div class="eco-card-overlay">
                        <i class="fas fa-car"></i>
                        <p>
                            L’utilisation excessive d’énergies polluantes et des transports
                            non durables accélère le changement climatique.
                        </p>
                    </div>
                </div>
                <h5 class="eco-card-title">Mieux consommer l’énergie</h5>
            </div>

        </div>
    </div>
</div>
<!-- ===== Page Header End ===== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>/* Cartes écologiques */
.eco-cards {
    animation: fadeUp 1.2s ease forwards;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.eco-card {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    cursor: pointer;
    transition: transform 0.4s ease;
}

.eco-card img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.eco-card:hover img {
    transform: scale(1.1);
}

/* Overlay glissant */
.eco-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(3,59,9,0.95),
        rgba(3,59,9,0.65)
    );
    color: #fff;
    padding: 25px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;

    transform: translateY(100%);
    transition: transform 0.5s ease;
}

.eco-card:hover .eco-card-overlay {
    transform: translateY(0);
}

/* Icône */
.eco-card-overlay i {
    font-size: 40px;
    margin-bottom: 15px;
    color: #2ecc71;
}

/* Texte */
.eco-card-overlay p {
    font-size: 14px;
    line-height: 1.6;
}

/* Titre sous image */
.eco-card-title {
    margin-top: 15px;
    font-weight: 600;
    color: #033b09;
}
</style>


<style>
.page-header {
    position: relative;
    height: 70vh;
    margin-bottom: 6rem;
    overflow: hidden;
}

/* Slider plein écran */
.header-slider,
.header-slider .swiper-slide {
    height: 100%;
}

.header-slider .swiper-slide {
    background-size: cover;
    background-position: center;
}

/* Overlay */
.header-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        135deg,
        rgba(0, 100, 60, 0.6),
        rgba(0, 0, 0, 0.5)
    );
    z-index: 1;
}

/* Contenu au-dessus */
.header-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
new Swiper(".header-slider", {
    loop: true,
    effect: "fade",
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    speed: 1200,
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Reservation</h4>
                    <a class="btn btn-link" href="">Reservation Client</a>
                  
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">À propos</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>





</body>

</html>