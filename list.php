<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        <form action="delete.php" method="post">
            <?php
            $sql = "SELECT * FROM ShoeSize ORDER BY id ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>">
                    <?php
                    echo "id: " . $row["id"] . "Navn: " . $row["name"] . " - Email: " . $row["email"] . " - Age: " . $row["age"] . " - ShoeSize: " . $row["shoeSize"] . "<br>";
                }
                ?>
                <input type="submit" value="Delete">
                <?php
            } else {
                echo "0 results";
            }
            ?>
        </form>

        <a href="index.html">Home</a>
        <a href="list.php">List</a>
        <a href="graph.php">Graph</a>
        <a href="insert.php">Insert</a>
        <a href="redirect.html">Redirect</a>
    </body>
</html>
