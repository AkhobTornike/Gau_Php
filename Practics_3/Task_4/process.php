<?php
function generateSecurityCode() {
    $code = rand(10,100);
    $symbols = ['+', '-', '*', '/'];
    $code .= $symbols[array_rand($symbols)];
    $code .= rand(10,100);
    return $code;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userCode = $_POST['user_code'];
    $generatedCode = generateSecurityCode();

    if ($userCode == $generatedCode) {
        echo "<p>უსაფრთხოების კოდი სწორია!</p>";
    } else {
        echo "<p>უსაფრთხოების კოდი არასწორია!</p>";
    }
}
?>