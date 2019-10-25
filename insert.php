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
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $shoeSize = $_POST['shoeSize'];


        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO ShoeSize (name, email, dateOfBirth, shoeSize)
               VALUES (?, ?, ?, ?)";

        // Prepared statement
        $stmt = $conn->prepare($sql);
        // Bind to values from form. The form posts the names of the inputs.
        // Remember to the change the values below if you change the datatype.
        $stmt->bind_param("sssi", $name, $email, $dateOfBirth, $shoeSize);

        $check = "SELECT * FROM ShoeSize WHERE name = '$name' AND email = '$email' AND shoeSize = '$shoeSize'";
        $result = $conn->query($check);
        // Print the result
        //print_r($result);
        
        if ($result->num_rows < 1) {
            echo "Success";
            // Execute statement and check if it was successful
            if ($stmt->execute()) {
                // !!Redirect to list.php after submitting form!!
                header('location: insert_redirect.html');
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
        <a href="index.html">Home</a>
    </body>
</html>
