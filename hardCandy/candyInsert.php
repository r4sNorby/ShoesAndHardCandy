<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../functions/connection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Indsætter nyt bolche</title>
    </head>
    <body>
        <?php
        $name = filter_input(INPUT_POST, "name");
        $color_id = filter_input(INPUT_POST, "color_id");
        $weight = filter_input(INPUT_POST, "weight");
        $sourness_id = filter_input(INPUT_POST, "sourness_id");
        $tasteStrength_id = filter_input(INPUT_POST, "strength_id");
        $tasteType_id = filter_input(INPUT_POST, "type_id");
        $price = filter_input(INPUT_POST, "price");

        //echo "Name: " .$name. " - Color: " . $color_id . " - Weight: " . $weight . " - Sourness: " . $sourness_id . " - Strength: " . $tasteStrength_id . " - Type: " . $tasteType_id . " - Price: " . $price . "<br>";

        $sql = "INSERT INTO 1_HardCandy (name, color_id, weight, sourness_id, tasteStrength_id, tasteType_id, price)
               VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepared statement
        $stmt = $conn->prepare($sql);

        // Bind to values from form. The form posts the names of the inputs.
        // Remember to the change the values below if you change the datatype.
        $stmt->bind_param("siiiiii", $name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price);

        $check = "SELECT * FROM 1_HardCandy WHERE name = '$name' AND color_id = '$color_id' AND weight = '$weight' AND sourness_id = '$sourness_id' AND tasteStrength_id = '$tasteStrength_id' AND tasteType_id = '$tasteType_id' AND price = '$price'";
        $result = $conn->query($check);
        // Print the result
        //print_r($result);

        if ($result->num_rows < 1) {
            // Execute statement and check if it was successful
            if ($stmt->execute()) {
                // !!Redirect to candyList.php after submitting form!!
                header('refresh:0; url=candyList.php');
            } else {
                // Or display error
                echo "The SQL: '" . $sql . "' was faulty!<br>" . $stmt->error;
            }
            // Always echo this
            echo "You should be redirecting in 1 second. If not, please click <a href='candyList.php'>redirect</a>";
        } else {
            echo "Candy already exists!";
        }

        $stmt->close();
        $conn->close();
        ?>
        <br>
    </body>
</html>