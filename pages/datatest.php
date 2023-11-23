<?php
include "./components/navbar.php";
include "./controller/Selectdata.php";
$sql = "SELECT DISTINCT YEAR(`date`) AS `year`, MONTH(`date`) AS `month` FROM `report_cannon` ORDER BY `date` DESC";
$result = $conn->query($sql);

$Year = $_SESSION['Year'];
// echo $Year;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    <style>
    .table-container {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    table {
        width: 100%;

    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-size: 11px;
    }
    </style>
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

    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(document).ready(function() {
        
        $('#searchInput').autocomplete({
            source: function(request, response) {
                
                $.ajax({
                    url: '../controller/SelectDataSearch.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data); 
                    }
                });
            },
            minLength: 1
        });
    });
    </script>

    
    <div class="mt-3">
        <label for="searchInput">ค้นหา Dept.ID หรือ Username:</label>
        <input type="text" name="searchInput" id="searchInput">
    </div>
    <div class="container mt-5 table-container">
        <div class="table-responsive">
            <table id="OP" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Filename</th>
                        <th>Dept.ID</th>
                        <th>Username</th>
                        <th>TotalPrints</th>
                        <th>ColorTotal</th>
                        <th>Black&WhiteTotal</th>
                        <th>ColorCopy</th>
                        <th>ColorPrint</th>
                        <th>Black&WhiteCopy</th>
                        <th>Black&WhitePrint</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `report_cannon` WHERE `date`  Like   '$Year%' ";
                    $result = $conn->query($sql);
                    $num = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $num =   $num+1;
                    ?>
                    <tr>
                        <td><?php echo $num?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['filename'] ?></td>
                        <td><?php echo $row['Dept.ID'] ?></td>
                        <td><?php echo $row['Username'] ?></td>
                        <td><?php echo $row['TotalPrints'] ?></td>
                        <td><?php echo $row['ColorTotal'] ?></td>
                        <td><?php echo $row['Black&WhiteTotal'] ?></td>
                        <td><?php echo $row['ColorCopy'] ?></td>
                        <td><?php echo $row['ColorPrint'] ?></td>
                        <td><?php echo $row['Black&WhiteCopy'] ?></td>
                        <td><?php echo $row['Black&WhitePrint'] ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        ?>
                    <tr>
                        <td colspan="13">No records found</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


</body>

</html>