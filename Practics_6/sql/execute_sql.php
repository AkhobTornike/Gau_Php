<?php
include("../db_connection.php");

$type = $_POST['type'] ?? '';
$directory = $_POST['directory'] ?? '';
$file = $_POST['file'] ?? '';

if ($conn && !empty($type) && !empty($directory) && !empty($file)) {
    // Correct the path construction
    $filePath = __DIR__ . '/' . str_replace('sql/', '', $directory) . '/' . $file;
    if (file_exists($filePath)) {
        $sqlContent = file_get_contents($filePath);
        if ($conn->multi_query($sqlContent)) {
            echo "Executed SQL from " . htmlspecialchars($file) . " successfully.";
            while ($conn->more_results() && $conn->next_result()) {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            }
        } else {
            echo "Error executing SQL from " . htmlspecialchars($file) . ": " . htmlspecialchars($conn->error);
        }
    } else {
        echo "Error: SQL file not found: " . htmlspecialchars($file);
    }
} else {
    echo "Error: Invalid parameters or database connection failed.";
}

if ($conn) {
    $conn->close();
}
?>