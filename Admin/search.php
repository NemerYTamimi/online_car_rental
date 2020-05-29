<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
if (!$_SESSION['adminN'] == md5('admin') || !$_SESSION['adminP'] == md5('admin')) {
    ?>
    <script>
        alert("you must login as admin first");
        window.location = '../Login/login.php';
    </script>
    <?php
}
?>
<!doctype html>
<html>
<head>
    <title>Car Rental Portal </title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include("../HeaderAndFooter/adminHeader.php");
include("../Admin/searchHeader.php");
?>
</body>
</html>
