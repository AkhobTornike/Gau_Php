<?php
    $myMatrix = [];
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $myMatrix[$i][$j] = rand(10,100);
        }
    }
    
    echo "<div class='container_below_text'>";
    // ჯერადები
    if (isset($_POST["x"])) {
        $x = $_POST["x"];

        echo "<p> X ის ჯერადი რიცხვები: ";
        foreach ($myMatrix as $row) {
            foreach ($row as $value) {
                if ($value % $x == 0) {
                    echo $value . ", ";
                }
            }
        }
        echo "</p>";

        // მარტივი გამოთვლები
        $sum = 0;
        $product = 1;
        $count = 0;
        $max = $myMatrix[0][0];
        $min = $myMatrix[0][0];


        foreach ($myMatrix as $row) {
            foreach ($row as $value) {
                $sum += $value;
                $product *= $value;
                $count++;

                if ($value < $min) {
                    $min = $value;
                }
                if ($value > $max) {
                    $max = $value;
                }
            }
        }
        $aritmetic_mean = $sum / $count;
        $range = $max - $min;

        echo "<p> მატრიცის ელემენტების ჯამია: " . $sum . " ;</p>";
        echo "<p> მატრიცის ელემენტების ნამრავლია: " . $product . " ;</p>";
        echo "<p> მატრიცის ელემენტების საშუალო არითმეტიკულია: " . $aritmetic_mean . " ;</p>";
        echo "<p> მატრიცის ელემენტების დიაპაზონია: " . $range . " ;</p>";

    echo "</div>";

        echo "<table>";
        foreach ($myMatrix as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                $digitSum = 0;
                $temp = $value;
                while ($temp > 0) {
                    $digitSum += $temp % 10;
                    $temp = (int)($temp / 10);
                }
                echo "<td>" . $digitSum . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>