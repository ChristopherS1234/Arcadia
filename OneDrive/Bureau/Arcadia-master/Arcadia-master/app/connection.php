<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
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
                        <a class="nav-link active" href="animaux.php">Animaux</a>
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
        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        Connexion vers les pages d'administration
                    </h1>
                    <h3 class="text">
                        Quel est votre role chez Arcadia ?
                        <h3>
                            <p class="text">(cette page est uniquement dédié au personnel d'arcadia et va vous rediriger vers un formulaire de connexion)</p>
                            <ul>
                                <p>
                                    <button class="btn btn-success"><a class="nav-link active"
                                            href="../admin-space/admin_form.php">Admin</a></button>
                                </p>
                                <p>
                                    <button class="btn btn-success"><a class="nav-link active"
                                            href="../employee-space/employee_form.php">Employé</a></button>
                                </p>
                                <p>
                                    <button class="btn btn-success"><a class="nav-link active"
                                            href="../vet-space/vet_form.php">Vétérinaire</a></button>
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
                <a href="#">Accueil</a>
                <a href="#">À propos</a>
                <a href="#">Mentions légales</a>
                <a href="./admin-space/admin_form.php">Lien vers la page d'administration du site</a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>