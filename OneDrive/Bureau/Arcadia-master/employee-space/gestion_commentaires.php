<?php
require '../admin-space/config.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: employee_form.php');
    exit();
}

// Traitement de l'approbation/suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approuver']) && isset($_POST['id'])) {
        $stmt = $pdo->prepare("UPDATE commentaire SET approuve = 1 WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    } elseif (isset($_POST['supprimer']) && isset($_POST['id'])) {
        $stmt = $pdo->prepare("DELETE FROM commentaire WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Récupération des commentaires
try {
    $stmt = $pdo->query("SELECT * FROM commentaire ORDER BY date_creation DESC");
    $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des commentaires</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <section class="banner-2 justify-content-center align-items-center pt-5">
        <div class="container mt-4">
            <h1 class="text">Gestion des commentaires</h1>
            <p class="text">Ici vous pouvez gérer les commentaires que les clients ont postés sur le site</p>

            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Commentaire</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commentaires as $commentaire): ?>
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($commentaire['date_creation'])); ?></td>
                            <td><?php echo htmlspecialchars($commentaire['nom']); ?></td>
                            <td><?php echo htmlspecialchars($commentaire['commentaire']); ?></td>
                            <td>
                                <?php echo $commentaire['approuve'] ?
                                    '<span class="badge bg-success">Approuvé</span>' :
                                    '<span class="badge bg-warning">En attente</span>'; ?>
                            </td>
                            <td>
                                <?php if (!$commentaire['approuve']): ?>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $commentaire['id']; ?>">
                                        <button type="submit" name="approuver" class="btn btn-success btn-sm">Approuver</button>
                                    </form>
                                <?php endif; ?>

                                <form method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                    <input type="hidden" name="id" value="<?php echo $commentaire['id']; ?>">
                                    <button type="submit" name="supprimer" class="btn btn-danger btn-sm">Supprimer</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>