<?php
if (isset($_POST['Select'])) {
    $year = $_POST['monthYear'];
    $_SESSION['YearTable'] = $year;
    $YearTable = $_SESSION['YearTable'];
    // echo $_SESSION['YearTable'];
}

$sql = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`TotalPrints`) as `totalPrintsSum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$result = $conn->query($sql);

echo $YearTable;
// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $totalPrintsSum = $row['totalPrintsSum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels[] = "$year-$month";
        $data[] = $totalPrintsSum;
    }
}

$sql_copy = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`,  SUM(`ColorCopy` + `Black&WhiteCopy`) as `totalCopySum`  FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$result_copy = $conn->query($sql_copy);

$labels_copy = [];
$data_copy = [];


if ($result_copy->num_rows > 0) {
    while ($row = $result_copy->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $totalCopySum = $row['totalCopySum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels_copy[] = "$year-$month";
        $data_copy[] = $totalCopySum;
    }
}

$sqlBW = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`Black&WhiteTotal`) as `BlackWhiteTotalSum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$resultBW = $conn->query($sqlBW);


// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labelsBW = [];
$dataBW = [];

if ($resultBW->num_rows > 0) {
    while ($row = $resultBW->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $BlackWhiteTotalSum = $row['BlackWhiteTotalSum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labelsBW[] = "$year-$month";
        $dataBW[] = $BlackWhiteTotalSum;
    }
}

$sqlColorTotal = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`ColorTotal`) as `ColorTotalSum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$resultColorTotal = $conn->query($sqlColorTotal);


// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labels_ColorTotal = [];
$data_ColorTotal = [];

if ($resultColorTotal->num_rows > 0) {
    while ($row = $resultColorTotal->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $ColorTotalSum = $row['ColorTotalSum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels_ColorTotal[] = "$year-$month";
        $data_ColorTotal[] = $ColorTotalSum;
    }
}

$sqlBWP = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`Black&WhitePrint`) as `BlackWhitePrintSum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$resultBWP = $conn->query($sqlBWP);


// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labels_BWP = [];
$data_BWP = [];

if ($resultBWP->num_rows > 0) {
    while ($row = $resultBWP->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $BlackWhitePrintSum = $row['BlackWhitePrintSum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels_BWP[] = "$year-$month";
        $data_BWP[] = $BlackWhitePrintSum;
    }
}

$sqlColorPrint = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`ColorPrint`) as `ColorPrintsum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$resultColorPrint = $conn->query($sqlColorPrint);


// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labels_ColorPrint = [];
$data_ColorPrint = [];

if ($resultColorPrint->num_rows > 0) {
    while ($row = $resultColorPrint->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $ColorPrintsum = $row['ColorPrintsum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels_ColorPrint[] = "$year-$month";
        $data_ColorPrint[] = $ColorPrintsum;
    }
}

$sqlBWC = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`Black&WhiteCopy`) as `BlackWhiteCopySum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$resultBWC = $conn->query($sqlBWC);


// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labels_BWC = [];
$data_BWC = [];

if ($resultBWC->num_rows > 0) {
    while ($row = $resultBWC->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $BlackWhiteCopySum = $row['BlackWhiteCopySum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels_BWC[] = "$year-$month";
        $data_BWC[] = $BlackWhiteCopySum;
    }
}
$sqlColorCopy = "SELECT YEAR(`date`) as `year`, MONTH(`date`) as `month`, SUM(`ColorCopy`) as `ColorCopysum` FROM `report_cannon` WHERE YEAR(`date`) like $YearTable GROUP BY `year`, `month`";
$resultColorCopy = $conn->query($sqlColorCopy);


// สร้าง JavaScript array เพื่อเก็บข้อมูล
$labels_ColorCopy = [];
$data_ColorCopy = [];

if ($resultColorCopy->num_rows > 0) {
    while ($row = $resultColorCopy->fetch_assoc()) {
        $year = $row['year'];
        $month = $row['month'];
        $ColorCopysum = $row['ColorCopysum'];

        // เพิ่มข้อมูลใน JavaScript array
        $labels_ColorCopy[] = "$year-$month";
        $data_ColorCopy[] = $ColorCopysum;
    }
}
?>