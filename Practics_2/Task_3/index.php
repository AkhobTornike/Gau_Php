<?php
    $myMatrix = [];

    echo "დავალება 3";

    for ($i = 0; $i < 6; $i++) {
        for ($j = 0; $j < 5; $j++) {
            $myMatrix[$i][$j] = $i + $j;
        }
    }

    echo "<div class='container'>";
    echo "<table>";
    foreach ($myMatrix as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
?>
<style>
    .container {
        display: flex;
        justify-content: center;
    }
    table {
        border-collapse: collapse;
    }
    td {
        border: 1px solid black;
        padding: 10px;
    }
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #ffffff;
    }
</style>