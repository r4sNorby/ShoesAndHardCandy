<?php
$servername = "localhost";
$username = "xran39.skp-dp";
$password = "k452ppy3";
$db_name = "xran39_skp_dp_sde_dk";

$conn = new mysqli($servername, $username, $password, $db_name);

echo "Hello";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
    <head>
        <!-- Load Ajax API -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Load the visualization API and the corechart package.
            google.charts.load('current', {'packages': ['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instatiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

<?php
$_36 = 0;
$_37 = 0;
$_38 = 0;
$_39 = 0;
$_40 = 0;
$_41 = 0;
$_42 = 0;
$_43 = 0;
$_44 = 0;
$_45 = 0;
$_46 = 0;
$_47 = 0;

$sql = "SELECT shoeSize FROM ShoeSize";
echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //  Return results as an associative array and do stuff as long as there's data in it.
    while ($row = $result->fetch_assoc()) {
        // Echo all values
        echo "ShoeSize: " . $row["shoeSize"] . "<br>";

        for ($i = 0; $i < $result->num_rows; $i++) {
            if ($row["shoesize"] == 36) {
                $_36 += 1;
            } else if ($row["shoesize"] == 37) {
                $_37 += 1;
            } else if ($row["shoesize"] == 38) {
                $_38 += 1;
            } else if ($row["shoesize"] == 39) {
                $_39 += 1;
            } else if ($row["shoesize"] == 40) {
                $_40 += 1;
            } else if ($row["shoesize"] == 41) {
                $_41 += 1;
            } else if ($row["shoesize"] == 42) {
                $_42 += 1;
            } else if ($row["shoesize"] == 43) {
                $_43 += 1;
            } else if ($row["shoesize"] == 44) {
                $_44 += 1;
            } else if ($row["shoesize"] == 45) {
                $_45 += 1;
            } else if ($row["shoesize"] == 46) {
                $_46 += 1;
            } else if ($row["shoesize"] == 47) {
                $_47 += 1;
            }
        }
    }
}
?>

                // Create the data table
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Brugere');
                data.addColumn('number', 'Skostørrelse');
                data.addRows([
                    [36, <?php echo $_36; ?>],
                    [37, <?php echo $_37; ?>],
                    [38, <?php echo $_38; ?>],
                    [39, <?php echo $_39; ?>],
                    [40, <?php echo $_40; ?>],
                    [41, <?php echo $_41; ?>],
                    [42, <?php echo $_42; ?>],
                    [43, <?php echo $_43; ?>],
                    [44, <?php echo $_44; ?>],
                    [45, <?php echo $_45; ?>],
                    [46, <?php echo $_46; ?>],
                    [47, <?php echo $_47; ?>]
                ]);

                // Set chart options
                var options = {'title': 'Hyppighed over skostørrelser',
                    'width': 500,
                    'height': 300};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="chart_div"></div>

        <a href="index.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>
        <a href="insert.php">Insert</a>
    </body>
</html>
