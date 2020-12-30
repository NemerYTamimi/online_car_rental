<?php

$dbhost = "localhost";
$dbuser = "master";
$dbpass = "comp334";
$dbname = "dbschema_1170025";

// create PDO Object:
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

if (!$pdo) {
    die("Could not connect to database");
}

//else echo "Connected to Database";

?>