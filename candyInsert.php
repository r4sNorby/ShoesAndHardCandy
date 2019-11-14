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
        <title>Indsætter nyt bolche</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";
        
        $name = filter_input(INPUT_POST, 'name');
        $color_id = filter_input(INPUT_POST, 'color_id');
        $weight = filter_input(INPUT_POST, 'weight');
        $sourness_id = filter_input(INPUT_POST, 'sourness_id');
        $tasteStrength_id = filter_input(INPUT_POST, 'tasteStrength_id');
        $tasteType_id = filter_input(INPUT_POST, 'tasteType_id');
        $price = filter_input(INPUT_POST, 'price');

        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO 1_ShoeSize (name, color_id, weight, sourness_id, tasteStrength_id, tasteType_id, price)
               VALUES (?, ?, ?, ?)";

        // Prepared statement
        $stmt = $conn->prepare($sql);
        // Bind to values from form. The form posts the names of the inputs.
        // Remember to the change the values below if you change the datatype.
        $stmt->bind_param("snnnnnn", $name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price);

        $check = "SELECT * FROM 1_HardCandy WHERE name = '$name' AND color_id = '$color_id' AND weight = '$weight' AND sourness_id = '$sourness_id' AND tasteStrength_id = '$tasteStrength_id' AND tasteType_id = '$tasteType_id' AND price = '$price'";
        $result = $conn->query($check);
        // Print the result
        //print_r($result);
        
        if ($result->num_rows < 1) {
            // Execute statement and check if it was successful
            if ($stmt->execute()) {
                // !!Redirect to list.php after submitting form!!
                header('location: candyInsert_redirect.html');
            } else {
                // Or display error
                echo "The SQL: '" . $sql . "' was faulty!<br>" . $conn->error;
            }
        } else {
            echo "User already exists!";
        }

        $stmt->close();
        $conn->close();
        ?>
        <br>

        <p>Return to the front page</p>
        <a href="hardCandy.php">Home</a>
    </body>
</html>