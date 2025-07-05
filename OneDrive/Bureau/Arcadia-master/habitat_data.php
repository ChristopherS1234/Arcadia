<?php
require __DIR__ . '/admin-space/config.php';

function getHabitat($pdo) {
    $stmt = $pdo->query("SELECT * FROM habitat");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$habitat = getHabitat($pdo);
?>

<?php
require __DIR__ . '/admin-space/config.php';

function getHabitat_sec($pdo) {
    $stmt = $pdo->query("SELECT * FROM habitat_sec");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$habitat_sec = getHabitat_sec($pdo);
?>

<?php
require __DIR__ . '/admin-space/config.php';

function getThirdHabitat($pdo) {
    $stmt = $pdo->query("SELECT * FROM third_habitat");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$third_habitat = getThirdHabitat($pdo);
?>

<?php
require __DIR__ . '/admin-space/config.php';

function getLastHabitat($pdo) {
    $stmt = $pdo->query("SELECT * FROM last_habitat");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$last_habitat = getLastHabitat($pdo);
?>
