<?php
include '../Shared/dbConf.php';
session_name('loggedIn');
session_start();
if (isset($_SESSION['adminN']) && isset($_SESSION['adminP']) && $_SESSION['adminP'] && $_SESSION['adminN'] === md5('admin') && $_SESSION['adminP'] === md5('admin')) {
    ?>
    <script>
        window.location = '../Admin/Admin.php';
    </script>
    <?php
}
if (isset($_SESSION['loggedIn'])) {
    ?>
    <script>
        window.location = '../Home/Home.php';
    </script>
    <?php
}
?>
<!doctype html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['back']))
        $_SESSION['back'] = $_GET['back'];
}
include '../HeaderAndFooter/header.php';

?>
<article>
    <main>
        <?php
        include '../HeaderAndFooter/header.php';

        ?>
        <section id="login">
            <form action="login.php" method="post" class="myForm">
                <div>
                    <img src="../images/logo.png" alt="Logo" width="120" hight="80">
                </div>
                <div>
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" required class="form-control"/>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required class="form-control"/>
                    <input style="float: left; margin: 15px 100px 10px 260px;" type="submit" name="login"
                           value="Login"/>
                </div>
            </form>
            <br><br><br><br>
            <a class="row" href="../Registration/Registration.php" style="float: left; font-size: large">Create
                Account</a>
        </section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $back = $_SESSION['back'];
            unset($_SESSION['back']);
            if ($_POST['email'] === "admin@store.ps") {
            if ($_POST['password'] === "hello") {
                $_SESSION['adminN'] = md5('admin');
                $_SESSION['adminP'] = md5('admin');
                ?>
                <script>
                    alert("You logged is as admin");
                    window.location = '../Admin/Admin.php';
                </script>
            <?php
            } else{
            ?>
                <script>
                    alert("Wrong admin password!");
                </script>
            <?php
            }
            } else {
            $sqlStatement = "SELECT COUNT(1) FROM customers WHERE email = '" . $_POST['email'] . "'";
            // Prepare the results
            $result = $pdo->query($sqlStatement);
            // Execute the SQL query and get all rows
            $row = $result->fetch();
            if ($row[0] === "1") {
            $sqlStatement = "SELECT * FROM customers WHERE email = '" . $_POST['email'] . "'";
            $result = $pdo->query($sqlStatement);
            $row = $result->fetch();
            ?>
            <?php
            if ($row['password'] === md5($_POST['password'])) {
            $_SESSION['loggedIn'] = [];
            $_SESSION['loggedIn'] = $row;
            $_SESSION['loggedIn']['cart'] = [];
            //header("location: ".$_GET['back']);
            if (isset($back)){
            ?>

                <script>
                    alert("Welcome <?php echo $row['name']?>")
                    window.location = '<?php echo $back?>';

                </script>
            <?php
            }
            else{
            //header("location: ../Home/Home.php");

            ?>

                <script>
                    alert("Welcome <?php echo $row['name']?>")
                    window.location = '../Home/Home.php';
                </script>
            <?php
            }
            } else {
            ?>
                <script>
                    alert("Incorrect Password!");
                </script>
            <?php

            }
            } else {
            ?>
                <script>
                    alert("Email Does not Exist!");
                </script>
                <?php
            }
            }
        }
        ?>
    </main>
</article>
</body>
<?php include '../HeaderAndFooter/footer.html'; ?>
</html>
