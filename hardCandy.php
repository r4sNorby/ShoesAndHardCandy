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
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";

        $conn = new mysqli($servername, $username, $password, $db_name);
        // Charset doesn't always transfer properly from database to php
        $conn->set_charset("utf8");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>
        <aside>
            <div id="sidebar" class="sidebar">
            </div>
            <div id="sidebarbuttons" class="sidebarbuttons">
                <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
                <a href="hardCandy.php"><i class="material-icons">input</i> Indsæt Bolche</a>
                <a href="candyList.php"><i class="material-icons">list</i> Bolcheliste</a>
                <a href="shoeGraph.php"><i class="material-icons">insert_chart</i> Brugergraf</a>
                <a href="shoePie.php"><i class="material-icons">pie_chart</i> CirkelDiagram</a>
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
                            <a class="droptxt">☰ Projekter</a>
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
            <h1>Birger Bolcher</h1>

            <!-- Form for Insert.php -->
            <form action="candyInsert.php" method="post">
                <label>Navn: </label>
                <input type="text" name="name" placeholder="Bolche" required><br>
                <label>Farve: </label>
                <select name="color" required>
                    <?php
                    $color = "SELECT * FROM 1_color";
                    $colres = $conn->query($color);

                    if ($colres->num_rows > 0) {
                        while ($row = $colres->fetch_assoc()) {
                            ?> <option value="<?php echo $row["color_id"] ?>"><?php echo $row["color"]; ?></option><?php
                        }
                    } else {
                        echo "Database empty" . $conn->error;
                    }
                    ?>                    
                </select><br>
                <label>Vægt: 
                    <input type="number" min="1" max="40" name="weight" placeholder="Vægt" required>
                    gram</label><br>
                <label>Surhed: </label>
                <select name="sourness" required>
                    <?php
                    $sour = "SELECT sourness FROM 1_sourness";
                    $soures = $conn->query($sour);
                    if ($soures->num_rows > 0) {

                        while ($row = $soures->fetch_assoc()) {
                            ?> <option value="<?php echo $row["sourness_id"] ?>"><?php echo $row["sourness"]; ?></option><?php
                        }
                    } else {
                        echo "Database empty" . $conn->error;
                    }
                    ?>                    
                </select><br>
                <label>Styrke: </label>
                <select name="strength" required>
                    <?php
                    $strength = "SELECT tasteStrength FROM 1_tasteStrength";
                    $strres = $conn->query($strength);

                    if ($strres->num_rows > 0) {
                        while ($row = $strres->fetch_assoc()) {
                            ?> <option value="<?php echo $row["tasteStrength_id"] ?>"><?php echo $row["tasteStrength"]; ?></option><?php
                        }
                    } else {
                        echo "Database empty" . $conn->error;
                    }
                    ?>                    
                </select><br>
                <label>Type: </label>
                <select name="type" required>
                    <?php
                    $type = "SELECT tasteType FROM 1_tasteType";
                    $typres = $conn->query($type);
                    if ($typres->num_rows > 0) {
                        while ($row = $typres->fetch_assoc()) {
                            ?> <option value="<?php echo $row["tasteType_id"] ?>"><?php echo $row["tasteType"]; ?></option><?php
                        }
                    } else {
                        echo "Database empty" . $conn->error;
                    }
                    ?>                    
                </select><br>
                <label>Pris: 
                    <input type="number" min="1" max="100" name="price" placeholder="10" required>
                    øre(r)</label><br>

                <input type="submit" name="submit" value="Indsæt">
            </form>
            <br>
            <p>Test of the <a href="candyInsert_redirect.html">redirect</a> function</p>
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
