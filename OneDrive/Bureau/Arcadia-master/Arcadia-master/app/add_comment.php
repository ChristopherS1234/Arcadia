<?php
require_once '../admin-space/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom']) && isset($_POST['commentaire'])) {
        try {
            // Validation côté serveur
            function validateInput($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $nom = validateInput($_POST['nom']);
            $commentaire = validateInput($_POST['commentaire']);
            
            if (empty($nom) || empty($commentaire)) {
                throw new Exception("Tous les champs sont requis");
            }
            
            $stmt = $pdo->prepare("INSERT INTO commentaire (nom, commentaire) VALUES (?, ?)");
            $stmt->execute([$nom, $commentaire]);
            
            header("Location: index.php?comment_success=1");
            exit();
        } catch (Exception $e) {
            // Log l'erreur pour le débogage
            error_log("Erreur d'insertion de commentaire : " . $e->getMessage());
            header("Location: index.php?comment_error=1");
            exit();
        }
    } else {
        header("Location: index.php?comment_error=2");
        exit();
    }
}

header("Location: index.php");
exit();
?> 