<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skostørrelseliste</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script src="../functions/checkTheBox.js"></script>
    </head>
    <body>

        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";

        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

        <?php
        include_once 'shoeSidebar.php';
        include_once '../functions/header.php';
        ?>

        <div id="snowflakeContainer">
            <span class="snowflake"></span>
        </div>


        <div id="main">
            <div id="content">

                <!-- Delete-form with checkboxes for deleting rows -->
                <form action="shoeDelete.php" method="post">
                    <?php
                    $sql = "SELECT * FROM 1_ShoeSize ORDER BY id ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        //  Return results as an associative array and do stuff as long as there's data in it.
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <!-- Adding a checkbox before each row -->
                            <input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>">
                            <?php
                            // Echo all values
                            echo "Navn: " . $row["name"] . " - Email: " . $row["email"] . " - DateOfBirth: " . $row["dateOfBirth"] . " - ShoeSize: " . $row["shoeSize"] . "<br>";
                        }
                        ?>
                        <!-- Submit button for deleting rows -->
                        <input type="submit" id='delete' name="delete" value="Delete">
                        <?php
                    } else {
                        // If empty
                        echo "SORRY! Please contact your administrator. Just between you and me... either the database is empty or an error occured. I didn't do anything. I promise. It's not my fault.";
                    }
                    ?>
                </form>
            </div>
        </div>

        <footer>
            <div class="footerTop">
                <nav class="footerButtons">
                    <a class="footerLink" href="index.php">HJEM</a>
                    <span>|</span>
                    <a class="footerLink" href="../shoeSize/shoes.php">SKOSTØRRELSER</a>
                    <span>|</span>
                    <a class="footerLink" href="../hardCandy/hardCandy.php">BIRGER BOLCHER</a>
                </nav>
            </div>

            <div class="footerBottom">
                <span>&COPY; 2019 Rasmus Nørby</span>
            </div>
        </footer>
    </body>
</html>
