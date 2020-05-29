<?php
session_name('loggedIn');
session_start();
//include("../HeaderAndFooter/header.php");
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
    <title>Contacts</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        padding: 20px;
        text-align: left;
        color: white;
    }

    td {
        text-align: left;
        padding: 8px;
        font-family: "Agency FB";
        color: black;
        font-weight: bold;
    }

    tr {
        height: 150px;
    }

    input [type=text] {
        height: 50px;
    }

    input[type=submit], [type=button] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    tr:nth-child(even) {
        background-color: darkgray;
    }

    tr:nth-child(odd) {
        background-color: lightslategrey;
    }

</style>
<body>
<?php
include("../HeaderAndFooter/adminHeader.php");

?>
<article>
    <main>
        <?php

        $sqlStatement = "SELECT * FROM messages";
        // Prepare the results
        $result = $pdo->query($sqlStatement);
        // Execute the SQL query and get all rows
        $rows = $result->fetchAll();

        ?>
        <div style="overflow-x:auto;">
            <table style="width=100%; margin: 10px;">
                <tr style="height: 50px">
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Title
                    </th>
                </tr>

                <?php


                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td> <?php echo $row['senderName'] ?>
                        </td>

                        <td> <?php echo $row['senderEmail'] ?>
                        </td>

                        <td><?php echo $row['title'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Message:
                        </td>
                        <td>   <?php echo $row['message'] ?>
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
