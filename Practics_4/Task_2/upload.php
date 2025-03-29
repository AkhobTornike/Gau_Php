<?php 
    if (isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo "<script>document.getElementById('error-message').innerHTML = 'Large File.';</script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>document.getElementById('error-message').innerHTML = 'Uploading filed.';</script>";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<script>alert('File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " Uploaded.'); window.location.href='upload.html';</script>";
            } else {
                echo "<script>document.getElementById('error-message').innerHTML = 'Error while uploading file.';</script>";
            }
        }
    }
?>