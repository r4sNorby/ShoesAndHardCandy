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

        //Print array values
        //foreach($id as $id){
        //    echo $id[0];
        //}
        // Was the delete button pressed while a checkbox was checked?
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            // For each id that was checked, delete that row
            for ($i = 0; $i < count($id); $i++) {
                $del_id = $id[$i];

                // Prepared statement
                $stmt = $conn->prepare("DELETE FROM ShoeSize WHERE id = ?");

                // Bind to values from form
                $stmt->bind_param(i, $del_id);

                if ($stmt->execute()) {
                    header('location: delete_redirect.html');
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
        } else {
            echo "No checkboxes were checked!";
        }
        $stmt->close();
        $conn->close();
        ?>
        <br>

        <p>Return to the list</p>
        <a href="list.php">List</a>
    </body>
</html>
