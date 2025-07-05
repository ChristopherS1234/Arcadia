<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: vet_page.php");
    exit;
}
?>
<?php include 'action.php'; ?>

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
                        <a class="nav-link active" aria-current="page" href="#">Rapport</a>
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
            <h1 class="admin-title">Espace d'administration Vétérinaire</h1>
            <div class="admin-card">
                <h2 class="text">Ici vous pouvez écrire un rapport vétérinaire qui sera lu par l'administrateur</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="detail" class="form-label"></label>
                        <textarea class="form-control" id="detail" name="detail" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="ajouter_rapport" class="btn btn-success">Ajouter le rapport</button>
                </form>

                <h2 class="text">Rapport existant:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rapport_veterinaire as $contenu): ?>
                            <tr>
                                <td><?= $contenu['rapport_veterinaire_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['date']) ?></td>
                                <td><?= htmlspecialchars($contenu['detail']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['rapport_veterinaire_id'] ?>">
                                        <input type="text" name="date" value="<?= htmlspecialchars($contenu['date']) ?>">
                                        <textarea name="detail"><?= htmlspecialchars($contenu['detail']) ?></textarea require>
                                    <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $contenu['rapport_veterinaire_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer">Supprimer</button>
                                </form>
                            </td>
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