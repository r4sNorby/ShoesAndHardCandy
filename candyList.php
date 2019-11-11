
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="candyList.php" method="POST">
            <input type="submit" name="all" value="Alle">
            <input type="submit" name="red" value="Rød">
            <input type="submit" name="redAndBlue" value="Rød og Blå">
            <input type="submit" name="notRed" value="Ikke Røde Alfabetisk">
            <input type="submit" name="startB" value="Starter med B">
            <input type="submit" name="anE" value="Mindst ét E">
            <input type="submit" name="lessThanTen" value="Mindre end 10 gram, vægt stigende">
            <input type="submit" name="tenAndTwelve" value="Mellem 10 og 12 gram alfabetisk og derefter vægt">
            <input type="submit" name="heavyThree" value="De tre tungeste bolcher">
            <input type="submit" name="random" value="Alt om et tilfældigt bolche">
            <input type="text" name="search">
            <input type="submit" name="submit" value="Søg">
        </form>
        
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";
        
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
        if (isset($all)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "ORDER BY id";
        // Red candy
        } else if (isset($red)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE color = 'rød'" .
                "ORDER BY id ASC";
        // Red and blue candy
        } else if (isset($redAndBlue)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE color IN ('rød', 'blå')" .
                "ORDER BY id";
        // All except red candy
        } else if (isset($notRed)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE color != 'rød'" .
                "ORDER BY name ASC";
        // All starting with a B
        } else if (isset($startB)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE name LIKE 'b%'" .
                "ORDER BY id";
        // All candy that has an E in its name
        } else if (isset($anE)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE name LIKE '%e%'" .
                "ORDER BY id";
        // All candy that weighs less than 10 grams
        } else if (isset($lessThanTen)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE weight < 10 " .
                "ORDER BY weight ASC";
        // All candy that weighs between 10 and 12 grams
        } else if (isset($tenAndTwelve)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE weight between 10 AND 12 " .
                "ORDER BY name ASC, weight";
        // The 3 biggest/heaviest candys
        } else if (isset($heavyThree)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "ORDER BY weight DESC LIMIT 3";
        // All info about a random piece of candy
        } else if (isset($random)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "ORDER BY RAND() LIMIT 1";
        // Search Bar
        } else if (isset($search)) {
            $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "WHERE name LIKE '%" . $search ."%'" .
                "ORDER BY id ASC";
        }
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Navn: " . $row["name"] . " - Farve: " . $row["color"] . " - Vægt: " . $row["weight"] . " - Surhed: " . $row["sourness"] . " - Smagsstyrke: " . $row["tasteStrength"] . " - Smagstype: " . $row["tasteType"] . " - Pris: " . $row["price"] . "<br>";
            }
        } else {
            echo "Database empty" . $conn->error;
        }

        $conn->close();
        ?>
    </body>
</html>
