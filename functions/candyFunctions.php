<?php

// INSERT METHOD
// Generate Prepared Statement
function preparedCandyInsert($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price, $conn) {
    $sql = "INSERT INTO 1_HardCandy (name, color_id, weight, sourness_id, tasteStrength_id, tasteType_id, price)
               VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepared statement
    $stmt = $conn->prepare($sql);

    // Bind to values from form. The form posts the names of the inputs.
    // Remember to the change the values below if you change the datatype.
    $stmt->bind_param("siiiiii", $name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price);

    return $stmt;
}

function checkCandyInsert($name, $color_id, $weight, $sourness_id, $tasteStrength_id, $tasteType_id, $price, $conn) {
    // Check query if attribute exists in database.
    $check = "SELECT * FROM 1_HardCandy WHERE name = '$name' AND color_id = '$color_id' AND weight = '$weight' AND sourness_id = '$sourness_id' AND tasteStrength_id = '$tasteStrength_id' AND tasteType_id = '$tasteType_id' AND price = '$price'";
    $result = $conn->query($check);

    return $result;
}

// DELETE METHOD

function preparedCandyDelete($conn, $del_id) {

    $sql = "DELETE FROM 1_HardCandy WHERE id = ?";

    // Prepared statement
    $stmt = $conn->prepare($sql);

    // Bind to values from form
    $stmt->bind_param("i", $del_id);
    return $stmt;
}
