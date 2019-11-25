<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'connection.php';
?>

<html>
    <head>
        <title>Birger Bolcher</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="sidebar.js"></script>
    </head>
    <body>
        <?php
        include 'candySidebar.php';
        include 'header.php';
        ?>

        <div id="main">
            <h1>Indsæt Farve</h1>

            <!--Color-->
            <form action="attributeInsert.php" method="post">
                <label>Farve: </label>
                <input type="text" name="color" required><br>                
                <input type="submit" name="submit" value="Indsæt">
            </form>
            <br>

            <div class="list">
                <form action="attributeDelete.php" method="post">
                    <?php
                    $sql = "SELECT * FROM 1_color";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<p class='listItems'>" . $row["color_id"] . " - " . $row["color"] . "</p>";
                        }
                    } else {
                        echo "Database empty" . $conn->error;
                    }

                    $conn->close();
                    ?>
                </form>
            </div>
        </div>

        <?php include 'footer.php' ?>
    </body>
</html>
