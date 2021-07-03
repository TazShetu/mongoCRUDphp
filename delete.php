<?php
require_once "db.php";
$user_collection = $db->users;

//// delete 1
//$delete = $user_collection->deleteOne(
//                ["_id" => "2"]
//            );
//// will not show error if find nothing (condition does not match)
//
//// how many collections deleted
//var_dump($delete->getDeletedCount());


// delete many
$delete = $user_collection->deleteMany(
                ["color" => ['$gt' => "3"]]
            );

// how many collections deleted
var_dump($delete->getDeletedCount());





