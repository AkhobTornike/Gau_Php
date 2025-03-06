<?php
function generateTable($width, $height, $min, $max) {
    echo '<link rel="stylesheet" type="text/css" href="../style.css">';
    echo "<table>";
    for ($i = 0; $i < $height; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $width; $j++) {
            echo "<td>" . rand($min, $max) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST["submit"])) {
    $width = $_POST["width"];
    $height = $_POST["height"];
    $min = $_POST["min"];
    $max = $_POST["max"];

    generateTable($width, $height, $min, $max); // ფუნქციის გამოძახება
}
?>