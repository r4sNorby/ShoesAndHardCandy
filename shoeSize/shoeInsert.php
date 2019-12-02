<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../functions/connection.php';
include_once '../functions/shoeFunctions.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
        <title>Indsætter ny bruger</title>
    </head>
    <body>
        <?php
        include_once '../shoeSize/shoeSidebar.php';
        include_once '../functions/header.php';
        ?>
        <div id="main">
            <?php
            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $dateOfBirth = filter_input(INPUT_POST, 'dateOfBirth');
            $shoeSize = filter_input(INPUT_POST, 'shoeSize');

            $stmt = preparedShoeInsert($name, $email, $dateOfBirth, $shoeSize, $conn);
            $result = checkShoeInsert($name, $email, $shoeSize, $conn);

            // Print the result
            //print_r($result);

            if ($result->num_rows < 1) {
                // Execute statement and check if it was successful
                if ($stmt->execute()) {
                    // !!Redirect to list.php after submitting form!!
                    header('refresh:0; url=shoeGraph.php');
                    echo "You should be redirecting in 1 second. If not, please click <a href='shoeGraph.php'>redirect</a>";
                } else {
                    // Or display error
                    echo $stmt->error;
                }
            } else {
                echo "User already exists!";
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
