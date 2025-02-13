<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Agile - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?team,work') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .feature-icon {
            font-size: 3rem;
            color: #007bff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Gestion Agile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Fonctionnalités</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <h1>Optimisez votre gestion de projet Agile</h1>
        <p>Simplifiez la collaboration et boostez la productivité de votre équipe.</p>
        <a href="#" class="btn btn-primary btn-lg">Commencez maintenant</a>
    </header>

    <section id="features" class="container text-center my-5">
        <h2 class="mb-4">Fonctionnalités clés</h2>
        <div class="row">
            <div class="col-md-4">
                <i class="feature-icon bi bi-kanban"></i>
                <h4>Tableau Kanban interactif</h4>
                <p>Visualisez et gérez vos tâches en temps réel.</p>
            </div>
            <div class="col-md-4">
                <i class="feature-icon bi bi-people"></i>
                <h4>Collaboration en équipe</h4>
                <p>Assignez des tâches et communiquez facilement.</p>
            </div>
            <div class="col-md-4">
                <i class="feature-icon bi bi-bar-chart"></i>
                <h4>Suivi des performances</h4>
                <p>Analysez l’avancement et optimisez la productivité.</p>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Gestion Agile - Tous droits réservés</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
