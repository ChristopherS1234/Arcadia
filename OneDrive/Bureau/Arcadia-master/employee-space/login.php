<?php
session_start();
require __DIR__ . '/../vendor/autoload.php'; // charge Composer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['mot_de_passe'];

    $client = new MongoDB\Client("mongodb://mongo_user:mongo_password@mongo:27017");
    $collection = $client->ma_base->employee;

    $user = $collection->findOne(['pseudo' => $pseudo]);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['logged_in'] = true;
        header("Location: employee_page.php");
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>