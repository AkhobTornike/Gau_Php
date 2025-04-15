<?php 
    $uploadDir = 'uploads/';
    $files = glob($uploadDir . '*');
    $fileList = array_map('basename', $files);
?>