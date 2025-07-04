<?php
require 'admin-space/config.php';

function getContenus($pdo) {
    $stmt = $pdo->query("SELECT * FROM service");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$contenus = getContenus($pdo);
?>

<?php
require 'admin-space/config.php';

function getService($pdo) {
    $stmt = $pdo->query("SELECT * FROM service_sec");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$service = getService($pdo);
?>

<?php
require 'admin-space/config.php';

function getLastService($pdo) {
    $stmt = $pdo->query("SELECT * FROM last_service");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$serviceLast = getLastService($pdo);
?>