<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- <style>
.row {
    display: flex;
}

.container {
    width: 30%;
}

.card {
    width: 400px;
}
</style> -->

<body>

    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <a href="/" class="w3-bar-item w3-button">DASHBOARD</a>
        <a href="/page/data/" class="w3-bar-item w3-button">DATA TOTAL</a>

    </div>

    <div id="main">

        <div class="w3-teal row d-flex align-items-center">
            <div class="col-md-4">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
            </div>
            <div class="col-md-6">
                <h1>Data Cannon Printers</h1>
            </div>
        </div>

        <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
        </script>
</body>

</html>