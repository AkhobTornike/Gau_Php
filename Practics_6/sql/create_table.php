<?php
include("../db_connection.php");

if ($conn) {
    $sqlDirectory = __DIR__ . "/create_table/";
    $sqlFiles = glob($sqlDirectory . "*.sql");

    foreach ($sqlFiles as $sqlFile) {
        $tableName = pathinfo($sqlFile, PATHINFO_FILENAME);
        $createQuery = file_get_contents($sqlFile);
        echo "<script> alert('Executing SQL from $tableName.sql');</script>";

        if ($conn -> multi_query($createQuery)) {
            echo "<script> alert('Executed SQL from $tableName.sql successfully.');</script>";
            // Clean result for next query
            
            while ($conn -> more_results() && $conn -> next_result()) {
                if ($result = $conn -> store_result()) {
                    $result -> free();
                }
            }
        } else {
            echo "<script> alert('Error executing SQL from $tableName.sql: " . $conn -> error . "');</script>";
        }
    }

    echo "<script> alert('All SQL files executed successfully.');</script>";
    $conn->close();
} else {
    echo "<script> alert('Database connection failed.');</script>";
}

?>