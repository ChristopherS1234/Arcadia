<?php
require __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'] ?? '';
    $password = $_POST['mot_de_passe'] ?? '';

    if (!empty($pseudo) && !empty($password)) {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->ma_base->employee;

        // Vérifie si le pseudo existe déjà
        $existingUser = $collection->findOne(['pseudo' => $pseudo]);
        if ($existingUser) {
            $error = "Ce pseudo est déjà utilisé.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $collection->insertOne([
                'pseudo' => $pseudo,
                'mot_de_passe' => $hashedPassword
            ]);

            $success = "Utilisateur enregistré avec succès.";
        }
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}
?>

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
                        <a class="nav-link active retour" href="./register.php">Création de compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
        <div class="container my-5">
            <div class="card shadow-lg rounded-4 p-4">
                <div class="card-body">
                    <h1 class="card-title text-center mb-3">Création de Compte Employé</h1>
                    <h5 class="card-subtitle text-center mb-4 text-muted">
                        Créez un pseudo et un mot de passe pour qu'un employé puisse accéder à son éspace.
                    </h5>

                    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                    <?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo* :</label>
                            <input type="text" class="form-control" name="pseudo" id="pseudo" required><br><br>
                        </div>
                        <div class="mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe* :</label>
                            <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required><br><br>
                        </div>
                        <div class="text-end">
                        <input type="submit" class="btn btn-success" value="Enregistrer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>