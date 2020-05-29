<?php
session_name('loggedIn');
session_start();

include '../Shared/dbConf.php';
?>
<!doctype html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php
include '../HeaderAndFooter/header.php';
?>
<article>
    <main>
        <div class="label1">
            <form action="../Search/searchResult.php" method="get">
                <input type="text" style="width: auto" placeholder="Enter car model" name="searchValue"/>
                <select name="manufacturer" style="width: auto">
                    <option value="0">Select Manufacturer</option>
                    <?php
                    include("../Shared/dbConf.php");
                    $sqlStatement = "SELECT * FROM cars group by manufacturing ";
                    // Prepare the results
                    $result = $pdo->query($sqlStatement);
                    // Execute the SQL query and get all rows
                    $rows = $result->fetchAll();
                    foreach ($rows as $row) {
                        echo "<option value=".$row['manufacturing'].">".$row['manufacturing']."</option>";
                    }
                    ?>
                </select>
                <input type="radio" name="by" value="asc"> ascending
                <input type="radio" name="by" value="desc"> descending
                <input type="submit" value="Filter" />
            </form>
            </div>
        </div>
        <h1 class="label2">All cars</h1>
        <?php
        $sqlStatement = "SELECT * FROM cars  ";
        $result = $pdo->query($sqlStatement);
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            $sqlStatement = "SELECT * FROM images WHERE pid = '" . $row['pid'] . "'";
            $result = $pdo->query($sqlStatement);
            $images = $result->fetchAll();
            if (!empty($images[0])) {
                $image = $images[0];
            }
            $n = 0
            ?>
            <section class="homeProducts">
                <form id="items" method="post" action="fullDetails.php?pid=<?php echo $row['pid']; ?>">
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
</body>
<?php include '../HeaderAndFooter/footer.html'; ?>
</html>
