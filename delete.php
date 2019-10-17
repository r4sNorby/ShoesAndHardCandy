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
        $id = $_POST['id'];
        
        
        //Print array values
        foreach($id as $id){
            echo $id[0];
        }
        
        // Was the delete button pressed?
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            
            // For each id that was checked, delete that row
            for ($i = 0; $i < count($id); $i++) {
                $del_id = $id[$i];
                $sql = "DELETE FROM ShoeSize WHERE id = $del_id";
                
                echo $sql;
                
                if ($conn->query($sql) == TRUE) {
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
        } else {
            echo "No checkboxes were checked!";
        }
        $conn->close();
        ?>
        <br>

        <p>Return to the list</p>
        <a href="list.php">List</a>
    </body>
</html>
