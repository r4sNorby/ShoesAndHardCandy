<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
include '../functions/connection.php';
?>

<html>
    <head>
        <title>Birger Bolcher</title>
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
            <h1>Indsæt Smagstype</h1>

            <!--Type-->
            <form action="attributeInsert.php" method="post">
                <label>Smagstype: </label>
                <input type="text" name="type" required><br>
                <input type="submit" name="submit" value="Indsæt">
            </form>
            <br>

            <div class="list">
                <form action="attributeDelete.php" method="post">
                    <?php
                    $sql = "SELECT * FROM 1_tasteType";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <!-- Adding a checkbox before each row -->
                            <p class='listItems'>
                                <input type="checkbox" name="typeId[]" value="<?php echo $row["tasteType_id"]; ?>">
                                <?php
                                echo $row["tasteType_id"] . " - " . $row["tasteType"] . "</p>";
                            }
                            ?>
                            <!-- Submit button for deleting rows -->
                            <input type="submit" id='delete' name="delete" value="Delete">
                            <?php
                        } else {
                            echo "Database empty" . $conn->error;
                        }

                        $conn->close();
                        ?>
                </form>
            </div>
        </div>

        <?php
        include '../functions/footer.php';
        ?>
    </body>
</html>