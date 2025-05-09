<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    // Vérification simple (à remplacer par une vérification avec une BDD)
    if ($pseudo === 'veteri' && $password === 'MDPveteri') {
        $_SESSION['logged_in'] = true;
        header("Location: vet_page.php");
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>