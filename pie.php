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
        <title>Lagkagediagram</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            
            // Function to generate a random color
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            
            // Function to draw the google chart
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
        
        // Put each shoeSize into the values array
        $values[] = $row['shoeSize'];

        //echo "percent";
        //echo " " . print_r(array_count_values($values)) . " ";
    }
    //echo "Values:";
    //print_r($values);
    
    // actually count the amount of eah shoesize and put them
    // into a new array called percent
    $percent = array_count_values($values);
    
    // Time to print the data
    foreach ($data as $row) {
        // Reset $firstval to the first value in the multidimensional array
        $firstVal = reset($data);

        //echo $firstVal;
        
        // Value equals shoesize
        $value = $row['shoeSize'];
        
        // Only print one line for each shoesize
        // Don't print size 45 if you just printed it.
        // Otherwise, you'll get two many columns/slices of pie
        if ($value != $lastVal || $value == $firstVal) {
            //echo "( $value )";
            //print_r($percent["$value"]);
            
            // Turn the size integer into a string
            $size = strval($value);

            //echo $size;
            
            // Print the values in the format that g-charts require
            echo "['" . $size . "', " . $percent["$value"] . "],";
            $lastVal = $value;
        }
    }
}
?>
                ]);
                // Google Charts options
                var options = {//'title':'Skostørrelse',
                    'colors': [getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor(), getRandomColor()],
                    is3D: true,
                    pieSliceText: 'percentage',
                    'width': 1200,
                    'height': 550};
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div>
            <h1>Hyppighed over skostørrelser</h1>
        </div>


        <a href="index.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>

        <div id="chart_div"></div>
    </body>
</html>