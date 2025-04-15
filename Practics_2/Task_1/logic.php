<?php
    $myArray = [];
    for ($i = 0; $i < 12; $i++) {
        $myArray[$i] = rand(10,100);
    }

    if (isset($_POST["x"])) {
        $x = $_POST["x"];

        $lessThanX = 0;
        $greaterThanX = 0;
    
        foreach ($myArray as $value) {
            if ($value < $x) {
                $lessThanX++;
            } elseif ($value > $x) {
                $greaterThanX++;
            }
        }

        echo "<p>X-ზე ნაკლები ელემენტების რაოდენობა: " . $lessThanX . "</p>";
        echo "<p>X-ზე მეტი ელემენტების რაოდენობა: " . $greaterThanX . "</p>";
    }
?>