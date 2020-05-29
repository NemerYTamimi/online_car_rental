<?php
session_name('loggedIn');
session_start();
if (!isset($_SESSION['adminN']) || !$_SESSION['adminP'] || $_SESSION['adminN'] != md5('admin') || $_SESSION['adminP'] != md5('admin')) {
    ?>
    <script>
        alert("you must login as admin fisrt");
        window.location = '../Login/login.php';
    </script>
    <?php
}
?>
<!doctype html>
<?php include '../Shared/dbConf.php';
?>

<html>

<head>
    <link rel="stylesheet" href="../style.css">
    <style>
        .col-30 {
            margin-left: 30px;
        }
    </style>
</head>


<body>
<?php
//include("../HeaderAndFooter/header.php");
include("../HeaderAndFooter/adminHeader.php");


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    if (!$pdo) {
        die("Could not connect to database");
    }

    $sqlStatement = "SELECT * FROM cars WHERE pid =" . $_GET['pid'];
    // Prepare the results
    $result = $pdo->query($sqlStatement);
    // Execute the SQL query and get all rows
    $row = $result->fetch();

} ?>
<div>
    <form style="background-color: grey; margin: 20px" class="myForm" method="post" action="update.php">
        <fieldset>
            <legend><h2>Update Product</h2></legend>
            <div class="row">
                <div class="col-30">
                    <label for="pid">Car ID</label>
                </div>
                <div class="col-40">
                    <input type="number" name="pid" value="<?php echo $row['pid'] ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="name">Model</label>
                </div>
                <div class="col-40">
                    <input type="text" name="name" value="<?php echo $row['name'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="email">country</label>
                </div>
                <div class="col-40">
                    <input type="text" name="country" value="<?php echo $row['country'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="password">manufacturing</label>
                </div>
                <div class="col-40">
                    <input type="text" name="manufacturing" value="<?php echo $row['manufacturing'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="dateOfBirth">consumption(L/km)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="consumption" value="<?php echo $row['consumption'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="address">price($)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="price" value="<?php echo $row['price'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-30">
                    <label for="phone">available colors </label>
                </div>
                <div class="col-40">
                    <input type="text" name="available colors" value="<?php echo $row['available colors'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">horse power(hp)</label>
                </div>
                <div class="col-40">
                    <input type="number" name="horsepower" value="<?php echo $row['horsepower'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">length(m)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="length" value="<?php echo $row['length'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">width(m)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="width" value="<?php echo $row['width'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">description</label>
                </div>
                <div class="col-40">
                    <input type="text" name="description" value="<?php echo $row['description'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">year</label>
                </div>
                <div class="col-40">
                    <input type="number" name="year" value="<?php echo $row['year'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">New?</label>
                </div>
                <div class="col-40">
                    <select name="new">
                        <option value="<?php echo $row['new'] ?>" selected>(No Change)</option>
                        <option value=0>No</option>
                        <option value=1>Yes</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <input type="submit" name="submit" style="background-color: #333333; float: left; margin-left: 50%">
            </div>
        </fieldset>
    </form>
</div>


</body>
<?php include '../HeaderAndFooter/footer.html'; ?>

</html>
