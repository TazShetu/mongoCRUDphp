<?php
require_once "db.php";
// db.users.createIndex( { "country": 1, "phone": 1}, { unique: true } )
$user_collection = $db->users;

$update = $user_collection->updateOne(
    [
        // unique keys all are in conditions
        "country" => "US",
        "phone" => "123"
    ],
    // no $set as we are actually inserting
    [
        '$setOnInsert' => [
            "name" => "John",
            "country" => "US",
            "phone" => "123",
            "call_type" => "Spam",
            "is_true_caller" => 0
        ],
        '$currentDate' => ["updated_at" => true],
        '$inc' => ["hit_count" => 1]
    ],
    [
        "upsert" => true,
    ]
);

// with $setOnInsert and upsert: true , updateOne can also works as an insert
//  upsert: true results in an insert of a document
//  $setOnInsert determines when inserted action
// $set is not required here, it will work after $setOnInsert and hamper the processor

// for insert it will be 0
var_dump($update->getMatchedCount());
// for insert it will be 0
var_dump($update->getModifiedCount());