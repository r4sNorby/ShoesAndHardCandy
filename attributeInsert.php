<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Indsætter ny attribut</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";

        $color = filter_input(INPUT_POST, 'color');
        $sourness = filter_input(INPUT_POST, 'sourness');
        $tasteStrength = filter_input(INPUT_POST, 'tasteStrength');
        $tasteType = filter_input(INPUT_POST, 'tasteType');

        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Charset doesn't always transfer properly to or from database
        $conn->set_charset("utf8");

        if (isset($color)) {
            $sql = "INSERT INTO 1_color (color)
               VALUES (?)";
        } else if (isset($sourness)) {
            $sql = "INSERT INTO 1_sourness (sourness)
               VALUES (?)";
        } else if (isset($tasteStrength)) {
            $sql = "INSERT INTO 1_tasteStrength (tasteStrength)
               VALUES (?)";
        } else if (isset($tasteType)) {
            $sql = "INSERT INTO 1_tasteType (tasteType)
               VALUES (?)";
        }

        // Prepared statement
        $stmt = $conn->prepare($sql);

        // Bind to values from form. The form posts the names of the inputs.
        // Remember to the change the values below if you change the datatype.
        if (isset($color)) {
            $stmt->bind_param("s", $color);
        } else if (isset($sourness)) {
            $stmt->bind_param("s", $sourness);
        } else if (isset($tasteStrength)) {
            $stmt->bind_param("s", $tasteStrength);
        } else if (isset($tasteType)) {
            $stmt->bind_param("s", $tasteType);
        }

        if (isset($color)) {
            $check = "SELECT * FROM 1_color WHERE color = '$color'";
        } else if (isset($sourness)) {
            $check = "SELECT * FROM 1_sourness WHERE sourness = '$sourness'";
        } else if (isset($tasteStrength)) {
            $check = "SELECT * FROM 1_tasteStrength WHERE tasteStrength = '$tasteStrength'";
        } else if (isset($tasteType)) {
            $check = "SELECT * FROM 1_tasteType WHERE tasteType = '$tasteType'";
        }

        $result = $conn->query($check);
        // Print the result
        //print_r($result);

        if ($result->num_rows < 1) {
            echo "No rows f";
            // Execute statement and check if it was successful
            if ($stmt->execute()) {
                // !!Redirect after submitting form!!
                if (isset($color)) {
                    header('location: candyColor.php');
                } else if (isset($sourness)) {
                    header('location: candySourness.php');
                } else if (isset($tasteStrength)) {
                    header('location: candyStrength.php');
                } else if (isset($tasteType)) {
                    header('location: candyType.php');
                }
            } else {
                // Or display error
                echo "The SQL: '" . $sql . "' was faulty!<br>" . $stmt->error;
            }
        } else {
            echo "Attribute already exists!";
        }

        $stmt->close();
        $conn->close();
        ?>
        <br>

        <p>Return to the front page</p>
        <a href="hardCandy.php">Home</a>
    </body>
</html>