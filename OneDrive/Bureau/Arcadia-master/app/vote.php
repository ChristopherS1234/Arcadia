<?php
require __DIR__ . '/../../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->arcadia->votes;

$ip = $_SERVER['REMOTE_ADDR'];
$data = json_decode(file_get_contents("php://input"), true);
$animal = $data['animal'] ?? null;

if (!$animal) {
    echo json_encode(["error" => "Aucun choix reçu"]);
    exit;
}

// Vérifie si l'adresse IP a déjà voté
$alreadyVoted = $collection->findOne(['ip' => $ip]);

if ($alreadyVoted) {
    echo json_encode(["message" => "Vous avez déjà voté."]);
    exit;
}

// Enregistre le vote avec l'IP
$collection->insertOne([
    'animal' => $animal,
    'ip' => $ip,
    'voted_at' => new MongoDB\BSON\UTCDateTime()
]);

// Ensuite, renvoyer aussi les résultats mis à jour
$results = $collection->aggregate([
    ['$group' => ['_id' => '$animal', 'count' => ['$sum' => 1]]]
]);

$output = [];
foreach ($results as $result) {
    $output[$result['_id']] = $result['count'];
}

echo json_encode([
    "message" => "Merci pour votre vote !",
    "results" => $output
]);


echo json_encode(["message" => "Merci pour votre vote !"]);
?>

