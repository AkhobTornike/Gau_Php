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
        <h1>შევქმნათ ვექტორი</h1>
    <form action="process.php" method="post">
        <label for="m">ვექტორის ზომა (M):</label>
        <input type="number" name="m" id="m" required><br><br>

        <label for="a">მინიმალური მნიშვნელობა (a):</label>
        <input type="number" name="a" id="a" required><br><br>

        <label for="b">მაქსიმალური მნიშვნელობა (b):</label>
        <input type="number" name="b" id="b" required><br><br>

        <button type="submit" name="submit">გენერირება</button>
    </form>
    </div>
</body>
</html>