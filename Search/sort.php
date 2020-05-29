<?php
session_name('loggedIn');
session_name('search');
session_start();
include("../Shared/dbConf.php");
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title></title>
</head>
<body>

<?php

if (!isset($_SESSION['search']['filter'])) {
    $filter = "name";
} else {
    $filter = $_SESSION['search']['filter'];
}
if (!isset($_SESSION['search']['by'])) {
    $by = "asc";
} else {
    $by = $_SESSION['search']['by'];
}
$space=" ";
if (isset($_SESSION['search']['manufacturer'])&&$_SESSION['search']['manufacturer']!='0')
    $sqlStatement = "SELECT * FROM cars WHERE name LIKE '%" . $_SESSION['search']['searchValue'] . "%' &&
    manufacturing LIKE '%" . $_SESSION['search']['manufacturer'] . "%' ORDER BY " . $filter.$space.$by;
else
    $sqlStatement = "SELECT * FROM cars WHERE name LIKE '%" . $_SESSION['search']['searchValue'] .
        "%' ORDER BY " . $filter.$space.$by;


$result = $pdo->query($sqlStatement);
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
                    <?php echo $row['name'] ?>
                </li>
                <li>
                    <?php echo $row['manufacturing'] ?>
                </li>
                <li>
                    <?php echo $row['description'] ?>
                </li>
                <li>
                    <?php echo $row['price'] ?>$
                </li>
            </ul>

            <?php
            if (!isset($_SESSION['adminN']) || !isset($_SESSION['adminP']) || !$_SESSION['adminP'] || $_SESSION['adminN'] != md5('admin') || $_SESSION['adminP'] != md5('admin')) {
                ?>
                <a href="<?php echo "../Shared/addToCart.php?pid=" . $row['pid']; ?>"> Add To cart</a>
                <?php
            }
            ?>
            <input type="submit" value="More Details"/>
        </form>
    </section>

    <?php
}
?>

<script>
    window.location = 'searchResult.php';
</script>
</body>
</html>

