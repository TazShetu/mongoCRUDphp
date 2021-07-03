<?php
require "vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->phpCRUDdb;

// create collection (table)
$db->createCollection("test");

foreach ($db->listCollections() as $c) {
    var_dump($c);
}


















