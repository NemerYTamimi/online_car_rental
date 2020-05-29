<?php
session_name('loggedIn');
session_start();
if (!isset($_SESSION['adminN']) || !isset($_SESSION['adminP']) || !$_SESSION['adminP'] || $_SESSION['adminN'] != md5('admin') || $_SESSION['adminP'] != md5('admin')) {
    include("../HeaderAndFooter/header.php");
} else {
    include("../HeaderAndFooter/adminHeader.php");

}
include("../Shared/dbConf.php");
session_abort();
session_name('search');
session_start();

if (isset($_GET['searchValue'])) {
    $_SESSION['search']['searchValue'] = $_GET['searchValue'];
    if (isset($_GET['by']))
        $_SESSION['search']['by'] = $_GET['by'];
    if (isset($_GET['manufacturer']))
        $_SESSION['search']['manufacturer'] = $_GET['manufacturer'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Search Result</title>
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
<div class="label1">
    <form action="../Search/searchResult.php" method="get">
        <input type="text" style="width: auto" placeholder="Enter car model" name="searchValue"/>
        <select name="manufacturer" style="width: auto">
            <option value="0">Select Manufacturer</option>
            <?php
            include("../Shared/dbConf.php");
            $sqlStatement = "SELECT * FROM cars";
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
<div id="result">
</div>
<?php $currentURI=$_SERVER['REQUEST_URI']?>
    <div class="label1"> <h1>Search Result</h1>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">
                Sort By
            </button>
            <div id="myDropdown" class="dropdown-content">
                <a href="searchSession.php?filter=pid&back=<?php echo $currentURI?>">ID</a>
                <a href="searchSession.php?filter=name&back=<?php echo $currentURI?>">model</a>
                <a href="searchSession.php?filter=country&back=<?php echo $currentURI?>">country</a>
                <a href="searchSession.php?filter=manufacturing&back=<?php echo $currentURI?>">manufacturing</a>
                <a href="searchSession.php?filter=consumption&back=<?php echo $currentURI?>">consumption</a>
                <a href="searchSession.php?filter=price&back=<?php echo $currentURI?>">price</a>
                <a href="searchSession.php?filter=horsepower&back=<?php echo $currentURI?>">horse power</a>
                <a href="searchSession.php?filter=length&back=<?php echo $currentURI?>">length</a>
                <a href="searchSession.php?filter=width&back=<?php echo $currentURI?>">width</a>
                <a href="searchSession.php?filter=year&back=<?php echo $currentURI?>">year</a>
            </div>
        </div>
    </div>

    <div id="RESULT">

    </div>
    <!--             ajax  from    https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp -->
    <script>
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "sort.php";
        var asynchronous = true;
        ajax.open(method, url, asynchronous);
        ajax.send();
        ajax.onreadystatechange = function () {
            if ((this.readyState == 4) && (this.status = 200)) {
                result = document.getElementById("RESULT");
                result.innerHTML = this.responseText;
            }
        }
    </script>

    <script>
        /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
        /* get help from internet from w3school site*/
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>


</div>
</body>
</html>
