<?php
require_once "db.php";
$user_collection = $db->users;

$userLists = pagination(1, 1);
foreach ($userLists as $u)
{
    var_dump($u);
}


function pagination($pageNumber, $perPage)
{
    global $user_collection;
    $results = $user_collection->find(
        [], // conditions
        [
            "sort" => ["color" => -1],   // 1 is ASC -1 is DESC
            "skip" => ($pageNumber > 0 ? (($pageNumber - 1) * $perPage) : 0),
            "limit" => $perPage
        ]
        // skip and limit has to be integer ////////
        // skip will always skip from 1st position, can not skip from nth position
    );
    return $results;
}
