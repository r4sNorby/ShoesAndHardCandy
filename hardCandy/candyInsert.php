<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../functions/connection.php';
include_once '../function/candyFunctions.php'
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
        <?php
        include_once '../hardCandy/candySidebar.php';
        include_once '../functions/header.php';
        ?>
        <div id="main">
            <?php
            $name = filter_input(INPUT_POST, "name");
            $color_id = filter_input(INPUT_POST, "color_id");
            $weight = filter_input(INPUT_POST, "weight");
            $sourness_id = filter_input(INPUT_POST, "sourness_id");
            $tasteStrength_id = filter_input(INPUT_POST, "strength_id");
            $tasteType_id = filter_input(INPUT_POST, "type_id");
            $price = filter_input(INPUT_POST, "price");

            if (isset($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price)) {

                //echo "Name: " .$name. " - Color: " . $color_id . " - Weight: " . $weight . " - Sourness: " . $sourness_id . " - Strength: " . $tasteStrength_id . " - Type: " . $tasteType_id . " - Price: " . $price . "<br>";

                $stmt = preparedStatement($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price, $conn);
                echo "hej";
                
                $result = checkInsert($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price, $conn);
                // Print the result
                //print_r($result);

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
        <?php
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>