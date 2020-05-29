<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
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
<html>
<head>
    <title>Customers</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<article>
    <main>
        <?php
        include("../HeaderAndFooter/adminHeader.php");
        $sqlStatement = "SELECT * FROM customers";
        $result = $pdo->query($sqlStatement);
        $rows = $result->fetchAll();

        ?>
        <div class="tableView" style="overflow-x:auto;">
            <table style="width=100%; margin: 10px;">
                <tr style="height: 50px">
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Date Of Birth
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Telephone
                    </th>

                </tr>

                <?php


                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['cId'] ?>

                        </td>

                        <td> <?php echo $row['name'] ?>
                        </td>

                        <td> <?php echo $row['email'] ?>
                        </td>

                        <td>   <?php echo $row['dateOfBirth'] ?>
                        </td>

                        <td><?php echo $row['address'] ?>
                        </td>

                        <td>   <?php echo $row['telephone'] ?>
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
