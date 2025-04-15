<?php
include("db_connection.php");

if ($conn) {
    $sqlDirectory = __DIR__ . "/sql/create_table/";
    $sqlFiles = glob($sqlDirectory . "*.sql");

    foreach ($sqlFiles as $sqlFile) {
        echo "Processing file: $sqlFile<br>";
        $tableName = pathinfo($sqlFile, PATHINFO_FILENAME);
        $createQuery = file_get_contents($sqlFile);

        if ($conn -> multi_query($createQuery)) {
            echo "Executed SQL from '$tableName.sql' successfully.<br>";
            // Clean result for next query
            
            while ($conn -> more_results() && $conn -> next_result()) {
                if ($result = $conn -> store_result()) {
                    $result -> free();
                }
            }
        } else {
            echo "Error executing SQL from '$tableName.sql': " . $conn -> error . "<br>";
        }
    }

    $conn->close();
} else {
    echo "Database connection failed.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>

</html>