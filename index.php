<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Forside</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../functions/sidebar.js"></script>
    </head>
    <body>
        <header>
            <div class="topnav">
                <!-- Sidebar button -->
                <div class="noButton">HJEM</div>

                <!-- Header Buttons-->
                <div class='headerButtons'>
                    <a class="buttons" href="index.html">Hjem</a>
                    <a class="buttons" href="../shoeSize/shoes.php">Skostørrelser</a>
                    <a class="buttons" href="hardCandy.php">Birger Bolcher</a>
                    <div class="dropbtn">
                        <div class="droptxt">
                            <a class="droptxt"><i class="material-icons">arrow_drop_down</i> Projekter</a>
                        </div>
                        <div class="dropdown-content">
                            <a href="index.html">Hjem</a>
                            <a href="../shoeSize/shoes.php">Skostørrelser</a>
                            <a href="hardCandy.php">Birger Bolcher</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="main">
            <div class="flex-container">
                <div class="link">
                    <a href="../shoeSize/shoes.php">Skostørrelse</a>
                </div>
                <div class="link">
                    <a href="hardCandy.php">Birger Bolcher</a>
                </div>
            </div>
        </div>

        <?php include '../functions/footer.php';?>
    </body>
</html>
