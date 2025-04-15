<?php 
function countDigits($number) {
    return strlen($number);
}

if (isset($_POST['submit'])) {
    $userNumber = $_POST['number'];
    $digitsCount = countDigits($userNumber);

    if ($digitsCount == 0) {
        echo "<p>შეყვანილი რიცხვი არის 0</p>";
    } else {
        echo "<p>შეყვანილ რიცხვში არის $digitsCount ციფრი</p>";
    }
}
?>