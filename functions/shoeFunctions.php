<?php

// INSERT METHOD
// Generate Prepared Statement
function preparedShoeInsert($name, $email, $dateOfBirth, $shoeSize, $conn) {

    // 1_ShoeSize fordi det er efter første hovedforløb
    $sql = "INSERT INTO 1_ShoeSize (name, email, dateOfBirth, shoeSize)
               VALUES (?, ?, ?, ?)";

    // Prepared statement
    $stmt = $conn->prepare($sql);
    // Bind to values from form. The form posts the names of the inputs.
    // Remember to the change the values below if you change the datatype.
    $stmt->bind_param("sssi", $name, $email, $dateOfBirth, $shoeSize);

    return $stmt;
}

function checkShoeInsert($name, $email, $shoeSize, $conn) {
    // Check query if attribute exists in database.
    $check = "SELECT * FROM 1_ShoeSize WHERE name = '$name' AND email = '$email' AND shoeSize = '$shoeSize'";
    $result = $conn->query($check);

    return $result;
}

// DELETE METHOD

function preparedShoeDelete($conn, $del_id) {


    $sql = "DELETE FROM 1_ShoeSize WHERE id = ?";

    // Prepared statement
    $stmt = $conn->prepare($sql);

    // Bind to values from form
    $stmt->bind_param("i", $del_id);
    return $stmt;
}
