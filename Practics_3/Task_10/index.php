<?php 
    $message = '';
    function checkUrl($url): string {
        $hasNumbers = preg_match('/[0-9]/', $url);
        if ($hasNumbers) {
            return "ლინკი შეიცავს ციფრებს";
        } else {
            return "ლინკი არ შეიცავს ციფრებს";
        }
    }

    if (isset($_POST["submit"])) {
       $url = $_POST["url"];
       $message = checkUrl($url);
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
        <h1>შევამოწმოთ შეიცავს თუ არა ლინკი ციფრებს</h1>

        <form method="post">
            <label for="url">შეიყვანეთ ლინკი: </label>
            <input type="text" name="url" id="url" required>

            <button type="submit" name="submit">შემოწმება</button>
        </form>

        <p><?php echo $message; ?></p>
    </div>
</body>
</html>