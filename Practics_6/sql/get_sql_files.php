<?php
$type = $_GET['type'] ?? '';
$directory = $_GET['directory'] ?? '';
$files = [];

if ($type === 'create' && $directory === 'sql/create_table/') {
    $files = array_map('basename', glob(__DIR__ . '/create_table/*.sql'));
} elseif ($type === 'insert' && $directory === 'sql/insert_data/') {
    $files = array_map('basename', glob(__DIR__ . '/insert_data/*.sql'));
}

header('Content-Type: application/json');
echo json_encode($files);
?>