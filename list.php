<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Skostørrelseliste</title>
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
        <!-- Delete-form with checkboxes for deleting rows -->
        <form action="delete.php" method="post">
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
                    echo "id: " . $row["id"] . " - Navn: " . $row["name"] . " - Email: " . $row["email"] . " - DateOfBirth: " . $row["dateOfBirth"] . " - ShoeSize: " . $row["shoeSize"] . "<br>";
                }
                ?>
                <!-- Submit button for deleting rows -->
                <input type="submit" name="delete" value="Delete">
                <?php
            } else {
                // If empty
                echo "SORRY! Please contact your administrator. Just between you and me... either the database is empty or an error occured. I didn't do anything. I promise. It's not my fault.";
            }
            ?>
        </form>

        <a href="shoes.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>
    </body>
</html>
