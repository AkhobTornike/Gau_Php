<?php 
    function checkPasswordStrength($password) {
        $length = strlen($password);
        $hasLetters = preg_match('/[a-zA-Z]/', $password);
        $hasNumbers = preg_match('/[0-9]/', $password);
        $hasSymbols = preg_match('/[^a-zA-Z0-9]/', $password);
    
        if ($length == 0) {
            return "შეიყვანეთ პაროლი";
        }
        if ($length < 8 || (!$hasLetters && !$hasNumbers)) {
            return "სუსტი";
        } elseif ($length >= 8 && $hasLetters && $hasNumbers && !$hasSymbols) {
            return "საშუალო";
        } elseif ($length >= 12 && $hasLetters && $hasNumbers && $hasSymbols) {
            return "მძლავრი";
        } else {
            return "საშუალო"; 
        }
    }
?>