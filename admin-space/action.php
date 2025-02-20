<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        $titre = trim($_POST['titre']);  // Ajout de trim() pour nettoyer les espaces
        $description = trim($_POST['description']);
        
        // Vérification si l'entrée existe déjà
        $check = $pdo->prepare("SELECT COUNT(*) FROM accueil_contenus WHERE titre = ?");
        $check->execute([$titre]);
        
        if ($check->fetchColumn() > 0) {
            $_SESSION['error'] = "Ce titre existe déjà dans la base de données";
        } else {
            try {
                $stmt = $pdo->prepare("INSERT INTO accueil_contenus (titre, description) VALUES (?, ?)");
                $stmt->execute([$titre, $description]);
                $_SESSION['message'] = "Contenu ajouté avec succès";
                header("Location: " . $_SERVER['PHP_SELF']); // Redirection pour éviter la double soumission
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de l'ajout : " . $e->getMessage();
            }
        }
    } elseif (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        // Vérifier si c'est 'titre' ou 'nom' qui est envoyé
        $titre = isset($_POST['titre']) ? trim($_POST['titre']) : trim($_POST['nom']);
        $description = trim($_POST['description']);
        try {
            $stmt = $pdo->prepare("UPDATE accueil_contenus SET titre = ?, description = ? WHERE id = ?");
            $stmt->execute([$titre, $description, $id]);
            $_SESSION['message'] = "Contenu modifié avec succès";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur lors de la modification : " . $e->getMessage();
        }
    } elseif (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM accueil_contenus WHERE id = ?");
            $stmt->execute([$id]);
            $_SESSION['message'] = "Contenu supprimé avec succès";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
}

// Récupération des contenus existants
try {
    $accueil_contenus = $pdo->query("SELECT * FROM accueil_contenus ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des contenus : " . $e->getMessage();
    $accueil_contenus = [];
}

// Affichage des messages
if (isset($_SESSION['message'])) {
    echo "<div class='success'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    echo "<div class='error'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
        if (isset($_POST['nom'])) {
            $nom = trim($_POST['nom']);
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            $stmt = $pdo->prepare("INSERT INTO service (nom, description) VALUES (?, ?)");
            $stmt->execute([$nom, $description]);
        }
    } elseif (isset($_POST['modifier'])) {
        if (isset($_POST['id']) && isset($_POST['nom'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            $stmt = $pdo->prepare("UPDATE service SET nom = ?, description = ? WHERE service_id = ?");
            $stmt->execute([$nom, $description, $id]);
        }
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

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['habitat_ajouter'])) {
        if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("INSERT INTO habitat (nom, description, commentaire_habitat) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $description, $commentaire]);
        }
    } elseif (isset($_POST['modifier_habitat'])) {
        if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("UPDATE habitat SET nom = ?, description = ?, commentaire_habitat = ? WHERE habitat_id = ?");
            $stmt->execute([$nom, $description, $commentaire, $id]);
        }
    } elseif (isset($_POST['supprimer_habitat'])) {
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
    if (isset($_POST['habitat_ajouter_sec'])) {
        if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("INSERT INTO habitat_sec (nom, description, commentaire_habitat) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $description, $commentaire]);
        }
    } elseif (isset($_POST['modifier_habitat_sec'])) {
        if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("UPDATE habitat_sec SET nom = ?, description = ?, commentaire_habitat = ? WHERE habitat_id = ?");
            $stmt->execute([$nom, $description, $commentaire, $id]);
        }
    } elseif (isset($_POST['supprimer_habitat_sec'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM habitat_sec WHERE habitat_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$habitat_sec = $pdo->query("SELECT * FROM habitat_sec")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['habitat_ajouter_third'])) {
        if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("INSERT INTO third_habitat (nom, description, commentaire_habitat) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $description, $commentaire]);
        }
    } elseif (isset($_POST['modifier_third_habitat'])) {
        if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("UPDATE third_habitat SET nom = ?, description = ?, commentaire_habitat = ? WHERE habitat_id = ?");
            $stmt->execute([$nom, $description, $commentaire, $id]);
        }
    } elseif (isset($_POST['supprimer_third_habitat'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM third_habitat WHERE habitat_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$third_habitat = $pdo->query("SELECT * FROM third_habitat")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['habitat_ajouter_last'])) {
        if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("INSERT INTO last_habitat (nom, description, commentaire_habitat) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $description, $commentaire]);
        }
    } elseif (isset($_POST['modifier_last_habitat'])) {
        if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['commentaire_habitat'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $commentaire = trim($_POST['commentaire_habitat']);
            $stmt = $pdo->prepare("UPDATE last_habitat SET nom = ?, description = ?, commentaire_habitat = ? WHERE habitat_id = ?");
            $stmt->execute([$nom, $description, $commentaire, $id]);
        }
    } elseif (isset($_POST['supprimer_last_habitat'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM last_habitat WHERE habitat_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$last_habitat = $pdo->query("SELECT * FROM last_habitat")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';

// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_animal'])) {
        if (isset($_POST['prenom']) && isset($_POST['etat']) && isset($_POST['race'])) {
            $nom = trim($_POST['prenom']);
            $description = trim($_POST['etat']);
            $race = trim($_POST['race']);
            $stmt = $pdo->prepare("INSERT INTO animal (prenom, etat, race) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $description, $race]);
        }
    } elseif (isset($_POST['modifier_animal'])) {
        if (isset($_POST['id']) && isset($_POST['prenom']) && isset($_POST['etat']) && isset($_POST['race'])) {
            $id = $_POST['id'];
            $nom = trim($_POST['prenom']);
            $description = trim($_POST['etat']);
            $race = trim($_POST['race']);
            $stmt = $pdo->prepare("UPDATE animal SET prenom = ?, etat = ?, race = ? WHERE animal_id = ?");
            $stmt->execute([$nom, $description, $race, $id]);
        }
    } elseif (isset($_POST['supprimer_animal'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM animal WHERE animal_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$animal = $pdo->query("SELECT * FROM animal")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
// Gestion de l'ajout, modification et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_rapport_veterinaire'])) {
        $titre = date("Y-m-d H:i:s");
        $description = $_POST['description'];
        $stmt = $pdo->prepare("INSERT INTO rapport_veterinaire (date, detail) VALUES (?, ?)");
        $stmt->execute([$titre, $description]);
    } elseif (isset($_POST['modifier_rapport_veterinaire'])) {
        $id = $_POST['id'];
        $titre = date("Y-m-d H:i:s");
        $description = $_POST['description'];
        $stmt = $pdo->prepare("UPDATE rapport_veterinaire SET date = ?, detail = ? WHERE rapport_veterinaire_id = ?");
        $stmt->execute([$titre, $description, $id]);
    } elseif (isset($_POST['supprimer_rapport_veterinaire'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM rapport_veterinaire WHERE rapport_veterinaire_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des contenus
$contenus = $pdo->query("SELECT * FROM rapport_veterinaire")->fetchAll(PDO::FETCH_ASSOC);

// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            try {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);
                if ($image_data === false) {
                    throw new Exception("Erreur lors de la lecture du fichier");
                }
                
                $stmt = $pdo->prepare("INSERT INTO image (image_data) VALUES (?)");
                $success = $stmt->execute([$image_data]);
                
                if (!$success) {
                    throw new Exception("Erreur lors de l'insertion dans la base de données");
                }
                
                echo "<!-- Image insérée avec succès. Taille : " . strlen($image_data) . " octets -->";
            } catch (Exception $e) {
                echo "<!-- Erreur : " . $e->getMessage() . " -->";
            }
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

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_habitat'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_habitat (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_habitat'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_habitat SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_habitat'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_habitat WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_habitat = $pdo->query("SELECT * FROM image_habitat")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_habitat_sec'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_habitat_sec (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_habitat_sec'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_habitat_sec SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_habitat_sec'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_habitat_sec WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_habitat_sec = $pdo->query("SELECT * FROM image_habitat_sec")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_habitat_third'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_habitat_third (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_habitat_third'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_habitat_third SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_habitat_third'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_habitat_third WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_habitat_third = $pdo->query("SELECT * FROM image_habitat_third")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_habitat_last'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_habitat_last (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_habitat_last'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_habitat_last SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_habitat_last'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_habitat_last WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_habitat_last = $pdo->query("SELECT * FROM image_habitat_last")->fetchAll(PDO::FETCH_ASSOC);
?> 

<?php
require './config.php';
// Gestion des images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_image_accueil'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $pdo->prepare("INSERT INTO image_accueil (image_data) VALUES (?)");
            $stmt->execute([$image_data]);
        }
    } elseif (isset($_POST['modifier_image_accueil'])) {
        if (isset($_FILES['nouvelle_image']) && $_FILES['nouvelle_image']['error'] === 0) {
            $id = $_POST['id'];
            $image_data = file_get_contents($_FILES['nouvelle_image']['tmp_name']);
            $stmt = $pdo->prepare("UPDATE image_accueil SET image_data = ? WHERE image_id = ?");
            $stmt->execute([$image_data, $id]);
        }
    } elseif (isset($_POST['supprimer_image_accueil'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM image_accueil WHERE image_id = ?");
        $stmt->execute([$id]);
    }
}

// Récupération des images
$images_accueil = $pdo->query("SELECT * FROM image_accueil")->fetchAll(PDO::FETCH_ASSOC);
?>