<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: vet_page.php");
    exit;
}
?>
<?php require_once '../admin-space/action.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Espace d'administration</title>
</head>

<body>
    <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Arcadia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vet_page.php">Rapport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vet_habitat.php">Habitats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        
        <div class="admin-container">
            <div class="admin-card">
                <h1 class="text">Habitats existants sur le site:</h1>
                <p class="text">Ici vous pouvez voir les habitats existants sur le site</p>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitat as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">
                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitat_sec as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">

                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($third_habitat as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">

                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($last_habitat as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>