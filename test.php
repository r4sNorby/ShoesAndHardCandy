<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'functions/connection.php';
include_once 'function/candyFunctions.php'
?>

<html>
    <head>
        <title>Indsætter nyt bolche</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
    </head>
    <body>
        <div id="main">
            <?php
            $name = "fisk";
            $color_id = 1;
            $weight = 1;
            $sourness_id = 1;
            $tasteStrength_id = 1;
            $tasteType_id = 1;
            $price = 1;

            if (isset($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price)) {

                //echo "Name: " .$name. " - Color: " . $color_id . " - Weight: " . $weight . " - Sourness: " . $sourness_id . " - Strength: " . $tasteStrength_id . " - Type: " . $tasteType_id . " - Price: " . $price . "<br>";

                $sql = "INSERT INTO 1_HardCandy (name, color_id, weight, sourness_id, tasteStrength_id, tasteType_id, price)
               VALUES (?, ?, ?, ?, ?, ?, ?)";

                // Prepared statement
                $stmt = $conn->prepare($sql);
                // Bind to values from form. The form posts the names of the inputs.
                // Remember to the change the values below if you change the datatype.
                $stmt->bind_param("siiiiii", $name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price);
                
                print_r($stmt);
                
                $result = checkInsert($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price, $conn);
                // Print the result
                print_r($result);
                
                echo "This too";
                
                if ($result->num_rows < 1) {
                    // Execute statement and check if it was successful
                    if ($stmt->execute()) {
                        // !!Redirect to candyList.php after submitting form!!
                        header('refresh:0; url=candyList.php');
                        echo "<p>You should be redirecting in 1 second. If not, please click <a href='candyList.php'>redirect</a></p>";
                    } else {
                        // Or display error
                        echo "The SQL: '" . $sql . "' was faulty!<br>" . $stmt->error . "<br>";
                    }
                } else {
                    echo "Candy already exists!";
                }
            } else {
                echo "No values where chosen!";
            }
            ?>
        </div>
    </body>
</html>