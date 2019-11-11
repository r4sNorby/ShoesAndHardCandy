<?php
$servername = "localhost";
$username = "xran39.skp-dp";
$password = "k452ppy3";
$db_name = "xran39_skp_dp_sde_dk";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM 1_ShoeSize ORDER BY shoeSize DESC";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Graf</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="sidebar.js"></script>
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
                    'colors': [getRandomColor(), '#228B22'],
                    'width': 1000,
                    'height': 500};
                var chart = new google.visualization.ColumnChart(document.getElementById('graph_div'));
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
            <div class="sidebarbuttons">
                <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
                <a href="shoes.html"><i class="material-icons">input</i> Indsæt Bruger</a>
                <a href="shoeList.php"><i class="material-icons">list</i> Brugerliste</a>
                <a href="shoeGraph.php"><i class="material-icons">insert_chart</i> Brugergraf</a>
                <a href="shoePie.php"><i class="material-icons">pie_chart</i> CirkelDiagram</a>
            </div>
        </aside>
        
        <div id="main">
            <h1>Skostørrelse <a href="pie.php">(Pie)</a></h1>

            <div id="graph_div"></div>
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
