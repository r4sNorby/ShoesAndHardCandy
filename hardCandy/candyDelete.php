<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../functions/connection.php';
include_once '../functions/candyFunctions.php';
?>
<html>
    <head>
        <title>Sletter bolche</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
    </head>
    <body>
        <?php
        include_once '../hardCandy/candySidebar.php';
        include_once '../functions/header.php';
        ?>
        <div id="main">
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

                    $stmt = preparedDelete($conn, $del_id);

                    if ($stmt->execute()) {
                        header('refresh:0; url=candyList.php');
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                    // Always echo this
                    echo "You should be redirecting in 1 second. If not, please click <a href='candyList.php'>redirect</a>";
                }
            } else {
                echo "No checkboxes were checked!";
            }
            ?>
        </div>
        <?php
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>
