<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter3'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("INSERT INTO last_service (nom, description) VALUES (?, ?)");
        $stmt->execute([$nom, $description]);
    } elseif (isset($_POST['modifier3'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("UPDATE last_service SET nom = ?, description = ? WHERE service_id = ?");
        $stmt->execute([$nom, $description, $id]);
    } elseif (isset($_POST['supprimer3'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM last_service WHERE service_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$service_last = $pdo->query("SELECT * FROM last_service")->fetchAll(PDO::FETCH_ASSOC);
?>