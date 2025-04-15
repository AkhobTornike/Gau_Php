<?php

if (isset(
    $_POST['q1']) && 
    isset($_POST['q2']) && 
    isset($_POST['q3']) && 
    isset($_POST['q4']) && 
    isset($_POST['q5'])) {

    $correctAnswers = 0;
    $question_1 = $_POST['q1'];
    $question_2 = $_POST['q2'];
    $question_3 = $_POST['q3'];
    $question_4 = $_POST['q4'];
    $question_5 = $_POST['q5'];

    if ($question_1 == 'a') {
        $correctAnswers++;
    }
    if ($question_2 == 'b') {
        $correctAnswers++;
    }
    if ($question_3 == 'c') {
        $correctAnswers++;
    }
    if ($question_4 == '') {
        $randomNumber = rand(0,10);
        if ($randomNumber > 4) {
            $correctAnswers++;
        }
    }
    if ($question_5 == '') {
        $randomNumber = rand(0,10);
        if ($randomNumber < 5) {
            $correctAnswers++;
        }
    }


    echo "<h1>Quizz Result</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Question 1</th><th>Question 2</th><th>Question 3</th><th>Question 4</th><th>Question 5</th><th>Correct Answers</th></tr>";
    echo "<tr><td>$question_1</td><td>$question_2</td><td>$question_3</td><td>$question_4</td><td>$question_5</td><td>$correctAnswers</td></tr>";
    echo "</table>";
}

?>