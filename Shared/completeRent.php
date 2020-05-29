<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
if (!isset($_SESSION['loggedIn'])) {
    ?>
    <script>
        alert("Log in first");
        window.location = "../Login/login.php?back=<?php echo $_GET['back']; ?>";
    </script>
    <?php
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pid'])) {
        unset($_SESSION['pid']);
        $_SESSION['pid'] = $_GET['pid'];
    } else {
        ?>
        <script>
            alert("Bad link try again");
            window.location = "../Home/home.php";
        </script>

        <?php
    }
    if (empty($_SESSION['loggedIn']['cart']) && !isset($_GET['state'])) {
        ?>
        <script>
            alert("No Cars to rent in your cart!");
            window.location = "../Shared/cart.php";
        </script>

        <?php
    }
}
?>

<!doctype html>
<html>
<head>
    <title>Car Rental Portal</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<article>
    <main>
        <section id="login" style="height: 200px">

            <form action="credit.php" method="post" class="myForm">


                <div>
                    <label for="Start Date"><b>Start Date</b></label>
                    <input type="date" name="start" required
                           class="form-control"/>
                    <label for="Start Date"><b>End Date</b></label>
                    <input type="date" name="end" required
                           class="form-control"/>
                    <label style="color: red"><br>Each option will add to cost 3$ per day</br></label>
                    <input type = "hidden" name = "current" value = <?php echo $_SERVER['REQUEST_URI']?> />
                    <label style="font-size: large;margin-left:30px">Baby seats</label>
                    <input type="checkbox" name="BabySeats">
                    <label style="font-size: large;margin-left:30px">Radio</label>
                    <input type="checkbox" name="Radio">
                    <label style="font-size: large;margin-left:30px">GPS Navigator</label>
                    <input type="checkbox" name="GPS">
                    <input style="float: left; margin: 15px 100px 10px 260px;" type="submit" name="login"
                           value="Submit"/>
                </div>
            </form>


    </main>

</article>
</body>
<?php include '../HeaderAndFooter/footer.html'; ?>
</html>
