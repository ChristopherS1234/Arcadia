<?php
require './config.php';

// Vérification de la connexion admin ici si nécessaire

try {
    // Récupérer toutes les statistiques
    $stats = $pdo->query("SELECT * FROM click_stats ORDER BY click_count DESC")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des statistiques : " . $e->getMessage();
}
?>
<?php include 'action.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard - Statistiques des clics</title>
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
        <div class="dashboard-container">
            <div class="header">
                <h1 class="dashText">Statistiques des clics des boutons de la page des animaux</h1>
            </div>

            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <table class="stats-table">
                <thead>
                    <tr class="dashText">
                        <th>Page</th>
                        <th>Élément</th>
                        <th>Nombre de clics</th>
                        <th>Dernier clic</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stats as $stat): ?>
                        <tr class="dashText">
                            <td><?php echo htmlspecialchars($stat['page_name']); ?></td>
                            <td><?php echo htmlspecialchars($stat['element_name']); ?></td>
                            <td><?php echo $stat['click_count']; ?></td>
                            <td><?php echo $stat['last_clicked']; ?></td>
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