<?php
session_name('loggedIn');
session_start();


include '../Shared/dbConf.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
if (!isset($_SESSION['adminN']) || !isset($_SESSION['adminP']) || !$_SESSION['adminP'] || $_SESSION['adminN'] != md5('admin') || $_SESSION['adminP'] != md5('admin')) {
    include("../HeaderAndFooter/header.php");
} else {
    include("../HeaderAndFooter/adminHeader.php");

}
if (isset($_GET['pid'])) {


    $sqlStatement = "SELECT * FROM cars WHERE pid = '" . $_GET['pid'] . "'";
    $result = $pdo->query($sqlStatement);
    $row = $result->fetch();
    $sqlStatement = "SELECT * FROM images WHERE pid = '" . $row['pid'] . "'";
    $result = $pdo->query($sqlStatement);
    $images = $result->fetchAll();
    $pid = $row['pid'];
    ?>
    <script>

        var i = 0, images = [
            "../images/<?php echo $pid . "/" . $images[0]['figure'];?>",
            "../images/<?php echo $pid . "/" . $images[1]['figure'];?>",
            "../images/<?php echo $pid . "/" . $images[2]['figure'];?>"];

        function mySlide(param) {
            if (param === 'next') {
                i++;
                if (i === images.length) {
                    i = images.length - 1;
                }
            } else {
                i--;
                if (i < 0) {
                    i = 0;
                }
            }
            document.getElementById('slide').src = images[i];
        }


    </script>
    <section id="SingleItemsPage">
        <div style="width: 100%; height = 400px; position: center;">
            <!--            --><?php //foreach ($images as $image) {
            ?>

            <figure style="float: left; margin: 10px 10px 20px 30%;" class="myImage">
                <button style="width: auto;" onclick="mySlide('prev');">Previous</button>
                <img class="row" src="../images/<?php echo $pid . "/" . $images[0]; ?>>" id="slide" alt="" width="400"
                     height="300">
                <script>document.getElementById('slide').src = images[0];</script>
                <button style="width: auto;" onclick="mySlide('next');">Next</button>

            </figure>
            <table class="singleProduct">
                <tr style="height: 50px; color: white">

                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        country
                    </th>
                    <th>
                        manufacturing
                    </th>
                    <th>
                        consumption
                    </th>

                    <th>
                        price
                    </th>

                    <th>
                        horse power
                    </th>
                    <th>
                        length
                    </th>
                    <th>
                        width
                    </th>


                </tr>
                <tr>
                    <th>
                        <?php echo $row['pid'] ?>

                    </th>

                    <th>
                        <?php echo $row['name'] ?>
                    </th>

                    <th>
                        <?php echo $row['country'] ?>
                    </th>

                    <th>   <?php echo $row['manufacturing'] ?>
                    </th>

                    <th><?php echo $row['consumption'] ?>
                    </th>


                    <th>   <?php echo $row['price'] ?>
                    </th>


                    <th>   <?php echo $row['horsepower'] ?>
                    </th>

                    <th> <?php echo $row['length'] ?>m
                    </th>
                    <th> <?php echo $row['width'] ?>m
                    </th>
                </tr>
                <tr>
                    <th style="color: white">
                        Available Colors:
                    </th>
                    <th>
                        <?php echo $row['available colors'] ?>
                    </th>
                </tr>
                <tr>
                    <th style="color: white">
                        Description:
                    </th>
                    <th colspan="8" rowspan="3">
                        <?php echo $row['description'] ?>
                    </th>
                </tr>

            </table>
            <?php

            if (!isset($_SESSION['adminN']) || !isset($_SESSION['adminP']) || !$_SESSION['adminN'] == md5('admin') || !$_SESSION['adminP'] == md5('admin')) { ?>
                <a href="<?php echo "../Shared/addToCart.php?pid=" . $row['pid']; ?>" class="itemButtons"
                   style="margin: 10px 50% 10px 20px;"> Add To cart</a>
                <a href="<?php $back = $_SERVER['REQUEST_URI'];
                echo "../Shared/completeRent.php?pid=" . $row['pid'] . '&state=1&back=' . $back; ?>" class="itemButtons"
                   style="margin-top:10px;"> Rent</a>
                <?php
            } else { ?>
                <a href="../Admin/Admin.php" class="itemButtons"
                   style="margin: 10px 50% 10px 20px;"> Back</a>
                <?php
            }
            ?>


        </div>
    </section>

    <?php
}

?>
<!-- The Modal get help from w3school.com/howto/howto_css_modal_images.asp-->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<script>

    var modal = document.getElementById("myModal");
    img = document.getElementById("slide");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
    }

</script>
<script>

    var i = 0, images = [
        "../images/<?php echo $pid . "/" . $images[0]['figure'];?>",
        "../images/<?php echo $pid . "/" . $images[1]['figure'];?>",
        "../images/<?php echo $pid . "/" . $images[2]['figure'];?>"];

    function mySlide(param) {
        if (param === 'next') {
            i++;
            if (i === images.length) {
                i = 0;
            }
        } else {
            i--;
            if (i < 0) {
                i = images.length - 1;
            }
        }

        document.getElementById('slide').src = images[i];
    }


</script>
</body>
</html>
