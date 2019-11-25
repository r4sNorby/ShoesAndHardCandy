<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'connection.php';
include 'attributeMethods.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sletter bolche</title>
    </head>
    <body>
        <?php
        // Get the id from the form
        //WHY DOES FILTER_INPUT NOT WORK!!!???
        $id = $_POST['id'];

        //Print array values
        /* foreach($id as $id){
          echo $id[0];
          } */
        // Was the delete button pressed while a checkbox was checked?
        if (isset($id)) {

            // For each id that was checked, delete that row
            for ($i = 0; $i < count($id); $i++) {
                $del_id = $id[$i];

                // Prepared statement
                $stmt = $conn->prepare("DELETE FROM 1_HardCandy WHERE id = ?");

                // Bind to values from form
                $stmt->bind_param(i, $del_id);

                if ($stmt->execute()) {
                    header('location: candyDelete_redirect.html');
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
    </body>
</html>
