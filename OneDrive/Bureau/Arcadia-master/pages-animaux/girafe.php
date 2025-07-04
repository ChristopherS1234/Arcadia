<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Girafe | Arcadia</title>
    <link rel="stylesheet" href="../app/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="../app/index.php">Arcadia</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../app/index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../app/resume.php">Qui somme nous ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../app/service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../app/habitat-1.php">Habitats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../app/animaux.php">Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../app/contact.php">Contact</a>
                    </li>
                </ul>

                <!-- Icône Connexion à droite -->
                <div class="d-flex ms-auto">
                    <a href="connection.php" class="nav-link text-white">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
        <div class="single-image">
            <img src="../image/girafe.jpg" alt="Image principale">
        </div>

        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        La Girafe : La Sentinelle de la Savane
                    </h1>
                    <h5 class="text">
                        Avec son long cou et ses grandes pattes élancées, la girafe est l’un des animaux les plus emblématiques de la savane. Herbivore, elle se nourrit principalement des feuilles des acacias qu’elle atteint aisément grâce à sa hauteur impressionnante, pouvant dépasser les 5 mètres. Son cœur puissant lui permet de pomper le sang jusqu’à sa tête sans difficulté. Au zoo Arcadia, elle évolue dans un vaste enclos parsemé d’arbres adaptés à son régime alimentaire. Les visiteurs peuvent l’observer en train de se nourrir grâce à des plateformes surélevées qui offrent une vue unique sur l’animal. Bien que paisible, la girafe sait se défendre en donnant de puissants coups de sabot. Victime du braconnage et de la réduction de son habitat, elle est aujourd’hui une espèce vulnérable. Le zoo sensibilise le public à sa protection grâce à des ateliers éducatifs et interactifs.
                        <h5>
                            <p>
                                <button class="btn btn-success"><a class="nav-link active"
                                        href="../app/animaux.php">Retour vers la liste</a></button>
                            </p>
                </div>
            </div>
        </div>
    </section>
    <section class="banner d-flex justify-content-center align-items-center pt-5">
        <div class="container my-5 py-5">
            <div class="row">
                <h1 class="title">
                    Où vit-il ?
                </h1>
                <p>
                    <button class="btn btn-success"><a class="nav-link active" href="../app/habitat-1.php"> Cliquez ici pour avoir la Réponse</a></button>
                </p>
            </div>
        </div>
        </div>
    </section>
    <footer class="footer" id="down">
        <div class="footer-container">
            <div class="footer-info">
                <h3>Zoo Arcadia</h3>
                <h4>Contactez nous:</h4>
                <h5>Numéro tél: 012233445566 <br>Email: arcadiazoo@gmail.fr</h5>
                <p>Situé près de la forêt de Brocéliande, en Bretagne.</p>
                <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
            </div>
            <div class="footer-links">
                <a href="../app/index.php">Acceuil</a>
                <a href="#">À propos</a>
                <a href="#">Mentions légales</a>
                <a href="../app/connection.php">Lien vers la page d'administration du site</a>
            </div>
        </div>
    </footer>
    <script src="../images.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>