<?php
session_name('loggedIn');
session_start();
include "../Shared/dbConf.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title></title>
</head>
<body>

<?php

$earlier = new DateTime($_SESSION['date']['start']);
$later = new DateTime($_SESSION['date']['end']);
$days = $later->diff($earlier)->format("%a");
$sqlStatement = "INSERT INTO buy( pid , cid,start,end,days,options,credit,expireddate,name,bank,type) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sqlStatement);
echo $sqlStatement;
$atributes=[$_SESSION['pid'], $_SESSION['loggedIn']['cId'], $_SESSION['date']['start'],
    $_SESSION['date']['end'], $days, $_SESSION['options'],$_POST['credit'],
    $_POST['expiredDate'],$_POST['name'],$_POST['bank'],$_POST['type']];
$status = $stmt->execute($atributes);
if ($status) {

    unset($_SESSION['loggedIn']['cart'][array_search($_SESSION['pid'], $_SESSION['loggedIn']['cart'])]);
    unset($_SESSION['pid']);
    unset($_SESSION['date']);

    ?>
    <script>
        alert("Done!")
    </script>
    <script>
        window.location = '../Home/Home.php';
    </script>
    <?php

} else {
    echo "<h3> error when completing order</h3> ";
}
?>

</body>
</html>