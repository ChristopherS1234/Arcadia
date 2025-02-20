<?php
$host = "127.0.0.1"; // Remplace localhost par 127.0.0.1
$port = 8889;
$dbname = "page_admin";
$user = "root";
$password = "root"; // MAMP utilise "root" comme mot de passe par défaut

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>