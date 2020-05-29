<?php
session_name('search');
session_start();

$_SESSION['search']['filter'] = $_GET['filter'];
$_SESSION['get']= $_GET;
?>
<?php
if(isset($_GET['back']))
    header('Location:'.$_GET['back']);
else
    header('Location:../Home/home.php');
?>
