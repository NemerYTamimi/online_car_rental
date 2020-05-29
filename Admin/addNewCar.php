<?php
session_name('loggedIn');
session_start();
?>
<!doctype html><?php include '../Shared/dbConf.php';
?>
<?php
//include("../HeaderAndFooter/header.php");
if (!isset($_SESSION['adminN']) || !$_SESSION['adminP'] || $_SESSION['adminN'] != md5('admin') || $_SESSION['adminP'] != md5('admin')) { ?>
    <script>
        alert("you must login as admin fisrt");
        window.location = '../Login/login.php';
    </script>
<?php
}
?>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include("../HeaderAndFooter/adminHeader.php");

?>
<div>
    <!--FORM-->
    <form style="background-color: grey; margin: 20px" class="myForm" enctype="multipart/form-data" method="post"
          action="addNewCar.php">
        <fieldset>
            <legend><h2>Add new car</h2></legend>
            <div class="row">
                <div class="col-30">
                    <label for="name">Model</label>
                </div>
                <div class="col-40">
                    <input type="text" name="name" placeholder="Enter  Model.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="email">country</label>
                </div>
                <div class="col-40">
                    <input type="text" name="country" placeholder="Enter country.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="password">manufacturing</label>
                </div>
                <div class="col-40">
                    <input type="text" name="manufacturing" placeholder="Enter manufacturing.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="dateOfBirth">consumption(L/km)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="consumption" placeholder="Enter consumption.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="address">price($)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="price" placeholder="Enter price.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">available colors </label>
                </div>
                <div class="col-40">
                    <input type="text" name="availablecolors" placeholder="Enter available colors	.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">horse power(hp)</label>
                </div>
                <div class="col-40">
                    <input type="number" name="horsepower" placeholder="Enter horsepower.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">length(m)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="length" placeholder="Enter length.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">width(m)</label>
                </div>
                <div class="col-40">
                    <input type="number" step="any" name="width" placeholder="Enter width.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">description</label>
                </div>
                <div class="col-40">
                    <input type="text" name="description" placeholder="Enter description.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">year</label>
                </div>
                <div class="col-40">
                    <input type="number" name="year" placeholder="Enter year.." required>
                </div>
            </div>
            <div class="row">
                <div class="col-30">
                    <label for="phone">New?</label>
                </div>
                <div class="col-40">
                    <select name="new" required>
                        <option value="0" selected>(please select:)</option>
                        <option value=0>No</option>
                        <option value=1>Yes</option>
                    </select>
                </div>
            </div>
            <div class="col-30">
                Image 1 <span style="color:red">*</span><input type="file" name="file1" required>
            </div>
            <div class="col-30">
                Image 2 <span style="color:red">*</span><input type="file" name="file2" required>
            </div>
            <div class="col-30">
                Image 3 <span style="color:red">*</span><input type="file" name="file3" required>
            </div>
            <div>
                <br>
            </div>
            <div class="row">
                <input type="submit" name="submit" style="background-color: #333333; float: left; margin-left: 50%">
            </div>
        </fieldset>
    </form>
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

    if (!$pdo) {
        die("Could not connect to database");
    } else echo "Connected to Database";

    $sqlStatement = "INSERT INTO `cars` (`name`, `country`, `manufacturing`, `consumption`, `price`, `available colors`, `horsepower`, `length`, `width`, `description`, `year`,`new`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sqlStatement);
    $status = $stmt->execute([$_POST['name'], $_POST['country'], $_POST['manufacturing'], $_POST['consumption'], $_POST['price'], $_POST['availablecolors'], $_POST['horsepower'], $_POST['length'], $_POST['width'], $_POST['description'], $_POST['year'], $_POST['new']]);
    $lastID = $pdo->lastInsertId();
    if ($status) {

        echo 'Data inserted successfully';
        mkdir("../images/" . $lastID);
        $fileToMove = $_FILES['file1']['tmp_name'];
        $info = pathinfo($_FILES['file1']['name']);
        $ext = $info['extension']; // get the extension of the file
        $destination = "../images/" . $lastID . "/" . "img1." . $ext;
        move_uploaded_file($fileToMove, $destination);
        $sql = "INSERT into images (pid,figure) VALUES(?,?)";
        $stmt1 = $pdo->prepare($sql);
        $status1 = $stmt1->execute([$lastID, "img1." . $ext]);
        $fileToMove = $_FILES['file2']['tmp_name'];
        $info = pathinfo($_FILES['file2']['name']);
        $ext = $info['extension']; // get the extension of the file
        $destination = "../images/" . $lastID . "/" . "img2." . $ext;
        move_uploaded_file($fileToMove, $destination);
        $status1 = $stmt1->execute([$lastID, "img2." . $ext]);

        $fileToMove = $_FILES['file3']['tmp_name'];
        $info = pathinfo($_FILES['file3']['name']);
        $ext = $info['extension']; // get the extension of the file
        $destination = "../images/" . $lastID . "/" . "img3." . $ext;
        move_uploaded_file($fileToMove, $destination);
        $status1 = $stmt1->execute([$lastID, "img3." . $ext]);


    } else {
        echo "ERROORR";
        ?>
        <script>
            alert("Error");
        </script>
        <?php

    }
} ?>


</body>
<?php include '../HeaderAndFooter/footer.html'; ?>

</html>
