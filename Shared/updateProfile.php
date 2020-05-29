<?php
session_name('loggedIn');
session_start();
if (!isset($_SESSION['loggedIn'])) {
//    header("location: ../Login/login.php"); ?>
    <script>
        alert("you must login  first");
        window.location = '../Login/login.php';
    </script>
    <?php
}
?>
<!doctype html>
<?php include '../Shared/dbConf.php';
?>

<html lang="">

<head>
    <link rel="stylesheet" href="../style.css">
    <style>
        .col-30 {
            margin-left: 30px;
        }
    </style>
    <title>Profile</title>
</head>


<body>

<?php

include("../HeaderAndFooter/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    if (!$pdo) {
        die("Could not connect to database");
    }


} ?>
<div>
    <form style="background-color: grey; margin: 20px" class="myForm" method="post" action="updateCustomer.php">
        <fieldset>
            <legend><h2>Update Profile</h2></legend>
            <div class="row">
                <div class="col-30">
                    <label for="cid">ID</label>
                </div>
                <div class="col-40">
                    <label>
                        <input type="number" name="cId" value="<?php echo $_SESSION['loggedIn']['cId'] ?>" disabled>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="name">username</label>
                </div>
                <div class="col-40">
                    <label>
                        <input type="text" name="name" value="<?php echo $_SESSION['loggedIn']['name'] ?>" pattern=".{3,20}" required>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="email">email</label>
                </div>
                <div class="col-40">
                    <label>
                        <input type="email" name="email" value="<?php echo $_SESSION['loggedIn']['email'] ?>" required>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="dateOfBirth">dateOfBirth</label>
                </div>
                <div class="col-40">
                    <label>
                        <input type="date" name="dateOfBirth"
                               value="<?php echo $_SESSION['loggedIn']['dateOfBirth'] ?>" required>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="address">address</label>
                </div>
                <div class="col-40">
                    <label>
                        <input type="text" name="address" value="<?php echo $_SESSION['loggedIn']['address'] ?>" required>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-30">
                    <label for="phone">phone</label>
                </div>
                <div class="col-40">
                    <label>
                        <input type="tel" name="telephone" value="<?php echo $_SESSION['loggedIn']['telephone'] ?>" required>
                    </label>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" style="background-color: #333333; float: left; margin-left: 50%">
            </div>
        </fieldset>
    </form>
</div>


</body>
<?php include '../HeaderAndFooter/footer.html'; ?>

</html>
