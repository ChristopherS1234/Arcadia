<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_rapport'])) {
        $date = date("Y-m-d H:i:s");
        $detail = $_POST['detail'];
        $stmt = $pdo->prepare("INSERT INTO rapport_veterinaire (date, detail) VALUES (?, ?)");
        $stmt->execute([$date, $detail]);
    } elseif (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        $date = date("Y-m-d H:i:s");
        $detail = $_POST['detail'];
        $stmt = $pdo->prepare("UPDATE rapport_veterinaire SET date = ?, detail = ? WHERE rapport_veterinaire_id = ?");
        $stmt->execute([$date, $detail, $id]);
    } elseif (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM rapport_veterinaire WHERE rapport_veterinaire_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$rapport_veterinaire = $pdo->query("SELECT * FROM rapport_veterinaire")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("INSERT INTO habitat (nom, description) VALUES (?, ?)");
        $stmt->execute([$nom, $description]);
    } elseif (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("UPDATE habitat SET nom = ?, description = ? WHERE habitat_id = ?");
        $stmt->execute([$nom, $description, $id]);
    } elseif (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM habitat WHERE habitat_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$habitat = $pdo->query("SELECT * FROM habitat")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['habitat_ajouter'])) {
        if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("INSERT INTO habitat_sec (nom, description, commentaire_habitat) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $description, $commentaire]);
        }
    } elseif (isset($_POST['modifier'])) {
        if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("UPDATE habitat_sec SET nom = ?, description = ?, commentaire_habitat = ? WHERE habitat_id = ?");
            $stmt->execute([$nom, $description, $commentaire, $id]);
        }
    } elseif (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM habitat_sec WHERE habitat_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$habitat_sec = $pdo->query("SELECT * FROM habitat_sec")->fetchAll(PDO::FETCH_ASSOC);
?>