<?php
include "./components/navbar.php";
include "./controller/scan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>

    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="main">

        <div class="card container">
            <div class="card-body">

                <div class="container">
                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <?php
                                include "./pages/selectTable.php";
                                ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form n method="post" enctype="multipart/form-data">
                                        <p>Upload</p>
                                        <input type="file" name="file" id="fileInput" onchange="displayFileInfo()">
                                        <input type="hidden" id="modifiedTime" name="modifiedTime">
                                        <input type="hidden" id="fileName" name="fileName">
                                        <button type="submit" name="submit">Upload</button>
                                    </form>
                                    <div id="fileInfo"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>Print Total <?php echo $YearTable; ?></h2>
                                    <canvas id="barChart" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart').getContext('2d');
                                    var barChart = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>Copy Total <?php echo $YearTable; ?></h2>
                                    <canvas id="barChart2" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels_copy); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data_copy); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart2').getContext('2d');
                                    var barChart2 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart2.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>Black&White Total <?php echo $YearTable; ?></h2>
                                    <canvas id="barChart3" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labelsBW); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($dataBW); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart3').getContext('2d');
                                    var barChart3 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart3.update();
                                    }
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>Color Total <?php echo $YearTable; ?></h2>
                                    <canvas id="barChart4" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels_ColorTotal); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data_ColorTotal); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart4').getContext('2d');
                                    var barChart4 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart4.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row 4 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>Black&WhitePrint<?php echo $YearTable; ?></h2>
                                    <canvas id="barChart5" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels_BWP); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data_BWP); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart5').getContext('2d');
                                    var barChart5 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart5.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>ColorPrint<?php echo $YearTable; ?></h2>
                                    <canvas id="barChart6" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels_ColorPrint); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data_ColorPrint); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart6').getContext('2d');
                                    var barChart6 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart6.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row 5 -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>Black&WhiteCopy <?php echo $YearTable; ?></h2>
                                    <canvas id="barChart7" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels_BWC); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data_BWC); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart7').getContext('2d');
                                    var barChart7 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart7.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2>ColorCopy<?php echo $YearTable; ?></h2>
                                    <canvas id="barChart8" width="400" height="400"></canvas>

                                    <script>
                                    var barData = {
                                        labels: <?php echo json_encode($labels_ColorCopy); ?>,
                                        datasets: [{
                                            data: <?php echo json_encode($data_ColorCopy); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                        }]
                                    };

                                    var ctxBar = document.getElementById('barChart8').getContext('2d');
                                    var barChart8 = new Chart(ctxBar, {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    function submitData() {
                                        var inputValue = document.getElementById('inputData').value;
                                        barData.datasets[0].data[9] = parseInt(inputValue) || 0;
                                        barChart8.update();
                                    }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <script>
    function displayFileInfo() {
        const fileInput = document.getElementById('fileInput');
        const fileInfoDiv = document.getElementById('fileInfo');

        if (fileInput.files.length > 0) {
            const selectedFile = fileInput.files[0];

            const fileName = selectedFile.name;
            const modifiedTime = new Date(selectedFile.lastModified).toLocaleString();

            fileInfoDiv.innerHTML =
                "ชื่อไฟล์: " + fileName + "<br>เวลาที่ปรับเปลี่ยนล่าสุด: " + modifiedTime;
            document.getElementById("modifiedTime").value = modifiedTime;
            document.getElementById("fileName").value = fileName;
        }
    }
    </script>

</body>

</html>