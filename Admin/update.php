<?php
include '../Shared/dbConf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    if (!$pdo) {
        die("Could not connect to database");
    }
    print_r($_POST);
    $sqlStatement = "UPDATE cars SET name = '" . $_POST['name'] . "' ,horsepower = '" . $_POST['horsepower'] . "' , country = '" . $_POST['country'] . "', price = '" . $_POST['price'] . "' , description = '" . $_POST['description'] . "' , length = '" . $_POST['length'] . "', width = '" . $_POST['width'] . "', year = '" . $_POST['year'] . "', new = '" . $_POST['new'] . "' WHERE pid= '" . $_POST['pid'] . "'";
    $result = $pdo->query($sqlStatement);

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);


    $sqlStatement = "SELECT * FROM cars WHERE name = '" . $_POST['name'] . "'";
    $result = $pdo->query($sqlStatement);
    $row = $result->fetch();

    header("Location: Admin.php");
} ?>
