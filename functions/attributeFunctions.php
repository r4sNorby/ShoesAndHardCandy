<?php

// INSERT METHOD
// Generate SQL
function preparedStatement($DBattribute, $tableName, $attribute, $conn) {
    $sql = "INSERT INTO $tableName ($DBattribute)
               VALUES (?)";

    // Prepared statement
    $stmt = $conn->prepare($sql);

    // Bind to values from form. The form posts the names of the inputs.
    // Remember to the change the values below if you change the datatype.
    // Also, check if the attribute already exists
    $stmt->bind_param("s", $attribute);
    return $stmt;
}

function checkInsert($attribute, $tableName, $DBAttribute, $conn) {
    // Check query if attribute exists in database.
    $check = "SELECT * FROM $tableName WHERE $DBAttribute = '$attribute'";

    $result = $conn->query($check);
    return $result;
}

// DELETE METHOD
// Are there any hard candy with the attributes we are deleting?
function checkDelete($del_id, $DBId, $tableName, $conn) {
    // Check query if attribute exists in database.
    $check = "SELECT * FROM 1_HardCandy 
            INNER JOIN 1_color ON 1_HardCandy.color_id = 1_color.color_id 
            INNER JOIN 1_sourness ON 1_HardCandy.sourness_id = 1_sourness.sourness_id 
            INNER JOIN 1_tasteStrength ON 1_HardCandy.tasteStrength_id = 1_tasteStrength.tasteStrength_id 
            INNER JOIN 1_tasteType ON 1_HardCandy.tasteType_id = 1_tasteType.tasteType_id 
            WHERE $tableName.$DBId = $del_id
            ORDER BY id";
    
    $result = $conn->query($check);
    return $result;
}