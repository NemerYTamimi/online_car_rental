<?php
session_name('loggedIn');
session_start();

include '../Shared/dbConf.php';
if (!$_SESSION['adminN'] == md5('admin') || !$_SESSION['adminP'] == md5('admin')) {
    ?>
    <script>
        alert("you must login as admin first");
        window.location = '../Login/login.php';
    </script>
    <?php
}
?>
<!doctype html>
<html>
<head>
    <title>Car Rental Portal </title>
    <link rel="stylesheet" href="../style.css">
</head>


<body>
<?php
include("../HeaderAndFooter/adminHeader.php");

?>
<article>
    <main>

        <?php
        $sqlStatement = "SELECT * FROM cars";
        $result = $pdo->query($sqlStatement);
        $rows = $result->fetchAll();
        ?>


        <div class="tableView" style="overflow-x:auto;">
            <table style="width=100%">
                <tr style="height: 50px">
                    <th>
                    </th>
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
                        available colors
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
                    <th colspan="3">
                    </th>
                </tr>
                <?php
                foreach ($rows as $row) {
                    $sqlStatement = "SELECT * FROM images WHERE pid = '" . $row['pid'] . "'";
                    $result = $pdo->query($sqlStatement);
                    $images = $result->fetchAll();
                    if (!empty($images[0])) {
                        $f = $images[0];
                    }
                    ?>
                    <tr>
                        <td>
                            <figure>
                                <a href="../Cars/fullDetails.php?pid=<?php echo $row['pid'] ?>"> <img
                                            src="../images/<?php echo $row['pid'] . "/" . $f['figure']; ?>" alt="image"
                                            width="100" height="100"></a>
                            </figure>
                        </td>
                        <td>
                            <a href="../Cars/fullDetails.php?pid=<?php echo $row['pid'] ?>">
                                <?php echo $row['pid'] ?></a>

                        </td>

                        <td>
                            <?php echo $row['name'] ?>
                        </td>

                        <td>
                            <?php echo $row['country'] ?>
                        </td>

                        <td>   <?php echo $row['manufacturing'] ?>
                        </td>

                        <td><?php echo $row['consumption'] ?>
                        </td>

                        <td>   <?php echo $row['price'] ?>
                        </td>

                        <td> <?php echo $row['available colors'] ?>
                        </td>

                        <td>   <?php echo $row['horsepower'] ?>
                        </td>

                        <td> <?php echo $row['length'] ?>m
                        </td>
                        <td> <?php echo $row['width'] ?>m
                        </td>
                        <td>
                            <?php $pid = $row['pid'] ?>
                            <input type="button" value="Delete" name="Delete"
                                   onclick="window.location='deleteCar.php?pid=<?php echo $pid ?>'"/>
                        </td>
                        <td>
                            <input type="button" value="Update" name="update"
                                   onclick="window.location='updateCar.php?pid=<?php echo $pid ?>'"/>
                        </td>
                        <td>
                            <input type="button" value="Details" name="details"
                                   onclick="window.location='../Cars/fullDetails.php?pid=<?php echo $pid ?>'"/>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
</body>
<?php include '../HeaderAndFooter/footer.html'; ?>
</html>
