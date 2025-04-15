<?php
$file = $_POST['file'];
$content = $_POST['content'];

if (file_exists($file)) {
    file_put_contents($file, $content);
    echo "ფაილი წარმატებით ჩაიწერა.";
} else {
    echo "ფაილი ვერ მოიძებნა.";
}
?>