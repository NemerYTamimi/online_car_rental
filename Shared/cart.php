<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
?>
<!doctype html>
<html>
<head>
    <title>MY Cart </title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="tableView">
<?php
include '../HeaderAndFooter/header.php';

?>
<article>
    <main>
        <div style="overflow-x:auto;">
            <table style="width=100%">
                <tr style="height: 50px">
                    <th>
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Model
                    </th>
                    <th>
                        country
                    </th>
                    <th>
                        manufacturing
                    </th>
                    <th>
                        price
                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                </tr>
                <?php
                $rows = [];
                foreach ($_SESSION['loggedIn']['cart'] as $pid) {
                    $sqlStatement = "SELECT * FROM cars WHERE pid ='" . $pid . "'";
                    // Prepare the results
                    $result = $pdo->query($sqlStatement);
                    // Execute the SQL query and get all rows
                    $row = $result->fetch();
                    array_push($rows, $row);
                }


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
                                <a href="../Cars/fullDetails.php?pid=<?php echo $row['pid'] ?>">
                                    <img src="../images/<?php echo $row['pid'] . "/" . $f['figure']; ?>" alt="image"
                                            width="100" height="100"></a>
                            </figure>
                        </td>
                        <td>
                            <a href="../Cars/fullDetails.php?pid=<?php echo $row['pid'] ?>"> <?php echo $row['pid'] ?></a>
                        </td>

                        <td>
                            <?php echo $row['name'] ?>
                        </td>

                        <td>
                            <?php echo $row['country'] ?>
                        </td>

                        <td>   <?php echo $row['manufacturing'] ?>
                        </td>

                        <td><?php echo $row['price'] ?>
                        </td>
                        <td>
                            <form method="POST">
                                <?php $pid = $row['pid']; ?>
                                <input type="button" value="Delete" name="delete"
                                       onclick="window.location='deleteFromCart.php?pid=<?php echo $pid ?>'"/>
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                <?php $pid = $row['pid']; ?>
                                <input type="button" value="rent" name="Rent"
                                       onclick="window.location='completeRent.php?pid=<?php echo $pid ?>'"/>
                            </form>
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