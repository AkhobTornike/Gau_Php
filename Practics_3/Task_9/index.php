<?php
$result = ""; 

if (isset($_POST['submit'])) {
    include('process.php'); 
    $password = $_POST['password'];
    $result = checkPasswordStrength($password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <label for="password">პაროლი:</label>
            <input type="password" name="password" id="password" required><br><br>
            <button type="submit" name="submit">შემოწმება</button>
            <p><?php echo $result; ?></p>
        </form>
    </div>
</body>
</html>