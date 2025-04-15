<?php
session_start();

if (isset($_POST['submit']) && isset($_POST['folderName']) && isset($_POST['parentFolder'])) {
    $folderName = $_POST['folderName'];
    $parentFolder = $_POST['parentFolder'];
    $folderPath = $parentFolder . $folderName;

    if (!file_exists($folderPath)) {
        if (mkdir($folderPath, 0777, true)) {
            $_SESSION['success_message'] = "დირექტორია '$folderName' წარმატებით შეიქმნა.";
        } else {
            $_SESSION['error_message'] = "დირექტორიის შექმნა ვერ მოხერხდა.";
        }
    } else {
        $_SESSION['error_message'] = "დირექტორია '$folderName' უკვე არსებობს.";
    }
} else {
    $_SESSION['error_message'] = "შეიყვანეთ დირექტორიის სახელი და აირჩიეთ მშობელი დირექტორია.";
}

header("Location: index.php");
exit;
?>