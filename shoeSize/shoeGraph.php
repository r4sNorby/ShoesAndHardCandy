<?php
$servername = "localhost";
$username = "xran39.skp-dp";
$password = "k452ppy3";
$db_name = "xran39_skp_dp_sde_dk";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM 1_shoeSize ORDER BY shoeSize DESC";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graf</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawGraph);

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
            function drawGraph() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Name');
                data.addColumn('number', 'Skostørrelse');
                data.addRows([

<?php
// Insert the name and shoesize from a database via php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        // This is the format that google charts require
        echo "['" . $row['name'] . "', " . $row['shoeSize'] . "],";
    }
}
?>
                ]);
                // Options for the chart
                var options = {'title': 'Skostørrelse',
                    'colors': [getRandomColor(), '#228B22']

                            // Google Charts defaults to the size of the parent box
                            /*'width': 1000,
                             //'height': 500*/};
                var chart = new google.visualization.ColumnChart(document.getElementById('graph_div'));
                chart.draw(data, options);
            }
        </script>
        <script src="../snow.js"></script>
    </head>
    <body>
        <?php
        include_once 'shoeSidebar.php';
        include_once '../functions/header.php';
        ?>
        
        <div id="snowflakeContainer">
            <span class="snowflake"></span>
        </div>

        <div id="main">
            <div id="content">
                <h1>Skostørrelse <a href="pie.php">(Pie)</a></h1>

                <div id="graph_div"></div>
            </div>
        </div>

        <footer>
            <div class="footerTop">
                <nav class="footerButtons">
                    <a class="footerLink" href="index.php">HJEM</a>
                    <span>|</span>
                    <a class="footerLink" href="../shoeSize/shoes.php">SKOSTØRRELSER</a>
                    <span>|</span>
                    <a class="footerLink" href="../hardCandy/hardCandy.php">BIRGER BOLCHER</a>
                </nav>
            </div>

            <div class="footerBottom">
                <span>&COPY; 2019 Rasmus Nørby</span>
            </div>
        </footer>
    </body>
</html>
