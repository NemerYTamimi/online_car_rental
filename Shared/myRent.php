<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
?>
<!doctype html>
<html>
<head>
    <title>Rented cars </title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="tableView">
<?php
include '../HeaderAndFooter/header.php';

?>
<article>
    <main>
        <?php
        $sqlStatement = "SELECT c.pid,c.name,b.start,b.end,b.days,c.price,b.options FROM buy b,cars c where c.pid=b.pid && cId='" . $_SESSION['loggedIn']['cId'] . "'";
        $result = $pdo->query($sqlStatement);
        $rows = $result->fetchAll();
        ?>


        <div  style="overflow-x:auto;">
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
                        start date
                    </th>
                    <th>
                        end date
                    </th>
                    <th>
                        number of days
                    </th>
                    <th>
                        price each day
                    </th>
                    <th>
                        total price
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
                            <a href="../Cars/fullDetails.php?pid=<?php echo $row['pid'] ?>"> <?php echo $row['pid'] ?></a>
                        </td>

                        <td>
                            <?php echo $row['name'] ?>
                        </td>

                        <td>
                            <?php echo $row['start'] ?>
                        </td>

                        <td>   <?php echo $row['end'] ?>
                        </td>

                        <td><?php echo $row['days'] ?>
                        </td>

                        <td>   <?php echo $row['price'] . '$ + (' . $row['options'] . ' * ' . '3$)' ?>
                        </td>
                        <td>   <?php echo ($row['price'] + ($row['options'] * 3)) * $row['days'] ?> $
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