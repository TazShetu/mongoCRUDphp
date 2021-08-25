<?php
require_once "db.php";
if (isset($db)) {
    // select collection
    $user_collection = $db->users;
} else {
    die('no DB has been selected');
}

$insert = $user_collection->insertOne(
    [
        'name' => ['Rahim', 'b', 'k'],
        'email' => 'j@g.com',
        'password' => '123456789',
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]
);

var_dump($insert->getInsertedId());
var_dump($insert->getInsertedCount());
die('check');
