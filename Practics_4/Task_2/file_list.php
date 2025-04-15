<?php
$files = glob('uploads/*');
foreach($files as $file) {
    $fileName = basename($file);
    $fileSize = filesize($file);
    $fileType = mime_content_type($file);
    $isImage = strpos($fileType, 'image/') !== false;

    echo "<link rel='stylesheet' href='style.css'>";
    echo "<tr>";
    echo "<td>" . $fileName . "</td>";
    echo "<td>" . $fileType . "</td>";
    echo "<td>" . round($fileSize / 1024, 2) . " KB</td>";
    if ($isImage) {
        echo "<td><img class='image' src='" . $file . "' alt='" . $fileName . "'></td>";
    } else {
        echo "<td></td>";
    }
    echo "<td><a href='download.php?file=" . $file . "'>ჩამოტვირთვა</a> | <a href='delete.php?file=" . $file . "' onclick='return confirm(\"დარწმუნებული ხართ?\")'>წაშლა</a></td>";
    echo "</tr>";
}
?>