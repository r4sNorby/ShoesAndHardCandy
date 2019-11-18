<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Birger Bolcher</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="sidebar.js"></script>
    </head>
    <body>
        <aside>
            <div id="sidebar" class="sidebar">
            </div>
            <div id="sidebarbuttons" class="sidebarbuttons">
                <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
                <a href="hardCandy.php"><i class="material-icons">input</i> Indsæt Bolche</a>
                <a href="candyList.php"><i class="material-icons">list</i> Bolcheliste</a>
                <a href="candyColor.php"><i class="material-icons">color_lens</i> Farver</a>
                <a href="candySourness.php"><i class="material-icons">sentiment_very_dissatisfied</i> Surheder</a>
                <a href="candyStrength.php"><i class="material-icons">fitness_center</i> Styrker</a>
                <a href="candyType.php"><i class="material-icons">local_dining</i> Typer</a>
            </div>
        </aside>

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
                    <a class="buttons" href="hardCandy.php">Birger Bolcher</a>
                    <div class="dropbtn">
                        <div class="droptxt">
                            <a class="droptxt"><i class="material-icons">arrow_drop_down</i> Projekter</a>
                        </div>
                        <div class="dropdown-content">
                            <a href="index.html">Hjem</a>
                            <a href="shoes.html">Skostørrelser</a>
                            <a href="hardCandy.php">Birger Bolcher</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="main">
            <h1>Indsæt Smagstype</h1>

            <!--Type-->
            <form action="attributeInsert.php" method="post">
                <label>Smagstype: </label>
                <input type="text" name="type" required><br>
                <input type="submit" name="submit" value="Indsæt">
            </form>
            <br>
            
            <div class="list">
                <?php
                $servername = "localhost";
                $username = "xran39.skp-dp";
                $password = "k452ppy3";
                $db_name = "xran39_skp_dp_sde_dk";

                $conn = new mysqli($servername, $username, $password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Charset doesn't always transfer properly from database to php
                $conn->set_charset("utf8");

                $sql = "SELECT * FROM 1_tasteType";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p class='listItems'>" . $row["tasteType_id"] . " - " . $row["tasteType"] . "</p>";
                    }
                } else {
                    echo "Database empty" . $conn->error;
                }

                $conn->close();
                ?>
            </div>
        </div>

        <footer>
            <div class="footerTop">
                <nav class="footerButtons">
                    <a class="footerLink" href="index.html">HJEM</a>
                    <span>|</span>
                    <a class="footerLink" href="shoes.html">SKOSTØRRELSER</a>
                    <span>|</span>
                    <a class="footerLink" href="hardCandy.php">BIRGER BOLCHER</a>
                </nav>
            </div>

            <div class="footerBottom">
                <span>&COPY; 2019 Rasmus Nørby</span>
            </div>
        </footer>
    </body>
</html>
