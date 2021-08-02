<?php
require_once "db.php";
if (isset($db)) {
    // select collection
    $user_collection = $db->users;
} else {
    die('no DB has been selected');
}

//// update 1 document (1 row)
$update = $user_collection->updateOne(
    ["name" => "John"],
    [
        '$set' => ["new_tag" => "matched"],
        '$currentDate' => ['updated_at' => true]
            // will auto add/update updated_at to current time (UTC timezone)
    ]
        // even if there is no new_tag mongoDB will create one automatically
        // if multiple documents matches the condition, will update only the first one
);
// .... SET new_tag = "matched" WHERE password = "123456789" (LIMIT 1)

// how many documents have been matched
var_dump($update->getMatchedCount());

// how many document has been modified, will be one for updateOne()
var_dump($update->getModifiedCount());


//// update multiple documents (many row)
//$update = $user_collection->updateMany(
//    ["password" => "123456789"],
//    ['$set' => ["new_tag" => "updated"]]
//        // even if there is no new_tag mongoDB will create one automatically
//);
//// .... SET new_tag = "updated" WHERE password = "123456789"
//
//// how many documents have been matched
//var_dump($update->getMatchedCount());
//
//// how many document has been modified, will be one for updateOne()
//var_dump($update->getModifiedCount());


//// replace an entire document (1 row replace)
//$update = $user_collection->replaceOne(
//    ["_id" => "2"],
//    ["color" => "red", "aim" => "good"]
//    // if multiple documents matches the condition, will replace only the first one
//);
//// the entire document will be replaced by the new set of tags and values except _id
//// there is no replaceMany() method


//// how many documents have been matched
//var_dump($update->getMatchedCount());     // always 1
//
//// how many document has been modified, will be one for updateOne()
//var_dump($update->getModifiedCount());

die('updated');










