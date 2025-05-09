<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia Animaux</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Arcadia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./habitat-1.php">Habitats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./animaux.php">Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="connection.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active retour" href="./index.php">Retour vers l'Acceuil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
        <div class="single-image">
            <img src="../image/animals2.png" alt="Image principale">
        </div>

        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        Les Animaux du Zoo Arcadia
                    </h1>
                    <h5 class="text">
                        Voici une liste d'animaux que l'on peut retrouver au Zoo Arcadia, cliquez sur les boutton
                        ci-dessus pour accéder a leur information:
                        <h5>
                            <ul>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_lion')">
                                        <a class="nav-link active" href="../pages-animaux/lion.php">Le Lion</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_girafe')">
                                        <a class="nav-link active" href="../pages-animaux/girafe.php">La girafe</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_cerf')">
                                        <a class="nav-link active" href="../pages-animaux/cerf.php">Le cerf</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_loup')">
                                        <a class="nav-link active" href="../pages-animaux/loup.php">Le loup</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_singe')">
                                        <a class="nav-link active" href="../pages-animaux/singe.php">Les singes</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_serpent')">
                                        <a class="nav-link active" href="../pages-animaux/serpent.php">Les serpent</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_polair')">
                                        <a class="nav-link active" href="../pages-animaux/polair.php">L'ours polair</a>
                                    </button>
                                </p>
                            </ul>
                        </h5>
                </div>
            </div>
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
                <a href="./index.php">Accueil</a>
                <a href="#">À propos</a>
                <a href="#">Mentions légales</a>
                <a href="./admin-space/admin_form.php">Lien vers la page d'administration du site</a>
            </div>
        </div>
    </footer>

    <script src="./images.js"></script>
    <script>
        function trackClick(pageName, elementName) {
            fetch('admin-space/track_clicks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'page_name=' + encodeURIComponent(pageName) + '&element_name=' + encodeURIComponent(elementName)
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>