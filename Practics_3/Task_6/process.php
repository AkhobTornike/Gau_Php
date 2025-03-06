<?php 
    function generateMatrix($rows, $columns, $min, $max) {
        $matrix = [];

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = rand($min, $max);
            }
        }
        return $matrix;
    }

    function sumRow($matrix, $rowId) {
        $sum = 0;
        for ($j = 0; $j < count($matrix[$rowId]); $j++) {
            $sum += $matrix[$rowId][$j];
        }
        return $sum;
    }

    function sumColumn($matrix, $columnId) {
        $sum = 0;
        for ($i = 0; $i < count($matrix); $i++) {
            $sum += $matrix[$i][$columnId];
        }
        return $sum;
    }

    if (isset($_POST["submit"])) {
        $rows = $_POST["rows"];
        $columns = $_POST["columns"];
        $min = $_POST["min"];
        $max = $_POST["max"];

        $matrix = generateMatrix($rows, $columns, $min, $max);

        echo '<link rel="stylesheet" type="text/css" href="../style.css">';
        echo "<table>";
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columns; $j++) {
                echo "<td>" . $matrix[$i][$j] . "</td>";
            }
            echo "<td style='background-color: gray'>" . sumRow($matrix, $i) . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        for ($j = 0; $j < $columns; $j++) {
            echo "<td style='background-color: gray'>" . sumColumn($matrix, $j) . "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
?>