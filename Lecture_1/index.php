<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php 1 Lecture</title>
    <style>
        .boxed {
            border: 2px solid black;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="boxed">
        <h1>lecture</h1>

        <?php
            echo "<hr><hr><hr>";

            echo "Hello World";
            $name = 'John Doe';
            $age = 18;

            echo "<h2>My name is $name</h2>";
            echo "<h2>My age is $age</h2>";

            $info = ["Mariam", 18, 3.8, true, "Gau"];

            echo "<h2>My name is $info[0]; My University is $info[4]</h2>";

            // 3 გასნხვავებული ხერხით დაბეჭდეთ მასივის ელემენტები ცალ-ცალკე სტრიქონად.

            echo "
            <hr>
            <h2>My Name is: $info[0]</h2>
            <h2>My Age is: $info[1]</h2>
            <h2>My GPA is: $info[2]</h2>
            <h2>Am I Student: $info[3]</h2>
            <h2>My University is: $info[4]</h2>
            <hr>
            ";

            // Using a for loop
            echo "<h2>Using a for loop:</h2>";
            for ($i = 0; $i < count($info); $i++) {
                echo "<p>$info[$i]</p>";
            }

            // Using a foreach loop
            echo "
            <hr>
            <h2>Using a foreach loop:</h2>";
            foreach ($info as $element) {
                echo "<p>$element</p>";
            }

            // Using implode function
            echo "
            <hr>
            <h2>Using implode function:</h2>";
            echo "<p>" . implode("</p><p>", $info) . "</p>";


            echo "
            <hr>
            <h2>Using print_r function:</h2>";
            echo "<pre>";
            echo print_r($info);          
            echo "</pre>";

            echo "<hr><hr><hr>";

            $full_info = [
                "name" => "Mariam",
                "age" => 18,
                "city" => "Tbilisi",
                "education" => [
                    "school" => "Gymnasium",
                    "university" => "Gau"
                ]
            ];

            echo "<hr><hr><hr>";

            // Print $full_info as a table
            echo "<h2>Full Info Table:</h2>";
            echo "<table border='1' style='width: 50%; margin: 0 auto;'>";
            echo "<tr><th>Key</th><th>Value</th></tr>";
            foreach ($full_info as $key => $value) {
                if (is_array($value)) {
                    echo "<tr><td>$key</td><td>";
                    foreach ($value as $sub_key => $sub_value) {
                        echo "$sub_key: $sub_value<br>";
                    }
                    echo "</td></tr>";
                } else {
                    echo "<tr><td>$key</td><td>$value</td></tr>";
                }
            }
            echo "</table>";

        ?>
        <hr>
            <div>End Of Source Code</div>
        <hr>
    </div>
</body>
</html>