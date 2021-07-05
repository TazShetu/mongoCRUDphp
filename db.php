<?php
require_once "vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
                            //"mongodb+srv://<username>:<password>@<cluster-address>/test?retryWrites=true&w=majority"

// list of database
//var_dump($client->listDatabases());

// select / create database (created if not exist)
$db = $client->phpCRUDdb;

// drop database
//$client->dropDatabase("db_name");





















