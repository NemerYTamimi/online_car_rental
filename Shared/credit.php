<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';

?>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    ?>
    <script>
        window.location = "cart.php";
    </script>

    <?php
}
if($_POST['start']>=$_POST['end']){
    ?>
<script>
    alert("wrong dates try again");
    window.location="<?php echo $_POST['current']?>";
</script>
<?php
}
unset($_SESSION['date']);
$_SESSION['date']['start'] = $_POST['start'];
$_SESSION['date']['end'] = $_POST['end'];

$options = 0;
if (isset($_POST['BabySeats'])) {
    $options++;
}
if (isset($_POST['Radio'])) {
    $options++;
}
if (isset($_POST['GPS'])) {
    $options++;
}
unset($_SESSION['options']);
$_SESSION['options'] = $options;

?>
<!doctype html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        label {
            font-size: x-large;
        }
    </style>
    <script>
            function visa() {
                    document.getElementById('credit').pattern="[1]{3}[0-9]{6}";
                    }
            function master() {
                document.getElementById('credit').pattern="[2]{3}[0-9]{6}";
            }
            function ae() {
                document.getElementById('credit').pattern="[3]{3}[0-9]{6}";
            }
    </script>
</head>
<body>
<?php
include '../HeaderAndFooter/header.php';

?>
<article>
    <main>

        <form class="myForm" id="register" method="post" action="placeOrder.php">
            <fieldset>
                <legend><h2>Complete Payment</h2></legend>

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
                        <label for="credit">Credit number</label>
                    </div>
                    <div class="col-40">
                        <input type="text"
                               placeholder="Enter your credit number.."
                               name="credit"
                               id="credit"
                               pattern="[1]{3}[0-9]{6}"
                               maxlength="9"
                               required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label for="expiredDate">Expired date</label>
                    </div>
                    <div class="col-40">
                        <input type="date" name="expiredDate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label for="bank">Bank Name</label>
                    </div>
                    <div class="col-40">
                        <input type="text" name="bank" placeholder="Enter bank name.." pattern=".{3,20}"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label for="type">Type</label>
                    </div>
                    <div class="col-40">
                        <input  type="radio" value="visa" name="type" checked onclick="visa()">visa
                        <input type="radio" value="master" name="type"onclick="master()" >master
                        <input type="radio" value="ae" name="type" onclick="ae()" >amarican express
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit">
                </div>
            </fieldset>
    </main>
</article>
</body>
<?php include '../HeaderAndFooter/footer.html';?>
</html>
