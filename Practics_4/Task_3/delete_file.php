<?php
$file = $_GET['file'];
if (file_exists($file)) {
    unlink($file);
    header("Location: text_file_manager.html");
}
?>