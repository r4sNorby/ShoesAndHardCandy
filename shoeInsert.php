<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Indsætter ny bruger</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";
        
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $dateOfBirth = filter_input(INPUT_POST, 'dateOfBirth');
        $shoeSize = filter_input(INPUT_POST, 'shoeSize');


        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // 1_ShoeSize fordi det er efter første hovedforløb
        $sql = "INSERT INTO 1_ShoeSize (name, email, dateOfBirth, shoeSize)
               VALUES (?, ?, ?, ?)";

        // Prepared statement
        $stmt = $conn->prepare($sql);
        // Bind to values from form. The form posts the names of the inputs.
        // Remember to the change the values below if you change the datatype.
        $stmt->bind_param("sssi", $name, $email, $dateOfBirth, $shoeSize);

        $check = "SELECT * FROM 1_ShoeSize WHERE name = '$name' AND email = '$email' AND shoeSize = '$shoeSize'";
        $result = $conn->query($check);
        // Print the result
        //print_r($result);
        
        if ($result->num_rows < 1) {
            // Execute statement and check if it was successful
            if ($stmt->execute()) {
                // !!Redirect to list.php after submitting form!!
                header('location: shoeInsert_redirect.html');
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
        <a href="shoes.html">Home</a>
    </body>
</html>
