<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h1>Upload File</h1>
            <input type="file" name="file" id="file" required>
            <button type="submit" class="submit-button" name="submit">Upload</button>

            <hr>
            <?php
            // Display error or success messages from session
            if (isset($_SESSION['error_message'])) {
                echo '<p id="error-message" class="error-message">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']); // Clear the message from session
            }
            if (isset($_SESSION['success_message'])) {
                echo '<p id="success-message" class="success-message">' . $_SESSION['success_message'] . '</p>';
                unset($_SESSION['success_message']); // Clear the message from session
            }
            ?>
        </form>
    </div>

    <div class="container">
        <h1>Uploaded Files</h1>
        <ul class="file-list">
            <?php
            $uploadDir = 'uploads/';
            $files = glob($uploadDir . '*');
            $fileList = array_map('basename', $files);
            foreach ($fileList as $file) {
                echo "
                <li>
                    <h3>$file</h3>
                    <img class='image' src='$uploadDir$file' alt='image'>
                    <form action='delete.php' method='post' class='delete-form'>
                        <input type='hidden' name='file' value='$file'>
                        <button type='submit' class='delete-button' name='delete'>Delete</button>
                    </form>
                </li>
                ";
            }
            ?>
        </ul>
    </div>
</body>
</html>