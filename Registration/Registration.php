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
include '../HeaderAndFooter/header.php';

?>
<!doctype html>
<?php
include("../HeaderAndFooter/header.php");
include '../Shared/dbConf.php';
?>
<html>

<head>
    <link rel="stylesheet" href="../style.css">

</head>


<body>
<div>

    <!--Registration Form-->
    <form class="myForm" id="register" method="post" action="Registration.php">
        <fieldset>
            <legend><h2>Register</h2></legend>

            <div class="row">
                <div class="col-30">
                    <label for="name">Name</label>
                </div>
                <div class="col-40">
                    <input type="text" name="name" placeholder="Enter your name.." pattern=".{3,20}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="email">Email</label>
                </div>
                <div class="col-40">
                    <input type="email" name="email" placeholder="Enter your email.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="id">ID Number</label>
                </div>
                <div class="col-40">
                    <input type="text"
                           placeholder="Enter your id number.."
                           name="id"
                           pattern="\d{9}"
                           maxlength="9"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="password">Password</label>
                </div>
                <div class="col-40">
                    <input type="password" name="password"
                           placeholder="Enter password.."
                           pattern="\d{5,14}[a-z]{1}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="dateOfBirth">Date of Birth</label>
                </div>
                <div class="col-40">
                    <input type="date" name="dateOfBirth" placeholder="Enter your Date Of Birth.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="address">Address</label>
                </div>
                <div class="col-40">
                    <input type="text" name="address" placeholder="Enter your Address.." required>
                </div>
            </div>

            <div class="row">
                <div class="col-30">
                    <label for="phone">Telephone</label>
                </div>
                <div class="col-40">
                    <input type="tel" name="phone" placeholder="Enter your phone number.." required>
                </div>
            </div>

            <div class="row">
                <input type="submit" name="submit">
            </div>
        </fieldset>
    </form>
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dob = $_POST['dateOfBirth'];
    $res = explode('-', $dob);
    //ymd
    $day = $res[0];
    $month = $res[1];
    $year = $res[2];
    $newDate = $day . "-" . $month . "-" . $year;
    $sqlStatement = "INSERT INTO customers(cid,name , email, address , telephone , password, dateOfBirth) VALUES (?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sqlStatement);
    $status = $stmt->execute([$_POST['id'], $_POST['name'], $_POST['email'], $_POST['address'], $_POST['phone'], md5($_POST['password']), $newDate,]);
    if ($status) {
        $sqlStatement = "SELECT * FROM customers where cid=  '" . $_POST['id'] . "'";
        $result = $pdo->query($sqlStatement);
        $row = $result->fetch();
        $_SESSION['loggedIn'] = [];
        $_SESSION['loggedIn'] = $row;
        $_SESSION['loggedIn']['cart'] = [];
        ?>
        <script>
            window.location = '../Shared/updateProfile.php';
        </script>

        <?php
    }


} ?>


</body>
<?php include '../HeaderAndFooter/footer.html'; ?>

</html>
