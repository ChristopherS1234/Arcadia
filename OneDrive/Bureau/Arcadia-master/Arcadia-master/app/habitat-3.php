<?php include 'habitat_data.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acrcadia Glacier</title>
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
    <section class="summary-2 d-flex justify-content-center align-items-center pt-5">

    <div>
            <p>
                <button class="btn btn-success">
                    <a class="nav-link active" href="./habitat-2.php">< Précédent</a>
                </button>
            </p>
        </div>
        <div class="single-image">
            <?php
            require '../admin-space/config.php';
            $stmt = $pdo->query("SELECT * FROM image_habitat_third ORDER BY image_id DESC LIMIT 1");
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
        <div>
            <p>
                <button class="btn btn-success">
                    <a class="nav-link active" href="./habitat-4.php">Suivant ></a>
                </button>
            </p>
        </div>

    </section>
    <?php if (!empty($third_habitat)): ?>
        <?php foreach ($third_habitat as $contenu): ?>
            <section class="avis">
                <div class="avis-container">
                    <h2 class="text"><?= htmlspecialchars($contenu['nom']) ?></h2>
                    <div class="avis-card">
                        <p class="avis-texte"><?= htmlspecialchars($contenu['description']) ?></p>
                    </div>
                </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun habitat disponible.</p>
    <?php endif; ?>
    <script src="./images.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>