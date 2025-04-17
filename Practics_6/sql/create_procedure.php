<?php
include("../db_connection.php");

if ($conn) {
    $sqlFile = __DIR__ . "/create_procedures.sql";

    if (file_exists($sqlFile)) {
        $procedureQuery = file_get_contents($sqlFile);
        echo "<script> alert('Executing SQL from create_procedure.sql');</script>";

        if ($conn->multi_query($procedureQuery)) {
            echo "<script> alert('Executed SQL from create_procedure.sql successfully.');</script>";
            // Clean result for next query
            while ($conn->more_results() && $conn->next_result()) {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            }
        } else {
            echo "<script> alert('Error executing SQL from create_procedure.sql: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script> alert('Error: SQL file not found: create_procedure.sql');</script>";
    }

    $conn->close();
} else {
    echo "<script> alert('Database connection failed.');</script>";
}
?>