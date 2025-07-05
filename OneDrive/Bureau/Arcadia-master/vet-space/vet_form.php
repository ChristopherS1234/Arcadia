<?php include 'login.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Vétérinaire</title>
    <link rel="stylesheet" href="../style.css">
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
                        <a class="nav-link active retour" href="../index.php">Retour vers l'Acceuil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
<div class="form-container">
            <h1 class="text">Page de connection de l'espace pour les Employé</h1>
            <h5 class="text">(Cette page est uniquement réservé au personnel du Zoo arcadia, <br> une fois connecter vous serez redirigé vers la page d'administration employé du site web.) </h5>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Fomulaire de connexion</h5>
                            <?php if (isset($error)) : ?>
                                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                            <?php endif; ?>

                            <form method="POST">
                                <div class="mb-3">
                                    <label for="pseudo" >Nom d'utilisateur* :</label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" required><br><br>
                                </div>
                                <div class="mb-3">
                                    <label for="mot_de_pasee" >Mot de passe* :</label>
                                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required><br><br>
                                </div>
                                <button class="btn btn-success" type="submit">Connection</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>