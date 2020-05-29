<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
if (!isset($_SESSION['loggedIn'])) {
    //    header("location: ../Login/login.php");
    ?>
    <script>
        alert("you must login first");
        window.location = '../Login/login.php';
    </script>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    if (!$pdo) {
        ?>
        <script>
            alert("No connection");
        </script>
        <?php
        die("Could not connect to database");
    }

    $dob = $_POST['dateOfBirth'];
    $res = explode('-', $dob);
    //ymd
    $day = $res[0];
    $month = $res[1];
    $year = $res[2];
    $newDate = $day . "-" . $month . "-" . $year;
    $sqlStatement = "UPDATE customers SET name = '" . $_POST['name'] . "', address = '" . $_POST['address'] . "', dateOfBirth = '" . $newDate . "',email = '" . $_POST['email'] . "',telephone = '" . $_POST['telephone'] . "' WHERE cId= '" . $_SESSION['loggedIn']['cId'] . "'";
    $result = $pdo->query($sqlStatement);

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);


    $sqlStatement = "SELECT * FROM customers WHERE cId = '" . $_SESSION['loggedIn']['cId'] . "'";
    $result = $pdo->query($sqlStatement);
    $row = $result->fetch();

    if (isset($_SESSION['loggedIn']['cart'])) {
        $temp_cart = $_SESSION['loggedIn']['cart'];
        $_SESSION['loggedIn'] = $row;
        $_SESSION['loggedIn']['cart'] = $temp_cart;
    }

    ?>
    <script>
        alert("Updated!")
    </script>
    <script>
        window.location = '../Home/Home.php';
    </script>
    <?php
} else {
    ?>
    <script>
        alert("No post");
    </script>
    <?php
} ?>
