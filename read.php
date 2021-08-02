<?php
require_once "db.php";
if (isset($db)) {
    // select collection
    $user_collection = $db->users;
} else {
    die('no DB has been selected');
}

//// find one document
//$document = $user_collection->findOne(
//    ["_id" => "2"]
//);
//  // if multiple matc0 ches it will return the first one
//var_dump($document);1


//// find multiple documents
//$documents = $user_collection->find(
//    ["password" => "123456789"]
//);

////var_dump($documents);  // will show unusable data ///////////////////////



//// show all documents
//$documents = $user_collection->find();


//// WHERE ... IN (...)   // better use WHERE IN not WHERE OR while comparing same field
//$documents = $user_collection->find(
//    ["email" => ['$in' => ["a@g.com", "j@g.com"]]]
//);


//// WHERE ... AND
//$documents = $user_collection->find(
//    ["email" => "a@g.com", "name" => "admin"]
//);


//// WHERE ... OR
//$documents = $user_collection->find(
//    ['$or' => [["email" => "a@g.com"], ["name" => "u3"]]]
//);


//// WHERE ... AND ... OR
//$documents = $user_collection->find(
//    ["age" => 42, '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//// ... WHERE age = 42 AND (email = 'a@g.com' OR name = 'u5)


//// less than (<)
//$documents = $user_collection->find(
//    ["age" => ['$lt' => 43], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//// ... WHERE age < 43 AND (email = 'a@g.com' OR name = 'u5)


//// grater than (>)
//$documents = $user_collection->find(
//    ["age" => ['$gt' => 41], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//// ... WHERE age > 41 AND (email = 'a@g.com' OR name = 'u5)


//// grater than or equal to (>=)
//$documents = $user_collection->find(
//    ["age" => ['$gte' => 42], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//// ... WHERE age >= 41 AND (email = 'a@g.com' OR name = 'u5)


//// less than or equal to (<=)
//$documents = $user_collection->find(
//    ["age" => ['$lte' => 42], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//// ... WHERE age <= 41 AND (email = 'a@g.com' OR name = 'u5)


//// not equal to (!=)
//$documents = $user_collection->find(
//    ["age" => ['$ne' => 42], '$or' => [["email" => "a@g.com"], ["name" => "u5"]]]
//);
//// ... WHERE age != 41 AND (email = 'a@g.com' OR name = 'u5)


//// multiple not equals to for same tag (column) shorthand
//$documents = $user_collection->find(
//    ["email" => ['$nin' => ["a@g.com", "j@g.com"]]]
//);
//// ... WHERE email != 'a@g.com' AND email != 'j@g.com'



//***///*** PROJECTION (output only the projected tags) ///////////
// _id will always be projected unless we say not to ['projection' => ['_id' => 0]]
//$documents = $user_collection->find(
//    ["email" => ['$ne' => "a@g.com"]],
//    ["projection" => ["name" => 1, "email" => 1]]
//    // will show only _id, name and email
//);




// ARRAY ****

// to be exact
//$documents = $user_collection->find(
//    ["name" => ["John", "a", "b"]]
//);

// if exist in array (multi elements)
//$documents = $user_collection->find(
//    ["name" => ['$all' => ["a", "b"]]]
//);

// if exist in array (single element)
//$documents = $user_collection->find(
//    ["name" => "John"]
//);
// will show all with name John and name array that has "John" in it


// can also use > and < in an array
//$cursor = $db->inventory->find([
//    'dim_cm' => [
//        '$gt' => 15,
//        '$lt' => 20,
//    ],
//]);
// one element can satisfy the greater than 15 condition and another element can satisfy the less than 20 condition,
                    // or a single element can satisfy both:

//$cursor = $db->inventory->find([
//    'dim_cm' => [
//        '$elemMatch' => [
//            '$gt' => 22,
//            '$lt' => 30,
//        ],
//    ],
//]);
//element that is both greater than ($gt) 22 and less than ($lt) 30

// match particular element
//$cursor = $db->inventory->find(['dim_cm.1' => ['$gt' => 25]]);
// 1 is for second element of an array 0 1 2 3 ............


// match no of elements
//$cursor = $db->inventory->find(['tags' => ['$size' => 3]]);
// return all with 3 elements



// $exists can be true or false

//$documents = $user_collection->find(
//    ["name" => ['$exists' => true]]
//);
// return all user that has name element even if it is null or ''

//$documents = $user_collection->find(
//    ["name" => ['$exists' => false]]
//);
// return all user that does not have name element

//$documents = $user_collection->find(
//    ["name" => ['$type' => "string"]]
//);
// return all user that has a name element with string type or an array with string in it


//$expr (compare two columns)
//$documents = $user_collection->find(
//    ['$expr' => ['$gt' => ['$age', '$min_age']]]
//        // age and min_age are tags of user collection
//);
// return all user where age is grater than min_age


// $mod (divided by and reminders comparison)
//$documents = $user_collection->find(
//    ["age" => ['$mod' => [5.9, 0]]]
//        // only 5 will be considered. Everything after . is excluded
//);
// return all user where age is divided by 5 and reminder is 0


// $regex
//{ email: { $regex: /^j/i } }
//{ email: /^J/i  }
$documents = $user_collection->find(
    ["email" => ['$regex' => "/^j/i"]]
//    ["email" => '/^j/i']
);










var_dump($documents);
foreach ($documents as $document) {
    var_dump($document);
}












