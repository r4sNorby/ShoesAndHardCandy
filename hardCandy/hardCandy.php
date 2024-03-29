<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../functions/connection.php';
?>
<html>
    <head>
        <title>Birger Bolcher</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
        <script src="../snow.js"></script>
    </head>
    <body>
        <?php
        include_once '../hardCandy/candySidebar.php';
        include_once '../functions/header.php';
        ?>

        <div id="snowflakeContainer">
            <span class="snowflake"></span>
        </div>
        
        <div id="main">
            <div id="content">
                <h1>Birger Bolcher</h1>

                <!-- Form for Insert.php -->
                <form action="candyInsert.php" method="post">
                    <label>Navn: </label>
                    <input type="text" name="name" placeholder="Bolche" required><br>
                    <label>Farve: </label>
                    <select name="color_id">
                        <?php
                        $color = "SELECT * FROM 1_color";
                        $colres = $conn->query($color);

                        if ($colres->num_rows > 0) {
                            while ($row = $colres->fetch_assoc()) {
                                ?> <option value="<?php echo $row["color_id"] ?>"><?php echo $row["color"]; ?></option><?php
                            }
                        } else {
                            echo "Database empty" . $conn->error;
                        }
                        ?>                    
                    </select><br>
                    <label>Vægt: 
                        <input type="number" name="weight" min="1" max="40" placeholder="Vægt" required>
                        gram</label><br>
                    <label>Surhed: </label>
                    <select name="sourness_id">
                        <?php
                        $sour = "SELECT * FROM 1_sourness";
                        $soures = $conn->query($sour);
                        if ($soures->num_rows > 0) {

                            while ($row = $soures->fetch_assoc()) {
                                ?> <option value="<?php echo $row["sourness_id"] ?>"><?php echo $row["sourness"]; ?></option><?php
                            }
                        } else {
                            echo "Database empty" . $conn->error;
                        }
                        ?>                    
                    </select><br>
                    <label>Styrke: </label>
                    <select name="strength_id">
                        <?php
                        $strength = "SELECT * FROM 1_tasteStrength";
                        $strres = $conn->query($strength);

                        if ($strres->num_rows > 0) {
                            while ($row = $strres->fetch_assoc()) {
                                ?> <option value="<?php echo $row["tasteStrength_id"] ?>"><?php echo $row["tasteStrength"]; ?></option><?php
                            }
                        } else {
                            echo "Database empty" . $conn->error;
                        }
                        ?>                    
                    </select><br>
                    <label>Type: </label>
                    <select name="type_id">
                        <?php
                        $type = "SELECT * FROM 1_tasteType";
                        $typres = $conn->query($type);
                        if ($typres->num_rows > 0) {
                            while ($row = $typres->fetch_assoc()) {
                                ?> <option value="<?php echo $row["tasteType_id"] ?>"><?php echo $row["tasteType"]; ?></option><?php
                            }
                        } else {
                            echo "Database empty" . $conn->error;
                        }
                        ?>                    
                    </select><br>
                    <label>Pris: 
                        <input type="number" min="1" max="100" name="price" placeholder="10" required>
                        øre(r)</label><br>

                    <input type="submit" name="submit" value="Indsæt">
                </form>
            </div>
        </div>

        <?php
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>
