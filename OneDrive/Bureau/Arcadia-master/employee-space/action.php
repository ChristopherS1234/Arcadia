<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("INSERT INTO service (nom, description) VALUES (?, ?)");
        $stmt->execute([$nom, $description]);
    } elseif (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("UPDATE service SET nom = ?, description = ? WHERE service_id = ?");
        $stmt->execute([$nom, $description, $id]);
    } elseif (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM service WHERE service_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$service = $pdo->query("SELECT * FROM service")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter2'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("INSERT INTO service_sec (nom, description) VALUES (?, ?)");
        $stmt->execute([$nom, $description]);
    } elseif (isset($_POST['modifier2'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $stmt = $pdo->prepare("UPDATE service_sec SET nom = ?, description = ? WHERE service_id = ?");
        $stmt->execute([$nom, $description, $id]);
    } elseif (isset($_POST['supprimer2'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM service_sec WHERE service_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$service_sec = $pdo->query("SELECT * FROM service_sec")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images = $pdo->query("SELECT * FROM image")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_sec'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_sec (image_date) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_sec'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_sec SET image_date = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_sec'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_sec WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_sec = $pdo->query("SELECT * FROM image_sec")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_third'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_third (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_third'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_third SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_third'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_third WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_third = $pdo->query("SELECT * FROM image_third")->fetchAll(PDO::FETCH_ASSOC);
?>
