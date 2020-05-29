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
