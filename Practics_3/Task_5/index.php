<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>დავითვალოთ ციფრები რიცხვში</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>შევამოწმთ რამდენ ნიშნაა რიცხვი</h1>
        <p>შეიყვანეთ ნებისმიერი რიცხვი კოდი:</p>

        <form action="process.php" method="post">
            <label for="number">რიცხვი:</label>
            <input type="number" name="number" id="number">
            <button type="submit" name="submit">შემოწმება</button>
        </form>
    </div>
</body>
</html>