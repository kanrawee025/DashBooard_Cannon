<?php
// include "./components/navbar.php";
include "./controller/Selectdata.php";

$sql = "SELECT DISTINCT YEAR(`date`) AS `year`, MONTH(`date`) AS `month` FROM `report_cannon` ORDER BY `date` DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <form method="post">
        <div class="mt-3">
            <label for="monthYear">เลือกเดือนและปี:</label>
            <select name="monthYear" id="monthYear">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $year = $row['year'];
                        $month = $row['month'];
                        $monthYear = date('M Y', strtotime("$year-$month-01"));
                        echo "<option value='$year-$month'>$monthYear</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Submit" name="Select">
        </div>
    </form>

</body>

</html>