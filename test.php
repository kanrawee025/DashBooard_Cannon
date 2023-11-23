<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
.main {
    width: 90%;
    text-align: center;
    border: 1px solid;
    margin: 10px auto;
    padding: 20px;
}


#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td,
#customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even) {
    background-color: #f2f2f2;
}

#customers tr:hover {
    background-color: #ddd;
}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
}
</style>

<body>
    <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <table id="customers">
                                        <tr>
                                            <th>Company</th>
                                            <th>Contact</th>
                                            <th>Country</th>
                                        </tr>
                                        <tr>
                                            <td>Alfreds Futterkiste</td>
                                            <td>Maria Anders</td>
                                            <td>Germany</td>
                                        </tr>
                                        <tr>
                                            <td>Berglunds snabbköp</td>
                                            <td>Christina Berglund</td>
                                            <td>Sweden</td>
                                        </tr>
                                        <tr>
                                            <td>Centro comercial Moctezuma</td>
                                            <td>Francisco Chang</td>
                                            <td>Mexico</td>
                                        </tr>
                                        <tr>
                                            <td>Ernst Handel</td>
                                            <td>Roland Mendel</td>
                                            <td>Austria</td>
                                        </tr>
                                        <tr>
                                            <td>Island Trading</td>
                                            <td>Helen Bennett</td>
                                            <td>UK</td>
                                        </tr>
                                        <tr>
                                            <td>Königlich Essen</td>
                                            <td>Philip Cramer</td>
                                            <td>Germany</td>
                                        </tr>
                                        <tr>
                                            <td>Laughing Bacchus Winecellars</td>
                                            <td>Yoshi Tannamuri</td>
                                            <td>Canada</td>
                                        </tr>
                                        <tr>
                                            <td>Magazzini Alimentari Riuniti</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td>North/South</td>
                                            <td>Simon Crowther</td>
                                            <td>UK</td>
                                        </tr>
                                        <tr>
                                            <td>Paris spécialités</td>
                                            <td>Marie Bertrand</td>
                                            <td>France</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h2 class="card-title">Bar Chart</h2>
                                    <canvas id="myBarChart" style="width: 100%; height: 300px;"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>


    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                label: "Number of People",
                data: [208, 160, 222, 94, 111],
                backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4CAF50", "#FF9800"],
                borderWidth: 1
            }]
        };

        // Options
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Get the context of the canvas element
        var ctx = document.getElementById("myBarChart").getContext("2d");

        // Create the bar chart
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
    </script>
</body>

</html>