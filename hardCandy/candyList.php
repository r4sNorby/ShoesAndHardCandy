<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once '../functions/connection.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
        <title>Bolcheliste</title>
    </head>
    <body>
        <?php
        include_once '../hardCandy/candySidebar.php';
        include_once '../functions/header.php';
        ?>

        <div id="main">
            <div id="content">
                <!--Drop-down menu-->
                <form action="candyList.php" method="POST" class="candyListForm">
                    <select name="candyList" onchange="this.form.submit()">
                        <option>Vælg en søgning...</option>
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
                </form>

                <!--Random Candy and Search Bar-->
                <form action="candyList.php" method="POST" class="candyListForm">
                    <input type="submit" name="random" value="Alt om et tilfældigt bolche">
                    <input type="text" name="search">
                    <input type="submit" name="submit" value="Søg">
                </form>

                <!--Form for deleting the database entries-->
                <div class="list">
                    <form action="candyDelete.php" method="post">

                        <?php
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
                            }
                            // All info about a random piece of candy
                        } else if (isset($random)) {
                            $sql = "SELECT * FROM 1_HardCandy " .
                                    "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                    "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                    "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                    "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                    "ORDER BY RAND() LIMIT 1";
                            // Search Bar
                        } else if (isset($search)) {
                            if ($search != "") {
                                $sql = "SELECT * FROM 1_HardCandy " .
                                        "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                                        "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                                        "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                                        "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                                        "WHERE name LIKE '%" . $search . "%'" .
                                        "ORDER BY id ASC";
                            }
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
                                ?>
                                <!-- Adding a checkbox before each row -->
                                <p class='listItems'>
                                    <input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>">
                                    <?php
                                    echo "Navn: " . $row["name"] . " - Farve: " . $row["color"] . " - Vægt: " . $row["weight"] . " - Surhed: " . $row["sourness"] . " - Smagsstyrke: " . $row["tasteStrength"] . " - Smagstype: " . $row["tasteType"] . " - Pris: " . $row["price"] . "</p><br>";
                                }
                                ?>
                                <!-- Submit button for deleting rows -->
                                <input type="submit" id='delete' name="delete" value="Delete">
                                <?php
                            } else if ($search == "") {
                                // If nothing was typed into the search bar
                                echo "Skriv venligst noget i søgefeltet...<br>";
                            } else if ($search != "") {
                                // If nothing in the database matches the search term
                                echo "Kunne ikke finde noget der minder om '$search'";
                            } else {
                                // Otherwise the database must be empty
                                echo "Database er tom" . $conn->error;
                            }

                            $conn->close();
                            ?>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>
