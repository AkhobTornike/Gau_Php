<?php
$files = glob('*.txt');
foreach($files as $file) {
    echo "<tr>";
    echo "<td>" . $file . "</td>";
    echo "<td><button onclick=\"showFileContent('" . $file . "')\">წაკითხვა/ჩაწერა</button> | <a href='delete_file.php?file=" . $file . "' onclick='return confirm(\"დარწმუნებული ხართ?\")'>წაშლა</a></td>";
    echo "</tr>";
}
?>