<?php
if (isset(
    $_POST['stud_fName']) && 
    isset($_POST['stud_lName']) 
    && isset($_POST['curse']) && 
    isset($_POST['semester']) && 
    isset($_POST['subject']) && 
    isset($_POST['grade']) && 
    isset($_POST['lecturer_name']) && 
    isset($_POST['lecturer_last_name'])) {
    
    $studentFirstName = $_POST['stud_fName'];
    $studentLastName = $_POST['stud_lName'];
    $course = $_POST['curse'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $teacher = $_POST['lecturer_name'];
    $teacherLastName = $_POST['lecturer_last_name'];
    
    switch ($grade) {
        case ($grade >= 97 && $grade <= 100):
            $grade_point = 'A+';
            break;
        case ($grade > 93 && $grade < 97):
            $grade_point = 'A';
            break;
        case ($grade >= 90 && $grade <= 93):
            $grade_point = 'A-';
            break;
        case ($grade >= 87 && $grade <= 89):
            $grade_point = 'B+';
            break;
        case ($grade >= 83 && $grade <= 86):
            $grade_point = 'B';
            break;
        case ($grade >= 80 && $grade <= 82):
            $grade_point = 'B-';
            break;
        case ($grade >= 77 && $grade <= 79):
            $grade_point = 'C+';
            break;
        case ($grade >= 73 && $grade <= 76):
            $grade_point = 'C';
            break;
        case ($grade >= 70 && $grade <= 72):
            $grade_point = 'C-';
            break;
        case ($grade >= 67 && $grade <= 69):
            $grade_point = 'D+';
            break;
        case ($grade >= 63 && $grade <= 66):
            $grade_point = 'D';
            break;
        case ($grade >= 51 && $grade <= 62):
            $grade_point = 'D-';
            break;
        case ($grade < 51 && $grade >= 0):
            $grade_point = 'F';
            break;
        default:
            $grade_point = 'Invalid Grade';
            break;
    }
    
    echo "<h1>Student Information</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Student First Name</th><th>Student Last Name</th><th>Course</th><th>Semester</th><th>Subject</th><th>Grade</th><th>Grade Point</th><th>Lecturer Name</th><th>Lecturer Last Name</th></tr>";
    echo "<tr><td>$studentFirstName</td><td>$studentLastName</td><td>$course</td><td>$semester</td><td>$subject</td><td>$grade</td><td>$grade_point</td><td>$teacher</td><td>$teacherLastName</td></tr>";
    echo "</table>";
}
?>