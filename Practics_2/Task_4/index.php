<?php
    $cars = array(
        array("Make"=>"Toyota", 
            "Model"=>"Corolla", 
            "Color"=>"White", 
            "Mileage"=>24000, 
            "Status"=>"Sold"),
    
        array("Make"=>"Toyota", 
            "Model"=>"Camry", 
            "Color"=>"Black", 
            "Mileage"=>56000, 
            "Status"=>"Available"),
    
        array("Make"=>"Honda", 
            "Model"=>"Accord", 
            "Color"=>"White", 
              "Mileage"=>15000, 
            "Status"=>"Sold")  );

    echo "<div class='container'>";
    echo "<table border='1'>";
    echo "<tr><th>Make</th><th>Model</th><th>Color</th><th>Mileage</th><th>Status</th></tr>";

    foreach ($cars as $car) {
        echo "<tr>";
        echo "<td>" . $car['Make'] . "</td>";
        echo "<td>" . $car['Model'] . "</td>";
        echo "<td>" . $car['Color'] . "</td>";
        echo "<td>" . $car['Mileage'] . "</td>";
        echo "<td>" . $car['Status'] . "</td>";
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