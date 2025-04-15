<?php 
    function generateRandomVector($m, $a, $b) {
        $vector = [];
        for ($i = 0; $i < $m; $i++) {
            $vector[] = rand($a, $b);
        }
        return $vector;
    }

    if (isset($_POST["submit"])) {
        $m = $_POST["m"];
        $a = $_POST["a"];
        $b = $_POST["b"];

        echo '<link rel="stylesheet" type="text/css" href="../style.css">';
        
        if ($m <= 0 || $a > $b) {
            echo "<p>შეყვანილი მონაცემები არასწორია.</p>";
        } else {
            $randomVector = generateRandomVector($m, $a, $b);

            echo "<p>შემთხვევითი ვექტორი:</p>";
            echo "<div class='vector-container'>"; 
            echo "<ul>";
            foreach ($randomVector as $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul>";
            echo "</div>";
        }
    }
?>