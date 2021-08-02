<?php
require_once "db.php";

//// create collection (table)
//$db->createCollection("validation_test");
//    // will show error if the collection already exist

// list of collections (tables)
//foreach ($db->listCollections() as $c) {
//    var_dump($c);
//}

// drop collection (table)
//$db->dropCollection("collection_name");


///***///***  Best Practise, add validation rules directly in mongodb compass  ***///***///
            /// // for syntax help just copy from $jsonSchema from the documentation and paste in {} in validation tab


///***///***  VALIDATION  ***///***///
$db->createCollection(
    "validation_test",
    [
        "validator" => [
            '$jsonSchema' => [
                "bsonType" => "object",
                "required" => ["name", "year", "status", "major", "address"],
                "properties" => [
                    "name" => [
                        "bsonType" => "string",
                        "description" => "must be a string and is required"
                    ],
                    "year" => [
                        "bsonType" => "int",
                        "minimum" => 1971,
                        "maximum" => 3071,
                        "description" => "must be an integer in [ 1971, 3071 ] and is required"
                    ],
                    "major" => [
                        "enum" => ["Math", "English", "Computer Science", "History", null],
                        "description" => "can only be one of the enum values and is required"
                    ],
                    "address" => [
                        "bsonType" => "object",
                        "required" => ["house", "road", "city"],
                        "properties" => [
                            "house" => [
                                "bsonType" => "string",
                                "description" => "must be a string and is required"
                            ],
                            "road" => [
                                "bsonType" => "string",
                                "description" => "must be a string and is required"
                            ],
                            "city" => [
                                "bsonType" => "string",
                                "description" => "must be a string and is required"
                            ],
                            "country" => [
                                "bsonType" => "string",
                                "description" => "must be a string if the field exists"
                            ],
                        ]
                    ],
                    "gpa" => [
                        "bsonType" => "double",
                        "description" => "must be a double if the field exists"
                    ],
                ],
            ],
            '$or' => [
                [
                    "status" => [
                        '$in' => ["active", "inactive"]
                    ],
                    "email" => [
                        '$regex' => "/@\.com$/",
                    ],
                    "example" => [
                        "type" => "string"
                    ]
                ]
            ]
        ]
    ]
);



///****************
///     CANNOT ADD VALIDATION TO THE EXISTING COLLECTION FROM PHP
///                                                         ***************
/// must do it in mongod server, better use gui like " mongodb compass "
/// *********
///     UPDATE THE VALIDATION RULES ANYTIME FROM Validation TAB IN " mongodb compass "
///                                                                             **********
// by default validation rules will apply to the insert and update(new and existing)
// does not affect the existing data if there was any



$users = $db->users;

// Unique Index on a Single Field
$users->createIndex(["color" => 1], ["unique" => true]);
    // will show error if existing data of color field is not unique


