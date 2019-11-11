<?php
$servername = "localhost";
$username = "xran39.skp-dp";
$password = "k452ppy3";
$db_name = "xran39_skp_dp_sde_dk";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT shoeSize FROM 1_ShoeSize ORDER BY shoeSize DESC";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lagkagediagram</title>
        <script src="sidebar.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawPie);

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
            function drawPie() {
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
    // actually count the amount of each shoesize and put them
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
                var chart = new google.visualization.PieChart(document.getElementById('pie_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>

        <header>
            <div class="topnav">
                <!-- Sidebar button -->
                <div class="togglebtn" onclick="toggle()">
                    <a>☰ Udvid menu</a>
                </div>

                <!-- Header Buttons-->
                <div class='headerButtons'>
                    <a class="buttons" href="index.html">Hjem</a>
                    <a class="buttons" href="shoes.html">Skostørrelser</a>
                    <a class="buttons" href="hardCandy.html">Birger Bolcher</a>
                    <div class="dropbtn">
                        <div class="droptxt">
                            <a class="droptxt">☰ Projekter</a>
                        </div>
                        <div class="dropdown-content">
                            <a href="index.html">Hjem</a>
                            <a href="shoes.html">Skostørrelser</a>
                            <a href="hardCandy.html">Birger Bolcher</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <aside id="sidebar" class="sidebar">
            <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
            <a href="shoes.html"><i class="material-icons">input</i> Indsæt Bruger</a>
            <a href="list.php"><i class="material-icons">list</i> Brugerliste</a>
            <a href="graph.php"><i class="material-icons">insert_chart</i> Brugergraf</a>
            <a href="pie.php"><i class="material-icons">pie_chart</i> CirkelDiagram</a>
        </aside>

        <div id="main">
            <h1>Hyppighed over skostørrelser</h1>

            <a href="shoes.html">Home</a>
            <a href="list.php">List</a>
            <a href="graph.php">Graph</a>

            <div id="pie_div"></div>
        </div>

        <footer>
            <div class="footerTop">
                <nav class="footerButtons">
                    <a class="footerLink" href="index.html">HJEM</a>
                    <span>|</span>
                    <a class="footerLink" href="shoes.html">SKOSTØRRELSER</a>
                    <span>|</span>
                    <a class="footerLink" href="hardCandy.html">BIRGER BOLCHER</a>
                </nav>
            </div>

            <div class="footerBottom">
                <span>&COPY; 2019 Rasmus Nørby</span>
            </div>
        </footer>
    </body>
</html>