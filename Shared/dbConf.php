<?php

$dbhost = "localhost";
$dbuser = "c159_master";
$dbpass = "c159_comp334";
$dbname = "c159_project";

// create PDO Object:
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

if (!$pdo) {
    die("Could not connect to database");
}

//else echo "Connected to Database";

?>