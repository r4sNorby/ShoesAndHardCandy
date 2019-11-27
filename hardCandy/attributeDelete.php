<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../functions/connection.php';
include 'attributeMethods.php';
?>
<html>
    <head>
        <title>Sletter bolche</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
    </head>
    <body>
        <?php
        include '../hardCandy/candySidebar.php';
        include '../functions/header.php';
        ?>
        <div id="main">
            <?php
            // Get the id from the form
            //WHY DOES FILTER_INPUT NOT WORK!!!???        
            $colorId = $_POST['colorId'];
            $sournessId = $_POST['sournessId'];
            $strengthId = $_POST['strengthId'];
            $typeId = $_POST['typeId'];

            // Depending on which id is set/which page the boxes were checked on, set $id to that id
            if (isset($colorId)) {
                $id = $colorId;
                $DBId = "color_id";
                $tableName = "1_color";
                $redirect = "candyColor";
            } else if (isset($sournessId)) {
                $id = $sournessId;
                $DBId = "sourness_id";
                $tableName = "1_sourness";
                $redirect = "candySourness";
            } else if (isset($strengthId)) {
                $id = $strengthId;
                $DBId = "tasteStrength_id";
                $tableName = "1_tasteStrength";
                $redirect = "candyStrength";
            } else if (isset($typeId)) {
                $id = $typeId;
                $DBId = "tasteType_id";
                $tableName = "1_tasteType";
                $redirect = "candyType";
            } else {
                echo "No checkboxes were checked!";
            }


            // For each id that was checked, delete that row
            for ($i = 0; $i < count($id); $i++) {
                $del_id = $id[$i];

                $sql = "DELETE FROM $tableName WHERE $DBId = ?";

                // Prepared statement
                $stmt = $conn->prepare($sql);

                // Bind to values from form
                $stmt->bind_param("i", $del_id);

                // Don't delete any attributes we are using
                $result = checkDelete($del_id, $DBId, $tableName, $conn);

                if ($result->num_rows < 1) {
                    if ($stmt->execute()) {
                        // !!Redirect after submitting form!!
                        if (isset($colorId)) {
                            header('refresh:0; url=candyColor.php');
                        } else if (isset($sournessId)) {
                            header('refresh:0; url=candySourness.php');
                        } else if (isset($strengthId)) {
                            header('refresh:0; url=candyStrength.php');
                        } else if (isset($typeId)) {
                            header('refresh:0; url=candyType.php');
                        } else {
                            echo "Success! ...but no redirect.";
                        }
                    } else {
                        echo "Error deleting record: " . $stmt->error;
                    }
                    // Always echo this
                    echo "You should be redirecting in 1 second. If not, please click <a href='$redirect.php'>redirect</a>";
                } else {
                    echo "<p>Attribute is in use on $result->num_rows piece(s) of candy!</p>";
                    echo "<p>Please <a href='$redirect.php'>return</a> to the previous page.</p><br>";

                    echo "<h2>Candy with this attribute: </h2>";
                    ?><div class="list"><?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<p class='listItems'>Navn: " . $row["name"] . " - Farve: " . $row["color"] . " - Vægt: " . $row["weight"] . " - Surhed: " . $row["sourness"] . " - Smagsstyrke: " . $row["tasteStrength"] . " - Smagstype: " . $row["tasteType"] . " - Pris: " . $row["price"] . "</p>";
                            }
                        }
                    }
                }

                $stmt->close();
                $conn->close();
                ?>
            </div>
        </div>
        <?php include '../functions/footer.php'; ?>
    </body>
</html>
