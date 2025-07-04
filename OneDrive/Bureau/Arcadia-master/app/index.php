<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Arcadia</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Arcadia</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./resume.php">Qui somme nous ?</a>
                    </li>
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

    <section class="banner d-flex justify-content-center align-items-center pt-5">
        <div class="container my-5 py-5">
            <div class="row">
                <h1 class="title-acc">
                    ARCADIA
                </h1>
                <h3 class="summary text-truncate-sm">
                    Est situé en Bretagne, à proximité de la légendaire forêt de Brocéliande, est un lieu emblématique qui émerveille petits et grands depuis 1960.
                    Véritable sanctuaire de biodiversité, il accueille une grande variété d’animaux...
                </h3>

                <p>
                    <button class="btn btn-success"><a class="nav-link active" href="./resume.php">En savoir plus</a></button>
                    <button class="btn btn-success"><a class="nav-link active" href="contact.php">Nous contacter</a></button>
                </p>
            </div>
        </div>
    </section>

    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
        <div class="single-image">
            <?php
            require 'admin-space/config.php';
            $stmt = $pdo->query("SELECT * FROM image_accueil ORDER BY image_id DESC LIMIT 1");
            $image = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($image && !empty($image['image_data'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($image['image_data']) . '" 
                  alt="Image principale" 
                  class="section-image">';
            } else {
                echo '<img src="./image/forest1.jpg" alt="Image par défaut">';
            }
            ?>
        </div>
        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        Les Animaux et leurs Habitas
                    </h1>
                    <h4 class="text">
                        Le zoo Arcadia propose des habitats recréant les environnements naturels des animaux pour
                        favoriser leur bien-être. <br>
                        La Savane accueille girafes, lions et zèbres dans de vastes plaines ensoleillées. <br>
                        Tandis quela Jungle abrite singes,
                        perroquets et tigres dans une végétation luxuriante. <br>
                        Les Marais, avec leurs bassins et zones
                        humides,sont le refuge des crocodiles et oiseaux aquatiques. <br>
                        Chaque espace est pensé pour respecter les besoins des animaux et offrir une expérience
                        immersive aux visiteurs.
                        <h4>
                            <p>
                                <button class="btn btn-success"><a class="nav-link active" href="./habitat-1.php">En
                                        savoir plus</a></button>
                            </p>
                </div>
            </div>
        </div>
    </section>

    
    <section class="container my-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="text-avis">Avis de nos visiteurs</h2>
                <p class="text-avis">Découvrez ce que nos visiteurs pensent de leur expérience</p>
            </div>
        </div>

        <!-- Affichage des commentaires approuvés (POO) -->
        <div class="row">
            <?php
            require_once 'Commentaire.php';
            require 'admin-space/config.php';
            try {
                $commentaireManager = new Commentaire($pdo);
                $commentaires = $commentaireManager->getCommentairesApprouves();

                if (empty($commentaires)) {
                    echo '<div class="col-12 text-center">
                            <p>Aucun avis pour le moment. Soyez le premier à partager votre expérience !</p>
                          </div>';
                } else {
                    foreach ($commentaires as $commentaire): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title mb-0"><?php echo htmlspecialchars($commentaire['nom']); ?></h5>
                                        <small class="text-muted">
                                            <?php echo date('d/m/Y', strtotime($commentaire['date_creation'])); ?>
                                        </small>
                                    </div>
                                    <p class="card-text"><?php echo htmlspecialchars($commentaire['commentaire']); ?></p>
                                </div>
                            </div>
                        </div>
            <?php endforeach;
                }
            } catch (PDOException $e) {
                echo '<div class="col-12 text-center">
                        <p class="text-danger">Une erreur est survenue lors du chargement des avis.</p>
                      </div>';
            }
            ?>
        </div>

        <!-- Formulaire pour ajouter un commentaire -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Partagez votre expérience</h5>

                        <?php if (isset($_GET['comment_success'])): ?>
                            <div class="alert alert-success">
                                Merci pour votre commentaire ! Il sera visible après validation.
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_GET['comment_error'])): ?>
                            <div class="alert alert-danger">
                                Une erreur est survenue. Veuillez réessayer.
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="add_comment.php">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Votre nom*</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="commentaire" class="form-label">Votre avis*</label>
                                <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Envoyer</button>
                            </div>
                        </form>
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
                <h5>Numéro tél: 0122334455 <br>Email: arcadiazoo@gmail.fr</h5>
                <p>Situé près de la forêt de Brocéliande, en Bretagne.</p>
                <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
            </div>
            <div class="footer-links">
                <a href="#">Accueil</a>
                <a href="#">À propos</a>
                <a href="#">Mentions légales</a>
                <a href="./connection.php">Lien vers la page d'administration du site</a>
            </div>
        </div>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>