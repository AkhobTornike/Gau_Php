<?php
if (isset($_GET['firstName']) && isset($_GET['lastName']) && isset($_GET['position']) && isset($_GET['salary']) && isset($_GET['incomeTaxPercent'])) {

    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $position = $_GET['position'];
    $salary = $_GET['salary'];
    $incomeTaxPercent = $_GET['incomeTaxPercent'];

    $incomeTaxAmount = ($salary * $incomeTaxPercent) / 100;
    $netSalary = $salary - $incomeTaxAmount;

    echo "<table border='1'>";
    echo "<tr><th>სახელი</th><th>გვარი</th><th>თანამდებობა</th><th>ხელფასი</th><th>საშემოსავლო (%)</th><th>საშემოსავლო (თანხა)</th><th>დარიცხული ხელფასი</th></tr>";
    echo "<tr><td>$firstName</td><td>$lastName</td><td>$position</td><td>$salary</td><td>$incomeTaxPercent%</td><td>$incomeTaxAmount</td><td>$netSalary</td></tr>";
    echo "</table>";
} else {
    echo "გთხოვთ, შეავსოთ ყველა ველი.";
}
?>