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
        <h1>შეავსეთ გრაფა რათა შევქმნათ ცხრილი</h1>
    <form action="process.php" method="post">
        <div>
            <label for="width">ჰორიზონტალური რაოდენობა</label>
            <input type="number" name="width" id="width">
        </div>
        <div>
            <label for="height">ვერტიკალური რაოდენობა</label>
            <input type="number" name="height" id="height">
        </div>
        <div>
            <label for="min">რიცხვის მინიმალური მნშივნელობა</label>
            <input type="numbe" name="min" id="min">
        </div>
        <div>
            <label for="max">რიცხვის მაქსიმალური მნშივნელობა</label>
            <input type="numbe" name="max" id="max">
        </div>
        <button type="submit" name="submit">გაგზავნა</button>
    </form>

</body>
</html>