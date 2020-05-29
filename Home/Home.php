<?php
include '../Shared/dbConf.php';
session_name('loggedIn');
session_start();
if (isset($_SESSION['adminN']) && isset($_SESSION['adminP'])  && $_SESSION['adminN'] === md5('admin') && $_SESSION['adminP'] === md5('admin')) {
    ?>
    <script>
        window.location = '../Admin/Admin.php';
    </script>
    <?php
}
?>
<!doctype html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include '../HeaderAndFooter/header.php';
?>
<article>
    <main>
        <h1 class="label2">New cars</h1>
        <?php

        $sqlStatement = "SELECT * FROM cars where new=TRUE ";
        // Prepare the results
        $result = $pdo->query($sqlStatement);
        // Execute the SQL query and get all rows
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            $sqlStatement = "SELECT * FROM images WHERE pid = '" . $row['pid'] . "'";
            // Prepare the results
            $result = $pdo->query($sqlStatement);
            // Execute the SQL query and get all rows
            $images = $result->fetchAll();
            if (!empty($images[0])) {
                $image = $images[0];
            }
            $n = 0
            ?>
            <section class="homeProducts">
                <form id="items" method="post" action="../Cars/fullDetails.php?pid=<?php echo $row['pid']; ?>">
                    <figure>
                        <a style="background-color:rgba(255,255,255,0);"
                           href="../Cars/fullDetails.php?pid=<?php echo $row['pid'] ?>">
                            <img id="myImg" src="../images/<?php echo $row['pid'] . "/" . $image['figure']; ?>"
                                 alt="<?php echo $row['name'] ?>" width="150" height="150">
                        </a>
                    </figure>
                    <br>
                    <ul>
                        <li>
                            Model:<?php echo $row['name'] ?>
                        </li>
                        <li>
                            Brand:<?php echo $row['manufacturing'] ?>
                        </li>
                        <li>
                            Country:<?php echo $row['country'] ?>
                        </li>
                        <li>
                            Price per Day:<?php echo $row['price'] ?>$
                        </li>
                    </ul>
                    <a href="<?php echo "../Shared/addToCart.php?pid=" . $row['pid']; ?>"> Add To cart</a>
                    <input type="submit" value="More Details"/>
                </form>
            </section>
            <?php
        }
        ?>
    </main>
</article>
<?php include '../HeaderAndFooter/footer.html'; ?>
</body>
</html>
