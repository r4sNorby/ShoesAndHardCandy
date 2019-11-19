
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="sidebar.js"></script>
        <title></title>
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
            <form action="candyList.php" method="POST" class="candyListForm">
                <select name="candyList" onchange="this.form.submit()">
                    <option value="all">Alle</option>
                    <option value="red">Rød</option>
                    <option value="redAndBlue">Rød og Blå</option>
                    <option value="notRed">Ikke Røde Alfabetisk</option>
                    <option value="startB">Starter med B</option>
                    <option value="anE">Mindst ét E</option>
                    <option value="lessThanTen">Mindre end 10 gram, vægt stigende</option>
                    <option value="tenAndTwelve">Mellem 10 og 12 gram alfabetisk og derefter vægt</option>
                    <option value="heavyThree">De tre tungeste bolcher</option>
                </select>
                <input type="submit" value="random">Alt om et tilfældigt bolche
                <input type="text" name="search">
                <input type="submit" name="submit" value="Søg">
            </form>
            <div class="list">

                <?php
                $servername = "localhost";
                $username = "xran39.skp-dp";
                $password = "k452ppy3";
                $db_name = "xran39_skp_dp_sde_dk";

                $candyList = filter_input(INPUT_POST, 'candyList');
                // All criteria:
                $all = filter_input(INPUT_POST, 'all');
                $red = filter_input(INPUT_POST, 'red');
                $redAndBlue = filter_input(INPUT_POST, 'redAndBlue');
                $notRed = filter_input(INPUT_POST, 'notRed');
                $startB = filter_input(INPUT_POST, 'startB');
                $anE = filter_input(INPUT_POST, 'anE');
                $lessThanTen = filter_input(INPUT_POST, 'lessThanTen');
                $tenAndTwelve = filter_input(INPUT_POST, 'tenAndTwelve');
                $heavyThree = filter_input(INPUT_POST, 'heavyThree');
                $random = filter_input(INPUT_POST, 'random');
                $search = filter_input(INPUT_POST, 'search');

                $conn = new mysqli($servername, $username, $password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Charset doesn't always transfer properly from database to php
                $conn->set_charset("utf8");

                // Show all
                if (isset($candyList)) {
                    if ($candyList == "all") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "ORDER BY id";
                        // Red candy
                    } else if ($candyList == "red") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE color = 'rød'" .
                                "ORDER BY id ASC";
                        // Red and blue candy
                    } else if ($candyList == "redAndBlue") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE color IN ('rød', 'blå')" .
                                "ORDER BY id";
                        // All except red candy
                    } else if ($candyList == "notRed") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE color != 'rød'" .
                                "ORDER BY name ASC";
                        // All starting with a B
                    } else if ($candyList == "startB") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE name LIKE 'b%'" .
                                "ORDER BY id";
                        // All candy that has an E in its name
                    } else if ($candyList == "anE") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE name LIKE '%e%'" .
                                "ORDER BY id";
                        // All candy that weighs less than 10 grams
                    } else if ($candyList == "lessThanTen") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE weight < 10 " .
                                "ORDER BY weight ASC";
                        // All candy that weighs between 10 and 12 grams
                    } else if ($candyList == "tenAndTwelve") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "WHERE weight between 10 AND 12 " .
                                "ORDER BY name ASC, weight";
                        // The 3 biggest/heaviest candys
                    } else if ($candyList == "heavyThree") {
                        $sql = "SELECT * FROM 1_HardCandy " .
                                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                "ORDER BY weight DESC LIMIT 3";
                        // All info about a random piece of candy
                    }
                } else if ($candyList == "random") {
                    $sql = "SELECT * FROM 1_HardCandy " .
                            "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                            "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                            "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                            "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                            "ORDER BY RAND() LIMIT 1";
                    // Search Bar
                } else if ($candyList == "search") {
                    $sql = "SELECT * FROM 1_HardCandy " .
                            "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                            "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                            "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                            "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                            "WHERE name LIKE '%" . $search . "%'" .
                            "ORDER BY id ASC";
                } else {
                    $sql = "SELECT * FROM 1_HardCandy " .
                            "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                            "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                            "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                            "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                            "ORDER BY id";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p class='listItems'>Navn: " . $row["name"] . " - Farve: " . $row["color"] . " - Vægt: " . $row["weight"] . " - Surhed: " . $row["sourness"] . " - Smagsstyrke: " . $row["tasteStrength"] . " - Smagstype: " . $row["tasteType"] . " - Pris: " . $row["price"] . "</p><br>";
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
