<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin_page.php");
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

<body class="admin-body">
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
                        <a class="nav-link active" aria-current="page" href="admin_page.php">Acceuil du site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_service.php">Service du site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./admin_habitat.php">Habitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_animal.php">Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_rapport.php">Rapport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard_stats.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active retour" href="./register.php">Création de compte</a>
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
            <h1 class="admin-title">Espace d'administration des animaux</h1>
            <div class="admin-card">
                <h2 class="text">Ajouter un animal pour pouvoir rester informé de l'état des animaux du Zoo</h2>
                <form method="POST">
                    <div class="mb-3">
                    <input type="text" class="form-control" name="prenom" placeholder="prenom" required>
                    </div>
                    <div class="mb-3">
                    <input type="text" class="form-control" name="label" placeholder="label" required>
                    </div>
                    <div class="mb-3">
                    <textarea name="etat" class="form-control" placeholder="etat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="ajouter_animal">Ajouter</button>
                </form>

                <h2 class="text">Contenus existants sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>prenom</th>
                            <th>race</th>
                            <th>etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($animal as $contenu): ?>
                            <tr>
                                <td><?= $contenu['animal_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['prenom']) ?></td>
                                <td><?= htmlspecialchars($contenu['race']) ?></td>
                                <td><?= htmlspecialchars($contenu['etat']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['animal_id'] ?>">
                                        <input type="text" class="form-control" name="prenom" value="<?= htmlspecialchars($contenu['prenom']) ?>" required>
                                        <input type="text" class="form-control" name="race" value="<?= htmlspecialchars($contenu['race']) ?>" required>
                                        <textarea name="etat" class="form-control" required><?= htmlspecialchars($contenu['etat']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier_animal">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['animal_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer_animal">Supprimer</button>
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