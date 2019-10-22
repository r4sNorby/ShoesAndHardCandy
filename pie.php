<?php
$servername = "localhost";
$username = "xran39.skp-dp";
$password = "k452ppy3";
$db_name = "xran39_skp_dp_sde_dk";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT shoeSize FROM ShoeSize ORDER BY shoeSize DESC";
$result = $conn->query($sql);

?>
<!--
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
-->
                <?php
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        
                        //print_r($row);
                        $values[] = $row['shoeSize'];
                        
                        $value = $row['shoeSize'];
                        //echo "( $value )";
                        
                        $percent = array_count_values($values);
                        //echo "percent";
                        //echo " " . print_r(array_count_values($percent[45])) . " ";
                    //}
                    //echo "Values:";
                    //print_r($values);
                
                    //$percent = array_count_values($values);
                    
                        // Erstat 45 med en variabel der er den øjeblikkelige skostørrelse
                    print_r($percent[45]);
                    
                    //while ($row = mysqli_fetch_array($result)) {
                    echo "<br> Percent";
                    //print_r($percent);
                    
                        //echo "['" . $row['shoeSize'] . "', " . $percent . "],";
                    }
                }
                ?><!--
                ]);
                var options = {//'title':'Skostørrelse',
                       'colors': ['#0000bb', '#bb0000', '#8732a8', '#a83432', '#ffad29', '#1e610f'],
                       is3D: true,
                       'width':1200,
                       'height':500};
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>

    </head>
    <body>
        <div>
            <h1>Skostørrelse</h1>
        </div>
        
        <div id="chart_div"></div>

        <a href="index.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>
    </body>
</html>
-->