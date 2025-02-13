<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'accueil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>

<style>
    body {
      background-color: #f5ffff;
      font-family: Georgia, serif;
    }

    .navbar {
      background-color: #007bff;
      /* Couleur de fond de la navbar */
      transition: background-color 0.3s ease;
      /* Transition en douceur pour la couleur de fond */
    }

    .navbar-brand img {
      border-radius: 15px;
      transition: transform 0.3s ease;
      /* Transition en douceur pour le logo au survol */
    }

    .navbar-brand img:hover {
      transform: scale(1.1);
      /* Redimensionnement du logo au survol */
    }

    .nav-link {
      color: #fff !important;
      /* Couleur du texte des liens */
      transition: color 0.3s ease;
      /* Transition en douceur pour la couleur du texte */
    }

    .nav-link:hover {
      color: #f8f9fa !important;
      /* Couleur du texte des liens au survol */
    }

    .dropdown-menu {
      background-color: #007bff;
      /* Couleur de fond du menu déroulant */
    }

    .dropdown-item {
      color: #fff !important;
      /* Couleur du texte des items du menu déroulant */
    }

    .dropdown-item:hover {
      background-color: #0056b3 !important;
      /* Couleur de fond des items du menu déroulant au survol */
    }

    /* Style initial du lien "Login" */
    .btn-login {
      background-color: #e16db3;
      /* Couleur de fond */
      color: #fff;
      /* Couleur du texte */
      border: none;
      /* Pas de bordure */
      padding: 10px 20px;
      /* Espacement intérieur */
      border-radius: 12px;
      /* Bord arrondi */
      transition: box-shadow 0.3s;
      /* Transition de l'ombre */
      box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
      /* Ombre initiale transparente */
    }

    /* Style au survol du lien "Login" */
    .btn-login:hover {
      background-color: transparent;
      /* Fond transparent */
      border: 1px solid #007bff;
      /* Couleur de la bordure */
      color: #007bff;
      /* Couleur du texte */
      box-shadow: 0 0 10px 2px rgba(0, 123, 255, 0.7);
      /* Ombre avec animation */
    }

    .header {
      background-color: #007BFF;
      color: white;
      padding: 2em 0;
      text-align: center;
      transition: opacity 1s ease-in-out;
    }

    .header h1 {
      font-size: 2.5em;
      margin-bottom: 0.5em;
    }

    .header p {
      margin-bottom: 1.5em;
    }

    .header .btn {
      padding: 0.75em 1.5em;
      font-size: 1.25em;
    }

    .dropdown-item img {
      width: 20px;
      height: auto;
    }

    /* Style de la légende du carrousel */
    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.5);
      /* Couleur sombre semi-transparente */
      color: white;
      /* Couleur du texte */
      padding: 20px;
      /* Espacement intérieur */
    }

    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 20px;
      text-align: center;
    }

    .card-title {
      font-size: 50px;
      color: #007BFF;
    }

    .card-text {
      color: #6c757d;
    }

    .dropdown-item img {
      width: 20px;
      height: auto;
    }

    /* Style de base du bouton */
    .btn-custom {
      background-color: #e16db3;
      border: none;
      border-radius: 40px;
      color: white;
    }

    /* Style du hover */
    .btn-custom:hover {
      background-color: transparent;
      border: 1px solid #e16db3;
      color: #e16db3;
    }



    .section-header {
      text-align: center;
    }

    .h1-gradient {
      background: linear-gradient(to right, #ff80bf, #ff99cc);
      /* Dégradé de rose pour h1 */
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      /* Couleur de texte transparente */
    }

    .h4-gradient {
      background: linear-gradient(to right, #80bfff, #99ccff);
      /* Dégradé de bleu pour h4 */
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      /* Couleur de texte transparente */
    }

    .rating {
      display: flex;
      justify-content: center;
    }

    .rating input[type="radio"] {
      display: none;
    }

    .rating label {
      cursor: pointer;
      width: 35px;
      height: 35px;
      background-image: url('img/s4k6_pdjv_220810.jpg');
      /* Ajoutez le chemin de votre image d'étoile */
      background-size: cover;
    }

    .rating input[type="radio"]:checked~label,
    .rating input[type="radio"]:hover~label {
      background-image: url('img/7v86_bk7o_220810.jpg');
      /* Ajoutez le chemin de votre image d'étoile remplie */
    }

    .text-color-gradient {
      background: linear-gradient(45deg, #FF69B4, #1E90FF);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }


    .cards-wrapper {
      display: flex;
      justify-content: center;
    }

    .card img {
      max-width: 100%;
      height: 240px;;
    }

    .card {
      margin: 0 0.5em;
      box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
      border: none;
      border-radius: 0;
      max-width: 300px; /* Définissez la largeur maximale des cartes */
      max-height: 100%; /* Définissez la hauteur maximale des cartes */
      margin: 0 10px; /* Ajoutez une marge entre les cartes */
    }




    #prev1,
    #next1 {
      background-color: #e1e1e1;
      width: 5vh;
      height: 5vh;
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
    }

    .modal-content {
            border-radius: 10px;
            border: none;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-title {
            font-weight: bold;
        }
        .close {
            border: none;
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
        }







    /* Ajoutez vos styles personnalisés ici */
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top " style="background-color: rgba(56, 143, 255, 0.9);">
    <a class="navbar-brand" href="#">
      <img src="img/healthcare.jpg" width="80" height="80" class="d-inline-block align-top" alt="Votre Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#service">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Language
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><img src="img/usa.png" alt="English" class="mr-2"> English</a>
            <a class="dropdown-item" href="#"><img src="img/france.png" alt="French" class="mr-2"> French</a>
            <a class="dropdown-item" href="#"><img src="img/morocco.png" alt="Arabic" class="mr-2"> Arabic</a>
            <a class="dropdown-item" href="#"><img src="img/china.png" alt="Chinese" class="mr-2"> Chinese</a>
            <a class="dropdown-item" href="#"><img src="img/korea.png" alt="Korean" class="mr-2"> Korean</a>
            <a class="dropdown-item" href="#"><img src="img/spain.png" alt="Spanish" class="mr-2"> Spanish</a>
            <!-- Add more languages here -->
          </div>
        </li>
        <li class="nav-item ml-4 ">
          <a class="nav-link btn-login w-100 px-5"  onclick="showLoginForm()">Login</a>
        </li>
        <li class="nav-item ml-4 pl-1">
          <a class="nav-link" href="#">Book an Appointment</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->
<!-- Fenêtre modale -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Authentification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="elements/login.php" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </div>
            </div>
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Fin Fenêtre modale -->
  <!-- Header Section -->
  <header class="container-fluid header" style="background-color: #f5ffff;">
    <div class="container p-t-100">
      <div class="row align-items-center flex-column flex-lg-row">
        <!-- Colonne pour le texte -->
        <div class="col-lg-6 text-center">
          <div class="hero-content mt-5 mt-lg-0 text-lg-start">
            <p class="text-primary fs-5 fw-bold">Logiciel de réservation de rendez-vous médicaux personnalisé</p>
            <h1 class="mb-5" style="color: #e16db3;">
              Un système de réservation de rendez-vous pour patients, marque blanche.
            </h1>
            <a href="#" class="btn btn-primary btn-lg btn-custom">S'inscrire</a>
          </div>
        </div>
        <!-- Colonne pour l'image -->
        <div class="col-lg-6 text-center">
          <img src="img/97.png" alt="Infy Care" class="img-fluid object-image-cover rounded-circle" loading="lazy">
        </div>
      </div>
    </div>
  </header>
  <!-- Cabinet Medical Section -->
  <section class="container-fluid py-2">
    <div class="row">
      <div class="col-md-6 d-flex align-items-center">
        <div class="d-flex">
          <!-- Image circulaire pour la décoration -->
          <img src="img/496475-PHYVUN-796.jpg" alt="Décoration" class="img-fluid rounded-circle" style="width: 140px; height: 140px;  left: -150px; top: 38px;">

          <!-- Contenu de la description de l'hôpital -->
          <div>
            <h2 style="font-family:  Georgia, serif;">Bienvenue au <span class="font-weight-bold" style="color:#e16db3;">GPA (Gestion de Projet Agile) :</span></h2>
              la clé pour des projets innovants, flexibles et efficaces. Avec des cycles de livraison rapides, une collaboration renforcée et une adaptation continue, GPA transforme vos défis en succès.
              Découvrez comment notre approche Agile sur mesure peut propulser vos résultats.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 align-items-center">
        <!-- Carousel pour les images -->
        <div id="carouselControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" style="border-start-start-radius: 225px;">
            <div class="carousel-item active">
              <img src="img/doctor.jpg" class="d-block w-100" alt="Image 1" style="height: 400px;">
              <div class="carousel-caption">
                <h2>Les Meilleurs Médecins</h2>
                <p>Rencontrez notre équipe médicale hautement qualifiée, prête à vous offrir les meilleurs soins et traitements.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/gynecological-room-hospital.jpg" class="d-block w-100" alt="Image 2" style="height: 400px;">
              <div class="carousel-caption">
                <h2>Nouvelles Technologies Médicales</h2>
                <p>Découvrez nos installations modernes équipées des dernières avancées technologiques, pour des diagnostics précis et des soins de qualité.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/retiredperson.jpg" class="d-block w-100" alt="Image 2" style="height: 400px;">
              <div class="carousel-caption">
                <h2>Soins Personnalisés</h2>
                <p>Nous nous engageons à offrir des soins personnalisés et attentionnés à chacun de nos patients, répondant à leurs besoins spécifiques.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/young-doctor-supporting-his-patient.jpg" class="d-block w-100" alt="Image 2" style="height: 400px;">
              <div class="carousel-caption">
                <h2>Excellence en Service</h2>
                <p>Notre cabinet médical se distingue par son engagement envers l'excellence en service, assurant une expérience positive à chaque visite.</p>
              </div>
            </div>
            <!-- Ajoutez d'autres images avec les balises de caption si nécessaire -->
          </div>
          <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
          </a>
          <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
          </a>
          <!-- Pagination -->
          <ol class="carousel-indicators">
            <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
            <li data-target="#carouselControls" data-slide-to="1"></li>
            <li data-target="#carouselControls" data-slide-to="2"></li>
            <li data-target="#carouselControls" data-slide-to="3"></li>
            <!-- Ajoutez plus d'indicateurs pour chaque image supplémentaire -->
          </ol>
        </div>

      </div>
    </div>
  </section>


  <!-- Début de la section -->
  <section class="container mt-5">
    <div class="section-header ">
      <h4 class="h4-gradient">Processus de travail</h4>
      <h1 class="h1-gradient mb-5">Comment ça marche ?</h1>
    </div>
    <div class="row">
      <!-- Carte 1 -->
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">1</h5>
            <p class="card-text">Inscription</p>
            <p class="card-text">Le patient peut s'inscrire ici avec des informations de base.</p>
          </div>
        </div>
      </div>
      <!-- Carte 2 -->
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">2</h5>
            <p class="card-text">Prendre rendez-vous</p>
            <p class="card-text">Le patient peut prendre rendez-vous avec le médecin depuis la page d'accueil ou depuis son panneau de connexion.</p>
          </div>
        </div>
      </div>
      <!-- Carte 3 -->
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">3</h5>
            <p class="card-text">Prendre un traitement</p>
            <p class="card-text">Les médecins peuvent interagir avec les patients et faire le traitement correspondant.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- Section Slider des services -->
<section id="service" class="container py-5 ">
  <div class="row">
    <!-- Titre -->
    <div class="col-md-12 text-center mb-4">
      <h1 class="h1-gradient mb-5">Notre Services</h1>
    </div>
    <!-- Slider centré -->
    <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
      <div class="carousel-inner" style="padding: 1em;">
        <div class="carousel-item active">
          <div class="cards-wrapper d-flex justify-content-center">
            <div class="card">
              <img src="img/163800857.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title1</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              </div>
            </div>
            <div class="card">
              <img src="img/2968304.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              </div>
            </div>
            <div class="card">
              <img src="img/5789876.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="cards-wrapper d-flex justify-content-center">
            <div class="card">
              <img src="img/young-doctor-supporting-his-patient.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title4</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              </div>
            </div>
            <div class="card">
              <img src="img/planningr.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title5</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              </div>
            </div>
            <div class="card">
              <img src="img/pexels-cottonbro-studio-7579831.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title6</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              </div>
            </div>
          </div>
        </div>
        <!-- Ajoutez plus de slides ici -->
      </div>
      <a class="carousel-control-prev" id="prev1" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" id="next1" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>








  <!-- Formulaire Section -->
  <section class="container py-1 pt-5">
    <h2 class="text-center mb-4 text-color-gradient">Votre opinion sur notre cabinet médical</h2>
    <div class="row">
      <div class="col-md-6">
        <form id="feedbackForm" action="#" method="POST">
          <div class="mb-3">
            <label for="nomComplet" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="nomComplet" name="nomComplet" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-4">
            <label for="avis" class="form-label">Votre avis sur notre cabinet médical</label>
            <textarea class="form-control" id="avis" name="avis" rows="5" required></textarea>
          </div>
          <div class="mb-4">
            <p>Donnez une note :</p>
            <div class="rating">
              <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
              <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
              <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
              <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
              <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Soumettre</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="text-center">
          <img src="img/9019830.jpg" alt="Image de décoration" class="img-fluid">
        </div>
      </div>
    </div>
  </section>




  <!-- Footer Section -->
  <footer class="container-fluid bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>À propos de nous</h3>
          <p>Un système de réservation de rendez-vous pour patients, marque blanche.</p>
        </div>
        <div class="col-md-4">
          <h3>Liens utiles</h3>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="service">Services</a></li>
            <li><a href="#">....</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>Contactez-nous</h3>
          <p>Adresse : Cabinet Medival Health Care, Bd Ghandi, Casablanca 20250 <br> Téléphone : 05 12 13 14 15<br> Email : Healthcare@gmail.com</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- jQuery (nécessaire pour les plugins Bootstrap JavaScript) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Incluez tous les plugins compilés (ci-dessous), ou incluez individuellement les fichiers JS de plugins Bootstrap lorsque vous en avez besoin -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Script pour activer le carrousel -->
  <script>
    $(document).ready(function() {
      $('.carousel').carousel({
        interval: 3000 // Temps en millisecondes entre chaque diapositive (3 secondes dans cet exemple)
      });
    });

    window.addEventListener('load', function() {
      document.querySelector('.header').style.opacity = '1';
    });
    //navbar function
    window.addEventListener('load', function() {
      document.querySelector('.navbar').style.opacity = '1';
    });


    // Sélection de l'élément déclencheur et du menu déroulant
    const dropdownTrigger = document.querySelector('.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Ajout d'un gestionnaire d'événements au clic sur l'élément déclencheur
    dropdownTrigger.addEventListener('click', function() {
      // Vérification de l'état actuel du menu déroulant
      const isOpen = dropdownMenu.classList.contains('show');

      // Si le menu déroulant est ouvert, le fermer
      if (isOpen) {
        dropdownMenu.classList.remove('show');
      } else { // Sinon, l'ouvrir
        dropdownMenu.classList.add('show');
      }
    });

    // Fermer le menu déroulant lorsqu'on clique en dehors de celui-ci
    document.addEventListener('click', function(event) {
      // Si l'élément cliqué n'est pas l'élément déclencheur ou le menu déroulant
      if (!event.target.matches('.dropdown-toggle') && !event.target.matches('.dropdown-menu')) {
        dropdownMenu.classList.remove('show'); // Fermer le menu déroulant
      }
    });
    const stars = document.querySelectorAll('.rating input[type="radio"]');
    stars.forEach((star) => {
      star.addEventListener('change', function() {
        console.log('Vous avez sélectionné ' + this.value + ' étoiles.');
      });
    });

  function showLoginForm() {
    // Sélectionnez la fenêtre modale par son ID
    var loginModal = document.getElementById('loginModal');
    // Affichez la fenêtre modale
    $(loginModal).modal('show');
  }
  document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    const eyeIcon = document.querySelector('#togglePassword i');
    eyeIcon.classList.toggle('fa-eye');
    eyeIcon.classList.toggle('fa-eye-slash');
  });

  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
