<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
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
                    <li class="nav-item">
                        <a class="nav-link active" href="../app/connection.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active retour" href="../app/index.php">Retour vers l'Acceuil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
        <div class="single-image">
            <img src="../image/singe.jpeg" alt="Image principale">
        </div>

        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        Les Singes : L’Agilité et l’Intelligence en Mouvement
                    </h1>
                    <h5 class="text">
                        Les singes du zoo Arcadia émerveillent les visiteurs par leur agilité et leur intelligence remarquable. Ces primates, qu’ils soient capucins, gibbons ou chimpanzés, possèdent une grande capacité d’apprentissage et de communication. Leurs interactions sociales sont complexes et basées sur des liens de coopération et d’entraide. Leur habitat au sein du zoo est aménagé avec des cordes, des branches et des plateformes pour stimuler leur comportement naturel de grimpeurs. Chaque jour, les soigneurs leur proposent des jeux et des énigmes alimentaires pour développer leur curiosité et leur dextérité. Dans la nature, de nombreuses espèces de singes sont menacées par la déforestation et le trafic animalier. Arcadia participe à des programmes de conservation pour la protection des primates en danger et sensibilise le public à leur sauvegarde.
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
                <h3 class="summary">
                    Dans la Jungle!
                </h3>
                <p>
                    <button class="btn btn-success"><a class="nav-link active" href="../app/habitat-2.php"> En Savoir Plus</a></button>
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
                <a href="../index.php">Accueil</a>
                <a href="#">À propos</a>
                <a href="#">Mentions légales</a>
                <a href="../admin-space/admin_form.php">Lien vers la page d'administration du site</a>
            </div>
        </div>
    </footer>
    <script src="../images.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>