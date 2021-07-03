<?php
require_once "vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
                            //"mongodb+srv://<username>:<password>@<cluster-address>/test?retryWrites=true&w=majority"

// list of database
//var_dump($client->listDatabases());

// drop database
//$client->dropDatabase("db_name");

// select / create database (created if not exist)
$db = $client->phpCRUDdb;


// create collection (table)
//$db->createCollection("test");

// list of collections
//foreach ($db->listCollections() as $c) {
//    var_dump($c);
//}

// drop collection (table)
//$db->dropCollection("collection_name");

















