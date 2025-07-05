<?php
require __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://mongo_user:mongo_password@mongo:27017");
$collection = $client->arcadia->votes;

// Regroupe les votes par animal et compte-les
$results = $collection->aggregate([
    ['$group' => ['_id' => '$animal', 'count' => ['$sum' => 1]]]
]);

$output = [];
foreach ($results as $result) {
    $output[$result['_id']] = $result['count'];
}

echo json_encode($output);
?>
