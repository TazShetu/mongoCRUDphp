<?php
require_once "vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
//$client = new MongoDB\Client("mongodb://localhost:27017", ["username" => "mongod_admin_all_db", "password" => "nYQP3,j_-=E(;<zz"]);

// list of database
//var_dump($client->listDatabases());

// select / create database (created if not exist)
$db = $client->phpCRUDdb;

// drop database
//$client->dropDatabase("db_name");





















