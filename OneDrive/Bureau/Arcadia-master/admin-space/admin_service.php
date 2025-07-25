<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin_service.php");
    exit;
}
?>
<?php include '../employee-space/action.php'; ?>
<?php include '../employee-space/last_service.php'; ?>

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
    <section class="banner-2 justify-content-center align-items-center">
        <div class="admin-container">
            <h1 class="admin-title">Espace d'administration service</h1>

            <div class="admin-card">
                <h2 class="text">Ici vous pouvez ajouter le 1er pargraphe de la page service</h2>
                <form method="POST">
                    <div class="mb-3">
                    <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="ajouter">Ajouter</button>
                </form>

                <h2 class="text">Contenus existants sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($service as $contenu): ?>
                            <tr>
                                <td><?= $contenu['service_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['service_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <textarea name="description" required><?= htmlspecialchars($contenu['description']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['service_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">
                <h1 class="text">Image du service 1</h1>

                <h2 class="text">Ajouter une image</h2>
                <p class="text"> (ici vous pouvez ajouter l'image du 1er pargraphe de l'accueil)</p>
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" class="text" name="image" accept="image/*" required>
                    <button type="submit" class="btn btn-success" name="ajouter_image">Ajouter</button>
                </form>

                <h2 class="text">Images existantes:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($images as $image): ?>
                            <tr>
                                <td><?= $image['image_id'] ?></td>
                                <td>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($image['image_data']) ?>"
                                        alt="Image <?= $image['image_id'] ?>"
                                        style="max-width: 200px;">
                                </td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" enctype="multipart/form-data" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                        <input type="file" name="nouvelle_image" accept="image/*" required>
                                        <button type="submit" class="btn btn-success" name="modifier_image">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer_image">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">
                <h2 class="text">Ici vous pouvez ajouter le 2ème pargraphe de la page service</h2>
                <form method="POST">
                    <div class="mb-3">
                    <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="ajouter2">Ajouter</button>
                </form>

                <h2 class="text">Contenus existants sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($service_sec as $contenu): ?>
                            <tr>
                                <td><?= $contenu['service_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['service_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <textarea name="description" required><?= htmlspecialchars($contenu['description']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier2">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['service_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">
                <h1 class="text">Image du service 2</h1>

                <h2 class="text">Ajouter une image</h2>
                <p class="text"> (ici vous pouvez ajouter l'image du 2ème pargraphe de l'accueil)</p>
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" class="text" name="image" accept="image/*" required>
                    <button type="submit" class="btn btn-success" name="ajouter_image_sec">Ajouter</button>
                </form>

                <h2 class="text">Images existantes:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($images_sec as $image): ?>
                            <tr>
                                <td><?= $image['image_id'] ?></td>
                                <td>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($image['image_data']) ?>"
                                        alt="Image <?= $image['image_id'] ?>"
                                        style="max-width: 200px;">
                                </td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" enctype="multipart/form-data" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                        <input type="file" name="nouvelle_image" accept="image/*" required>
                                        <button type="submit" class="btn btn-success" name="modifier_image_sec">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer_image_sec">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">
                <h2 class="text">Ici vous pouvez ajouter le 3ème pargraphe de la page service</h2>
                <form method="POST">
                    <div class="mb-3">
                    <input type="text" class="form-control" name="nom" placeholder="nom" required>
                    </div>
                    <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="ajouter3">Ajouter</button>
                </form>

                <h2 class="text">Contenus existants sur le site:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($service_last as $contenu): ?>
                            <tr>
                                <td><?= $contenu['service_id'] ?></td>
                                <td><?= htmlspecialchars($contenu['nom']) ?></td>
                                <td><?= htmlspecialchars($contenu['description']) ?></td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['service_id'] ?>">
                                        <input type="text" name="nom" value="<?= htmlspecialchars($contenu['nom']) ?>" required>
                                        <textarea name="description" required><?= htmlspecialchars($contenu['description']) ?></textarea>
                                        <button type="submit" class="btn btn-success" name="modifier3">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $contenu['service_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer3">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="admin-card">
                <h1 class="text">Image du service 3</h1>

                <h2 class="text">Ajouter une image</h2>
                <p class="text"> (ici vous pouvez ajouter l'image a droite du 3ème pargraphe de l'accueil)</p>
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" class="text" name="image" accept="image/*" required>
                    <button type="submit" class="btn btn-success" name="ajouter_image_third">Ajouter</button>
                </form>

                <h2 class="text">Images existantes:</h2>
                <table class="text">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($images_third as $image): ?>
                            <tr>
                                <td><?= $image['image_id'] ?></td>
                                <td>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($image['image_data']) ?>"
                                        alt="Image <?= $image['image_id'] ?>"
                                        style="max-width: 200px;">
                                </td>
                                <td>
                                    <!-- Formulaire de modification -->
                                    <form method="POST" enctype="multipart/form-data" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                        <input type="file" name="nouvelle_image" accept="image/*" required>
                                        <button type="submit" class="btn btn-success" name="modifier_image_third">Modifier</button>
                                    </form>

                                    <!-- Formulaire de suppression -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                        <button class="action-btn" type="submit" name="supprimer_image_third">Supprimer</button>
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