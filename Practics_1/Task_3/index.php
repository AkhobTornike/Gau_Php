<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Quizz</h1>
    <hr>

    <!-- Form -->

    <form action="result.php" method="post">
        <label for="q1">1. What is the capital of France?</label><br>
        <input type="radio" name="q1" value="a"> a) Paris<br>
        <input type="radio" name="q1" value="b"> b) London<br>
        <input type="radio" name="q1" value="c"> c) Madrid<br>
        <input type="radio" name="q1" value="d"> d) Berlin<br>
        <hr>

        <label for="q2">2. What is the capital of Germany?</label><br>
        <input type="radio" name="q2" value="a"> a) Paris<br>
        <input type="radio" name="q2" value="b"> b) London<br>
        <input type="radio" name="q2" value="c"> c) Madrid<br>
        <input type="radio" name="q2" value="d"> d) Berlin<br>
        <hr>

        <label for="q3">3. What is the capital of Spain?</label><br>
        <input type="radio" name="q3" value="a"> a) Paris<br>
        <input type="radio" name="q3" value="b"> b) London<br>
        <input type="radio" name="q3" value="c"> c) Madrid<br>
        <input type="radio" name="q3" value="d"> d) Berlin<br>
        <hr>

        <label for="q4">4. Tell us about First World War</label><br>
        <textarea name="q4" id="q4"></textarea>
        <hr>

        <label for="q5">5. Tell us about Second World war</label><br>
        <textarea name="q5" id="q5"></textarea>
        <hr>

        <input type="submit" value="Submit">
    </form>
</body>
</html>