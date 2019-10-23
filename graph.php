<?php
$servername = "localhost";
$username = "xran39.skp-dp";
$password = "k452ppy3";
$db_name = "xran39_skp_dp_sde_dk";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ShoeSize ORDER BY shoeSize DESC";
$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            
            function drawChart() {
                var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Name');
                    data.addColumn('number', 'Skostørrelse');
                    data.addRows([

                    <?php
                    if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                    echo "['" . $row['name'] . "', " . $row['shoeSize'] . "],";
                    }
                }
                ?>
                ]);
                var options = {'title':'Skostørrelse',
                       'colors': ['#228B22'],
                       'width':1200,
                       'height':500};
                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>

    </head>
    <body>

        <div>
            <h1>Skostørrelse <a href="pie.php">(Pie)</a></h1>
        </div>
        
        
        <a href="index.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>
        
        <div id="chart_div"></div>
    </body>
</html>
