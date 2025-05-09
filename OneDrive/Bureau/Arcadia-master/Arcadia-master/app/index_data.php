<?php
require '../admin-space/config.php';

function getContenus($pdo) {
    $stmt = $pdo->query("SELECT * FROM accueil_contenus");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$contenus = getContenus($pdo);
?>