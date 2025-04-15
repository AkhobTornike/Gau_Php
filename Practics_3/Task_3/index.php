<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>უსაფრთხოების კოდის შემოწმება</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>უსაფრთხოების კოდის შემოწმება</h1>
        <p>შეიყვანეთ უსაფრთხოების კოდი:</p>

        <form action="process.php" method="post">
            <label for="user_code">უსაფრთხოების კოდი:</label>
            <input type="text" name="user_code" id="user_code">
            <button type="submit">შემოწმება</button>
        </form>
    </div>
</body>
</html>