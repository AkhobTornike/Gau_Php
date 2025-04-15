<?php 
    if (isset($_POST["delete"])) {
        $file = $_POST["file"];
        $uploadDir = 'uploads/';
        $filePath = $uploadDir . $file;

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                echo "File deleted successfully.";
                header("Location: index.php");
                exit;
            } else {
                echo "Error deleting the file.";
            }
        } else {
            echo "File does not exist.";
        }
    }
?>