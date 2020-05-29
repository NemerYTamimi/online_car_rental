<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
if (!isset($_SESSION['adminN']) || !$_SESSION['adminP'] || $_SESSION['adminN'] != md5('admin') || $_SESSION['adminP'] != md5('admin')) {
    ?>
    <script>
        alert("you must login as admin first");
        window.location = '../Login/login.php';
    </script>
    <?php
}

$sql = "DELETE FROM cars WHERE pid=" . $_GET['pid'];

$pdo->exec($sql);
?>
<script>
    window.location = "Admin.php";
</script>