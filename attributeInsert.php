<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'connection.php';
include 'attributeMethods.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Indsætter ny attribut</title>
    </head>
    <body>
        <?php
        $color = filter_input(INPUT_POST, 'color');
        $sourness = filter_input(INPUT_POST, 'sourness');
        $tasteStrength = filter_input(INPUT_POST, 'strength');
        $tasteType = filter_input(INPUT_POST, 'type');

        if (isset($color)) {
            $attribute = $color;
            $DBattribute = "color";
            $tableName = "1_color";
        } else if (isset($sourness)) {
            $attribute = $sourness;
            $DBattribute = "sourness";
            $tableName = "1_sourness";
        } else if (isset($tasteStrength)) {
            $attribute = $tasteStrength;
            $DBattribute = "tasteStrength";
            $tableName = "1_tasteStrength";
        } else if (isset($tasteType)) {
            $attribute = $tasteType;
            $DBattribute = "tasteType";
            $tableName = "1_tasteType";
        }
        $stmt = preparedStatement($DBattribute, $tableName, $attribute, $conn);

        $result = checkQuery($attribute, $conn);
        // Print the result
        //print_r($result);

        if ($result->num_rows < 1) {
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