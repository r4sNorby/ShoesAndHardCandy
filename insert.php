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

        $stmt = $conn->prepare("INSERT INTO ShoeSize (name, email, age, shoeSize)
               VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $_POST['name'], $_POST['email'], $_POST['age'], $_POST['shoeSize']);

        if ($stmt->execute()) {
            // !!Redirect to list.php after submitting form!!
            header('location: redirect.html');
        } else {
            echo "The SQL: '" . $sql . "' was faulty!<br>" . $conn->error;
        }

        $stmt->close();
        $conn->close();
        ?>
        <br>

        <p>Return to the front page</p>
        <a href="index.html">Home</a>
    </body>
</html>
