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
        <title></title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "xran39.skp-dp";
        $password = "k452ppy3";
        $db_name = "xran39_skp_dp_sde_dk";

        $conn = new mysqli($servername, $username, $password, $db_name);
        // Charset doesn't always transfer properly from database to php
        $conn->set_charset("utf8");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>
        <form action="candyInsert.php" method="post">
            <label>Farve: </label>
            <select  name="color" placeholder="Farve" required>
                <?php
                  $sql = "SELECT * FROM 1_color ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  ?> <option><?php echo $row["color"]; ?></option><?php
                  }
                  } else {
                  echo "Database empty" . $conn->error;
                  } 
                ?>
                <option>Lilla</option>
            </select>
        </form>
        <?php
        $sq = "SELECT * FROM 1_color ";
        $resul = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["color"];
            }
        } else {
            echo "Database empty" . $conn->error;
        }

        $conn->close();
        ?>

    </body>
</html>
