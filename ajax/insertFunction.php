<?php

function insertData($con,$tableName, $data) {
    global $con;

    $fields = [];
    $values = [];

    foreach ($data as $field => $value) {
        $fields[] = "`$field`";
        $values[] = "'" . mysqli_real_escape_string($con, $value) . "'";
    }

    $fieldsStr = implode(', ', $fields);
    $valuesStr = implode(', ', $values);

    $query = "INSERT INTO $tableName ($fieldsStr) VALUES ($valuesStr)";
    $run = mysqli_query($con, $query);

    if ($run) {
        return true;
    } else {
        return false;
    }
}

?>
