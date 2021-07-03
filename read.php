<?php
require_once "db.php";
$user_collection = $db->users;

//// find one document
//$document = $user_collection->findOne(
//    ["_id" => "2"]
//);
//  // if multiple matches it will return the first one
//var_dump($document);


//// find multiple documents
//$documents = $user_collection->find(
//    ["password" => "123456789"]
//);
////var_dump($documents);  // will show unusable data ///////////////////////
//foreach ($documents as $document) {
//    var_dump($document);
//}


//// show all documents
//$documents = $user_collection->find();
//foreach ($documents as $document) {
//    var_dump($document);
//}


//// WHERE ... IN (...)   // better use WHERE IN not WHERE OR while comparing same field
//$documents = $user_collection->find(
//    ["email" => ['$in' => ["a@g.com", "j@g.com"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}


//// WHERE ... AND
//$documents = $user_collection->find(
//    ["email" => "a@g.com", "name" => "admin"]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}


//// WHERE ... OR
//$documents = $user_collection->find(
//    ['$or' => [["email" => "a@g.com"], ["name" => "u3"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}


//// WHERE ... AND ... OR
//$documents = $user_collection->find(
//    ["age" => 42, '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE age = 42 AND (email = 'a@g.com' OR name = 'u5)


//// less than (<)
//$documents = $user_collection->find(
//    ["age" => ['$lt' => 43], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE age < 43 AND (email = 'a@g.com' OR name = 'u5)


//// grater than (>)
//$documents = $user_collection->find(
//    ["age" => ['$gt' => 41], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE age > 41 AND (email = 'a@g.com' OR name = 'u5)


//// grater than or equal to (>=)
//$documents = $user_collection->find(
//    ["age" => ['$gte' => 42], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE age >= 41 AND (email = 'a@g.com' OR name = 'u5)


//// less than or equal to (<=)
//$documents = $user_collection->find(
//    ["age" => ['$lte' => 42], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE age <= 41 AND (email = 'a@g.com' OR name = 'u5)


//// not equal to (!=)
//$documents = $user_collection->find(
//    ["age" => ['$ne' => 42], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE age != 41 AND (email = 'a@g.com' OR name = 'u5)


//// multiple not equals to for same tag (column) shorthand
//$documents = $user_collection->find(
//    ["email" => ['$nin' => ["a@g.com", "j@g.com"]]]
//);
//foreach ($documents as $document) {
//    var_dump($document);
//}
//// ... WHERE email != 'a@g.com' AND email != 'j@g.com'



//***///*** PROJECTION (output only the projected tags) ///////////
// _id will always be projected unless we say not to ['projection' => ['_id' => 0]]
$documents = $user_collection->find(
    ["email" => ['$ne' => "a@g.com"]],
    ["projection" => ["name" => 1, "email" => 1]]
    // will show only _id, name and email
);
foreach ($documents as $document) {
    var_dump($document);
}












