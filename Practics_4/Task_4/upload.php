<?php
session_start();

if (isset($_POST["submit"])) {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $filename = $_FILES["file"]["name"];
        $filesize = $_FILES["file"]["size"];

        if ($filesize <= 100000000 && $filesize > 0) {
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($file_extension, $allowed_extensions)) { 

                $new_filename_base = generateFileNameBase('uploads');
                $new_filename = $new_filename_base . '.' . $file_extension;

                $upload_dir = "uploads/" . basename($new_filename);

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_dir)) {
                    $_SESSION['success_message'] = 'File uploaded successfully';
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION['error_message'] = 'Error uploading file.';
                    header("Location: index.php");
                    exit;
                }
            } else {
                $_SESSION['error_message'] = 'Invalid file extension. Allowed extensions are: ' . implode(', ', $allowed_extensions);
                header("Location: index.php");
                exit;
            }
        } else {
            $_SESSION['error_message'] = 'File size exceeds the limit of 100MB or is empty.';
            header("Location: index.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = 'Error: ' . $_FILES["file"]["error"];
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = 'No file submitted.';
    header("Location: index.php");
    exit;
}

function generateFileNameBase($uploadDir = 'uploads/') {
    if (substr($uploadDir, -1) !== '/') {
        $uploadDir .= '/';
    }

    $month = date('m');
    $year = date('Y');
    $day = date('d');

    $count = 1;
    while (glob($uploadDir . $count . '_' . $month . "_" . $day . "_" . $year . '.*')) {
        $count++;
    }

    $filename_base = $count . '_' . $month . "_" . $day . "_" . $year;

    return $filename_base;
}
?>