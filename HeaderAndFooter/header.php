<div class="navBar">

    <a href="../Home/Home.php">Home</a>
    <a href="../ContactUs/ContactUs.php">Contact Us</a>
    <a href="../AboutUs/AboutUs.php" style="float:left">About Us</a>
    <a href="../Cars/cars.php" style="float:left">All cars</a>

    <?php if (isset($_SESSION['loggedIn'])) {
        ?>
        <a href="../Login/logout.php" style="float:right"">Logout</a>
        <a href="../Shared/updateProfile.php" style="float:right"">Profile</a>
        <a href="../Shared/cart.php" style="float:right">My Cart</a>
        <a href="../Shared/myRent.php" style="float:right">My rented cars</a>
        <a href="../Shared/updateProfile.php" style="float:right"><?php echo $_SESSION['loggedIn']['name']; ?></a>
        <?php
    } else { ?>
        <a href="../Login/login.php" style="float:right">Login</a>
        <?php
    } ?>


</div>
