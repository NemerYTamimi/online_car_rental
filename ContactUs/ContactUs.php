<?php
session_name('loggedIn');
session_start();
include '../Shared/dbConf.php';
?>
<!doctype html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        label {
            font-size: x-large;
        }
    </style>
</head>
<body>
<?php
include '../HeaderAndFooter/header.php';

?>
<article>
    <main>

        <div id="message" >
            <form method="post" action="ContactUs.php">
                <table >
                    <tr>
                        <td>
                            <label for="Name">Name :</label>
                        </td>
                        <td>
                            <input name="Name" type="text" maxlength="60" style="width:350px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="SenderEmail">E-mail :</label>
                        </td>
                        <td>
                            <input name="SenderEmail" type="text" maxlength="43" style="width:350px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Messagetitle ">Title :</label>
                        </td>
                        <td>
                            <input name="Messagetitle" type="text" maxlength="90" style="width:350px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="MessageBody">Message:</label>
                        </td>
                        <td>
                            <textarea name="MessageBody" rows="7" cols="40" style="width:350px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input name="skip_Reset" type="reset" value="Reset Form"/>
                            <input name="skip_Submit" type="submit" value="Submit"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</article>

</body>
<?php include '../HeaderAndFooter/footer.html';
include '../Shared/dbConf.php';
?>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlStatement = "INSERT INTO messages(senderName, senderEmail, title, message) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sqlStatement);
    $status = $stmt->execute([$_POST['Name'], $_POST['SenderEmail'], $_POST['Messagetitle'], $_POST['MessageBody']]);
    if ($status) {
        ?>
        <script>
            alert("Message Sent successfully");

        </script>

        <?php
    } else {
        echo $stmt->error;
    }
}
?>
