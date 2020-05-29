<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';


if (($key = array_search($_GET['pid'], $_SESSION['loggedIn']['cart'])) !== false) {
    unset($_SESSION['loggedIn']['cart'][$key]);
}
?>
<script>
    window.location = "cart.php";
</script>