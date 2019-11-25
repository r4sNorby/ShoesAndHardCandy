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

function checkQuery($attribute, $conn) {
    // Check query if attribute exists in database.
    $check = "SELECT * FROM 1_color WHERE color = '$attribute'";

    $result = $conn->query($check);
    return $result;
}


// DELETE METHOD
