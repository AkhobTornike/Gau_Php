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
        <h1>შევქმნათ მატრიცა</h1>

        <form action="process.php" method="post">
            <label for="rows">სტრიქონები:</label>
            <input type="number" name="rows" id="rows">
            <label for="columns">სვეტები:</label>
            <input type="number" name="columns" id="columns">
            <label for="min">მინიმუმი:</label>
            <input type="number" name="min" id="min">
            <label for="max">მაქსიმუმი:</label>
            <input type="number" name="max" id="max">

            <button type="submit" name="submit">შექმნა</button>
        </form>
    </div>
</body>
</html>