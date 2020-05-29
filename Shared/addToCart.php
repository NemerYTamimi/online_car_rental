<?php
session_name('loggedIn');
session_start();
?>
<!doctype html>
<head>
</head>
<body>
<?php
if (isset($_SESSION['loggedIn'])) {
    if(!isset($_GET['pid'])){
    ?>
    <script>
        alert("Bad link try again");
        window.location = "../Home/home.php";
    </script>

<?php
    }
    else {
    array_push($_SESSION['loggedIn']['cart'], $_GET['pid']);
    ?>
    <script>
        alert("Added To Cart!");
        window.location = '../Cars/cars.php';
    </script>
<?php
}
} else {
?>
    <script>
        alert("Login First!");
        window.location = "../Login/login.php?back=<?php echo $_SERVER['REQUEST_URI']; ?>";
        // we can use php header method instead
    </script>

    <?php
}

?>
</body>
</html>