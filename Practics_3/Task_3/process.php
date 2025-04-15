<?php
function generateSecurityCode() {
    $code = '';
    for ($i = 0; $i < 5; $i++) {
        $code .= rand(0, 9);
    }
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