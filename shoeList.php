<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skostørrelseliste</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="sidebar.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    </head>
    <body>
        <script type="text/javascript">
$(document).ready(function () {
    $('#delete').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";

        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>
        <aside>
            <div id="sidebar" class="sidebar"></div>
            <div id="sidebarbuttons" class="sidebarbuttons">
                <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
                <a href="shoes.html"><i class="material-icons">input</i> Indsæt Bruger</a>
                <a href="shoeList.php"><i class="material-icons">list</i> Brugerliste</a>
                <a href="shoeGraph.php"><i class="material-icons">insert_chart</i> Brugergraf</a>
                <a href="shoePie.php"><i class="material-icons">pie_chart</i> CirkelDiagram</a>
            </div>
        </aside>
        
        <header>
            <div class="topnav">
                <!-- Sidebar button -->
                <div class="togglebtn" onclick="toggle()">
                    <a>☰ Udvid menu</a>
                </div>

                <!-- Header Buttons-->
                <div class='headerButtons'>
                    <a class="buttons" href="index.html">Hjem</a>
                    <a class="buttons" href="shoes.html">Skostørrelser</a>
                    <a class="buttons" href="hardCandy.html">Birger Bolcher</a>
                    <div class="dropbtn">
                        <div class="droptxt">
                            <a class="droptxt">☰ Projekter</a>
                        </div>
                        <div class="dropdown-content">
                            <a href="index.html">Hjem</a>
                            <a href="shoes.html">Skostørrelser</a>
                            <a href="hardCandy.html">Birger Bolcher</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div id="main">

            <!-- Delete-form with checkboxes for deleting rows -->
            <form action="shoeDelete.php" method="post">
                <?php
                $sql = "SELECT * FROM 1_ShoeSize ORDER BY id ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    //  Return results as an associative array and do stuff as long as there's data in it.
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <!-- Adding a checkbox before each row -->
                        <input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>">
                        <?php
                        // Echo all values
                        echo "Navn: " . $row["name"] . " - Email: " . $row["email"] . " - DateOfBirth: " . $row["dateOfBirth"] . " - ShoeSize: " . $row["shoeSize"] . "<br>";
                    }
                    ?>
                    <!-- Submit button for deleting rows -->
                    <input type="submit" id='delete' name="delete" value="Delete">
                    <?php
                } else {
                    // If empty
                    echo "SORRY! Please contact your administrator. Just between you and me... either the database is empty or an error occured. I didn't do anything. I promise. It's not my fault.";
                }
                ?>
            </form>
        </div>

        <footer>
            <div class="footerTop">
                <nav class="footerButtons">
                    <a class="footerLink" href="index.html">HJEM</a>
                    <span>|</span>
                    <a class="footerLink" href="shoes.html">SKOSTØRRELSER</a>
                    <span>|</span>
                    <a class="footerLink" href="hardCandy.html">BIRGER BOLCHER</a>
                </nav>
            </div>

            <div class="footerBottom">
                <span>&COPY; 2019 Rasmus Nørby</span>
            </div>
        </footer>
    </body>
</html>
