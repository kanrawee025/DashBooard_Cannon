<?php
include "./controller/selectTable.php";

$sql = "SELECT DISTINCT YEAR(`date`) AS `year` FROM `report_cannon` ORDER BY `date` DESC";
$result = $conn->query($sql);
?>
<body>

    <form method="post">
        <div class="mt-3">
            <label for="monthYear">เลือกปี:</label>
            <select name="monthYear" id="monthYear">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $year = $row['year'];
                        echo "<option value=' $year'>$year</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Submit" name="Select">
        </div>
    </form>

</body>

</html>