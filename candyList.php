
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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

        $sql = "SELECT * FROM 1_HardCandy ".
                "INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id " .
                "INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id " .
                "INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id " .
                "INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id " .
                "ORDER BY id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Navn: " . $row["name"] . " - Farve: " . $row["color"] . " - Vægt: " . $row["weight"] . " - Surhed: " . $row["sourness"] . " - smags-styrke: " . $row["tasteStrength"] . " - smags-type: " . $row["tasteType"] . " - Price: " . $row["price"] . "<br>";
            }
        } else {
            echo "Database empty" . $conn->error;
        }

        $conn->close();
        ?>
    </body>
</html>
