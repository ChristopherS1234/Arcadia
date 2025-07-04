<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Serpent | Arcadia</title>
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
            <img src="../image/serpent.jpg" alt="Image principale">
        </div>

        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        Le Serpent : Un Maître de l’Adaptation
                    </h1>
                    <h5 class="text">
                        Fascinants et redoutés, les serpents sont des reptiles capables de s’adapter à une grande variété d’habitats. Certains, comme le python, se faufilent dans les jungles humides, tandis que d’autres, comme le cobra, évoluent dans des milieux plus arides. Leur corps long et souple leur permet de se déplacer silencieusement et d’attaquer leurs proies avec rapidité et précision. Au zoo Arcadia, ces reptiles sont hébergés dans des terrariums adaptés, où la température et l’humidité sont contrôlées pour correspondre à leur environnement naturel. Les visiteurs peuvent admirer leurs motifs fascinants et en apprendre davantage sur leur rôle clé dans l’équilibre écologique. Contrairement aux idées reçues, la plupart des serpents sont inoffensifs pour l’homme et jouent un rôle essentiel dans le contrôle des populations de rongeurs.
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
                    Où vit-ils ?
                </h1>
                <p>
                    <button class="btn btn-success"><a class="nav-link active" href="../app/habitat-2.php"> Cliquez ici pour avoir la Réponse</a></button>
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