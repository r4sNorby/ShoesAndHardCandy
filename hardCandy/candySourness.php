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
                <h1>Indsæt Surhed</h1>

                <!--Sourness-->
                <form action="attributeInsert.php" method="post">
                    <label>Surhed: </label>
                    <input type="text" name="sourness" required><br>
                    <input type="submit" name="submit" value="Indsæt">
                </form>
                <br>

                <div class="list">
                    <form action="attributeDelete.php" method="post">
                        <?php
                        $sql = "SELECT * FROM 1_sourness";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <!-- Adding a checkbox before each row -->
                                <p class='listItems'>
                                    <input type="checkbox" name="sournessId[]" value="<?php echo $row["sourness_id"]; ?>">
                                    <?php
                                    echo $row["sourness_id"] . " - " . $row["sourness"] . "</p>";
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
        </div>

        <?php
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>
