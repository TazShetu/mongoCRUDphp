<?php
require_once "db.php";
$user_collection = $db->users;

//*** for change in mongodb compass generate hash with a php file and update password
        // it is impossible to get the old password

// for inserting
function hashpw($password) {
    $algo = '$5$rounds=2000$'; // specify SHA-256
    $salt = $algo . mt_rand();
    return crypt(strval($password), $salt);
}

// for confirming
function confirmpw($password, $hash) {
    return (crypt(strval($password), strval($hash)) === $hash);
}


$pas = '123456789';

//// *** hash will change for same password every time
//$hash = hashpw($pas);
//$insert = $user_collection->insertOne(
//    [
//        'name' => 'John',
//        'email' => 'a@g.com',
//        'password' => "$hash",
//        'created_at' => new MongoDB\BSON\UTCDateTime()
//    ]
//);


$userDoc = $user_collection->findOne(["email" => "a@g.com"]);
$hashPassword = $userDoc->password;
if (confirmpw($pas, $hashPassword)) {
    die('worked');
} else {
    die('hash not working');
}


