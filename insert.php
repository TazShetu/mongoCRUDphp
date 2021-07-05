<?php
require_once "db.php";

$user_collection = $db->users;
// if validation_test (collection [table]) does not exists
    // MongoDB will automatically create new one

/////***  INSERT 1 DOCUMENT (1 row)  ***/////
$insert = $user_collection->insertOne(
                                        [
                                            'name' => 'John',
                                            'email' => 'j@g.com',
                                            'password' => '123456789',
                                            'created_at' => new MongoDB\BSON\UTCDateTime()
                                        ]
                                    );
    // unique id will be auto inserted
    // we also add id like  ['_id' => '2', 'name' => 'John', 'email...............
    // will show error if _id is not unique


//// inserted id
var_dump($insert->getInsertedId());


/////***  INSERT many DOCUMENTS (many rows)  ***/////
//$insert = $user_collection->insertMany([
//    ['_id' => "2", 'name' => 'u3', 'email' => 'u3@g.com', 'password' => '123456789'],
//    ['name' => 'u4', 'email' => 'u4@g.com', 'password' => '123456789', 'mobile' => '123'],
//    ['name' => 'u5', 'email' => 'u5@g.com', 'password' => '123456789', 'age' => 42]
//]);



// how many document inserted
var_dump($insert->getInsertedCount());

// inserted ids
//var_dump($insert->getInsertedIds());





die('inserted');







