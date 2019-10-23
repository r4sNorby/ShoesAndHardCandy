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
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Skostørrelse');
                data.addColumn('number', 'Hyppighed');
                data.addRows([
<?php
if (mysqli_num_rows($result) > 0) {

    // Create Array
    $data = array();

    // Select the data
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }

    // Use the data in a foreach loop
    foreach ($data as $row) {

        //print_r($row['shoeSize']);
        $values[] = $row['shoeSize'];

        //echo "percent";
        //echo " " . print_r(array_count_values($values)) . " ";
    }
    //echo "Values:";
    //print_r($values);

    $percent = array_count_values($values);

    $value = 0;

    foreach ($data as $row) {
        // Reset $firstval to the first value in the multidimensional array
        $firstVal = reset($data);

        //echo $firstVal;

        $value = $row['shoeSize'];
        if ($value != $lastVal || $value == $firstVal) {
            //echo "( $value )";
            //print_r($percent["$value"]);

            $size = strval($value);

            //echo $size;

            echo "['" . $size . "', " . $percent["$value"] . "],";
            $lastVal = $value;
        }
    }
}
?>
                ]);
                var options = {//'title':'Skostørrelse',
                    'colors': ['#0000bb', '#bb0000', '#8732a8', '#a83432', '#ffad29', '#1e610f', '#ffa500', '#32cd32'],
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    'width': 1200,
                    'height': 550};
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>

    </head>
    <body>
        <div>
            <h1>Skostørrelse</h1>
        </div>


        <a href="index.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>

        <div id="chart_div"></div>
    </body>
</html>