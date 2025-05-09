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
                        <a class="nav-link active" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h1 class="text">Espace d'administration des habitats</h1>

            <h2 class="text">Ici vous pouvez ajouter la présentation du 1er habitat de la page habitat</h2>
            <form method="POST">
                <input type="text" name="nom" placeholder="nom" required>
                <textarea name="description" placeholder="description" required></textarea>
                <textarea name="commentaire_habitat" placeholder="commentaire_habitat" required></textarea>
                <button type="submit" name="habitat_ajouter">Ajouter</button>
            </form>

            <h2 class="text">Habitat existants sur le site:</h2>
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
                                    <button type="submit" name="modifier_habitat">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_habitat">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h1 class="text">Espace d'administration des images</h1>

            <h2 class="text">Ici vous pouvez ajouter l'image du 1er habitat de la page habitat</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="ajouter_image_habitat">Ajouter</button>
            </form>

            <h2 class="text">Image existante:</h2>
            <table class="text">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images_habitat as $image): ?>
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
                                    <button type="submit" name="modifier_image_habitat">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_image_habitat">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h2 class="text">Ici vous pouvez ajouter la présentation du 2ème habitat de la page habitat</h2>
            <form method="POST">
                <input type="text" name="nom" placeholder="nom" required>
                <textarea name="description" placeholder="description" required></textarea>
                <textarea name="commentaire_habitat" placeholder="commentaire_habitat" required></textarea>
                <button type="submit" name="habitat_ajouter_sec">Ajouter</button>
            </form>

            <h2 class="text">Habitat existants sur le site:</h2>
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
                                    <button type="submit" name="modifier_habitat_sec">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_habitat_sec">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h1 class="text">Espace d'administration des images</h1>

            <h2 class="text">Ici vous pouvez ajouter l'image du 2ème habitat de la page habitat</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="ajouter_image_habitat_sec">Ajouter</button>
            </form>

            <h2 class="text">Image existante:</h2>
            <table class="text">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images_habitat_sec as $image): ?>
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
                                    <button type="submit" name="modifier_image_habitat_sec">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_image_habitat_sec">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h2 class="text">Ici vous pouvez ajouter la présentation du 3ème habitat de la page habitat</h2>
            <form method="POST">
                <input type="text" name="nom" placeholder="nom" required>
                <textarea name="description" placeholder="description" required></textarea>
                <textarea name="commentaire_habitat" placeholder="commentaire_habitat" required></textarea>
                <button type="submit" name="habitat_ajouter_third">Ajouter</button>
            </form>

            <h2 class="text">Habitat existants sur le site:</h2>
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
                                    <button type="submit" name="modifier_third_habitat">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_third_habitat">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h1 class="text">Espace d'administration des images</h1>

            <h2 class="text">Ici vous pouvez ajouter l'image du 3ème habitat de la page habitat</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="ajouter_image_habitat_third">Ajouter</button>
            </form>

            <h2 class="text">Image existante:</h2>
            <table class="text">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images_habitat_third as $image): ?>
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
                                    <button type="submit" name="modifier_image_habitat_third">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_image_habitat_third">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h2 class="text">Ici vous pouvez ajouter la présentation du 4ème habitat de la page habitat</h2>
            <form method="POST">
                <input type="text" name="nom" placeholder="nom" required>
                <textarea name="description" placeholder="description" required></textarea>
                <textarea name="commentaire_habitat" placeholder="commentaire_habitat" required></textarea>
                <button type="submit" name="habitat_ajouter_last">Ajouter</button>
            </form>

            <h2 class="text">Habitat existants sur le site:</h2>
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
                                    <button type="submit" name="modifier_last_habitat">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $contenu['habitat_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_last_habitat">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div>
            <h1 class="text">Espace d'administration des images</h1>

            <h2 class="text">Ici vous pouvez ajouter l'image du 4ème habitat de la page habitat</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="ajouter_image_habitat_last">Ajouter</button>
            </form>

            <h2 class="text">Image existante:</h2>
            <table class="text">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images_habitat_last as $image): ?>
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
                                    <button type="submit" name="modifier_image_habitat_last">Modifier</button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $image['image_id'] ?>">
                                    <button class="action-btn" type="submit" name="supprimer_image_habitat_last">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>