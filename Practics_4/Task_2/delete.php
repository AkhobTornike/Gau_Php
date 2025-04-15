<?php
$file = $_GET['file'];
if (file_exists($file)) {
    unlink($file);
    header("Location: upload.html");
}
?>