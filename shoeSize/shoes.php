<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Skostørrelse</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
        <script src="../snow.js"></script>
    </head>
    <body>
        <?php
        include_once 'shoeSidebar.php';
        include_once '../functions/header.php';
        ?>
        
        <div id="snowflakeContainer">
            <span class="snowflake"></span>
        </div>

        <div id="main">
            <div id="content">
                <h1>Sk<a href="googCharts.php" id="o">o</a>størrelse</h1>

                <!-- Form for Insert.php -->
                <form action="shoeInsert.php" method="post">
                    <label>Navn: </label>
                    <input type="text" name="name" placeholder="Navn" required><br>
                    <label>Email: </label>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <label>Fødselsdag: </label>
                    <input type="date" name="dateOfBirth" required><br>
                    <label>Skostørrelse: </label>
                    <input type="number" min="1" max="55" name="shoeSize" placeholder="40" required><br>
                    <input type="submit" name="submit" value="Indsæt">
                </form>
            </div>
        </div>

        <?php
        include_once '../functions/footer.php';
        $stmt->close();
        $conn->close();
        ?>
    </body>
</html>
