<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    // Vérification simple (à remplacer par une vérification avec une BDD)
    if ($pseudo === 'employee' && $password === 'MDPemployee') {
        $_SESSION['logged_in'] = true;
        header("Location: employee_page.php");
        exit;
    } else {
        $error = "Identifiants incorrects.";
        header("Location: employee_form.php");
        exit;
    }
}
?>