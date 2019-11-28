<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../functions/connection.php';
include_once '../functions/attributeFunctions.php';
?>
<html>
    <head>
        <title>Indsætter ny attribut</title>
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
            $color = filter_input(INPUT_POST, 'color');
            $sourness = filter_input(INPUT_POST, 'sourness');
            $tasteStrength = filter_input(INPUT_POST, 'strength');
            $tasteType = filter_input(INPUT_POST, 'type');

            if (isset($color)) {
                $attribute = $color;
                $DBattribute = "color";
                $tableName = "1_color";
                $redirect = "candyColor";
            } else if (isset($sourness)) {
                $attribute = $sourness;
                $DBattribute = "sourness";
                $tableName = "1_sourness";
                $redirect = "candySourness";
            } else if (isset($tasteStrength)) {
                $attribute = $tasteStrength;
                $DBattribute = "tasteStrength";
                $tableName = "1_tasteStrength";
                $redirect = "candyStrength";
            } else if (isset($tasteType)) {
                $attribute = $tasteType;
                $DBattribute = "tasteType";
                $tableName = "1_tasteType";
                $redirect = "candyType";
            }

            if (isset($attribute, $DBattribute, $tableName, $redirect)) {

                $stmt = preparedStatement($DBattribute, $tableName, $attribute, $conn);
                $result = checkInsert($attribute, $tableName, $DBattribute, $conn);
                // Print the result
                //print_r($result);

                if ($result->num_rows < 1) {
                    // Execute statement and check if it was successful
                    if ($stmt->execute()) {
                        // !!Redirect after submitting form!!
                        if (isset($color)) {
                            header('refresh:0; url=candyColor.php');
                        } else if (isset($sourness)) {
                            header('refresh:0; url=candySourness.php');
                        } else if (isset($tasteStrength)) {
                            header('refresh:0; url=candyStrength.php');
                        } else if (isset($tasteType)) {
                            header('refresh:0; url=candyType.php');
                            echo "You should be redirecting in 1 second. If not, please click <a href='$redirect.php'>redirect</a>";
                        }
                    } else {
                        // Or display error
                        echo "The SQL: '" . $sql . "' was faulty!<br>" . $stmt->error;
                    }
                } else {
                    echo "Attribute already exists!";
                }
            } else {
                echo "No values where chosen!";
            }
            ?>

        </div>
        <?php
        echo "Hej";
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>