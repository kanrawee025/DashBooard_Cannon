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

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="/public/css/data.css">
</head>

<body>
    <div class="datamain">
        <div class="card shadow">
            <div class="card-body">

                <div id="data">
                    <label for="data">DATA</label>
                </div>
                <form method="post">
                    <div class="mt-3">
                        <label for="monthYear">Select Month & Year : </label>
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
                        <input class="btnsubmit" type="submit" value="Seclect" name="Select">
                    </div>

                </form>

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
                            <tr class="hoverable">
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- table hover -->
    <!-- ตัวอย่างการเพิ่ม hover effect เมื่อ hover ตัวเมาส์ -->
    <script>
    $(document).ready(function() {
        var table = $('#OP').DataTable({
            pageLength: 10,
            ordering: true,
            info: true,
        });

        // Event handler for hover using DataTables API
        $('#OP tbody').on('mouseenter', 'tr.hoverable', function() {
            $(this).addClass('hover');
        });

        $('#OP tbody').on('mouseleave', 'tr.hoverable', function() {
            $(this).removeClass('hover');
        });

        // Uncomment the following lines if you want to handle click event
        $('#OP tbody').on('click', 'tr.hoverable', function() {
            $(this).toggleClass('selected');
        });
    });
    </script>





    <!-- Search Realtime -->
    <!-- <script>
    $(document).ready(function() {
        // DataTable initialization
        var table = $('#OP').DataTable({
            pageLength: 10,
            ordering: true,
            info: true,
        });

        // Event handler for the search input
        $('#searchInput').on('input', function() {
            // Get the value from the input
            var searchValue = $(this).val().toLowerCase();

            // Use DataTable search API to filter rows based on the search value
            table.search(searchValue).draw();
        });
    });
    </script> -->

</body>

</html>