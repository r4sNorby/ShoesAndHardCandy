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
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="sidebar.js"></script>
    </head>
    <body>
        <?php include 'shoeSidebar.php' ?>
        
        <?php include 'header.php'; ?>

        <div id="main">
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
            <br>
            <p>Test of the <a href="shoeInsert_redirect.html">redirect</a> function</p>
        </div>

        <?php include 'footer.php'?>
    </body>
</html>
