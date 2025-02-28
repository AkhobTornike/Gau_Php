<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ნიშნების უწყისის ფორმა</h1>
    <hr>

    <form action="student.php" method="post">
        <label for="stud_fName">Student First Name</label>
        <input type="text" name="stud_fName" id="stud_fName">
        <hr>

        <label for="stud_lName">Student Last Name</label>
        <input type="text" name="stud_lName" id="stud_lName">
        <hr>

        <label for="curse">Curse</label>
        <input type="number" name="curse" id="curse">
        <hr>

        <label for="semester">Semester</label>
        <input type="number" name="semester" id="semester">
        <hr>

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject">
        <hr>

        <label for="grade">Grade</label>
        <input type="number" name="grade" id="grade">
        
        <hr>
        <hr>

        <label for="lecturer_name">Lecturer Name</label>
        <input type="text" name="lecturer_name" id="lecturer_name">

        <label for="lecturer_last_name">Lecturer Last Name</label>
        <input type="text" name="lecturer_last_name" id="lecturer_last_name">

        <input type="submit" value="Submit">
    </form>
</body>
</html>