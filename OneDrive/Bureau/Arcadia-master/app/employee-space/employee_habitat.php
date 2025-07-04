<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin_page.php");
    exit;
}
?>
<?php require_once '../admin-space/action.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css">
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
                        <a class="nav-link active" aria-current="page" href="employee_page.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="employee_habitat.php">Habitat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="gestion_commentaires.php">Gestion commentaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact_client.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="banner-2 justify-content-center align-items-center">
        <div class="admin-container">
            <h1 class="admin-title">Espace d'administration des habitats</h1>
            <div class="admin-card">

                <h2 class="text">Ajouter un contenu à la page habitat (1er habitat)</h2>
                <form method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea name="commentaire_habitat" class="form-control" placeholder="commentaire_habitat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="habitat_ajouter">Ajouter</button>
                </form>

                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitat as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <input type="text" name="description" value="<?= htmlspecialchars($contenu['description']) ?>" required>
                                        <textarea name="commentaire_habitat" required><?= htmlspecialchars($contenu['commentaire_habitat']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">

                <h2 class="text">Ajouter un contenu à la page habitat (2ème habitat)</h2>
                <form method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea name="commentaire_habitat" class="form-control" placeholder="commentaire_habitat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="habitat_ajouter">Ajouter</button>
                </form>

                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitat_sec as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <input type="text" name="description" value="<?= htmlspecialchars($contenu['description']) ?>" required>
                                        <textarea name="commentaire_habitat" required><?= htmlspecialchars($contenu['commentaire_habitat']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">

                <h2 class="text">Ajouter un contenu à la page habitat (3ème habitat)</h2>
                <form method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea name="commentaire_habitat" class="form-control" placeholder="commentaire_habitat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="habitat_ajouter">Ajouter</button>
                </form>

                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($third_habitat as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <input type="text" name="description" value="<?= htmlspecialchars($contenu['description']) ?>" required>
                                        <textarea name="commentaire_habitat" required><?= htmlspecialchars($contenu['commentaire_habitat']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">

                <h2 class="text">Ajouter un contenu à la page habitat (4ème habitat)</h2>
                <form method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea name="commentaire_habitat" class="form-control" placeholder="commentaire_habitat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="habitat_ajouter">Ajouter</button>
                </form>

                <h2 class="text">Habitat existant sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Commentaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($last_habitat as $contenu): ?>
                            <tr>
                                <td><?= $contenu['habitat_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td><?= htmlspecialchars($contenu['commentaire_habitat']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <input type="text" name="description" value="<?= htmlspecialchars($contenu['description']) ?>" required>
                                        <textarea name="commentaire_habitat" required><?= htmlspecialchars($contenu['commentaire_habitat']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
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