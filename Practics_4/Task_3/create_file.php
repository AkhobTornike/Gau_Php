<?php
if(isset($_POST['filename'])) {
    $filename = $_POST['filename'];
    $file_path = $filename;

    if (substr($filename, -4) !== '.txt') {
        echo "<script>document.getElementById('error-message').innerHTML = 'ფაილის გაფართოება უნდა იყოს .txt';</script>";
    } else {
        if (!file_exists($file_path)) {
            $file = fopen($file_path, 'w');
            fclose($file);
            header("Location: text_file_manager.html");
        } else {
            echo "<script>document.getElementById('error-message').innerHTML = 'ფაილი ამ სახელით უკვე არსებობს.';</script>";
        }
    }
}
?>