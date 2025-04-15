<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post">
        <div class="form-row">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
            <span class="error"><?php echo isset($nameErr) ? htmlspecialchars($nameErr) : ''; ?></span>
        </div>
        <div class="form-row">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <span class="error"><?php echo isset($emailErr) ? htmlspecialchars($emailErr) : ''; ?></span>
        </div>
        <div class="form-row">
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" value="<?php echo isset($_POST['website']) ? htmlspecialchars($_POST['website']) : ''; ?>">
        </div>
        <div class="form-row">
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment"><?php echo isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : ''; ?></textarea>
        </div>
        <div class="form-row">
            <label>Gender:</label>
            <input type="radio" name="gender" id="female" value="female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "female") echo "checked"; ?>> <label for="female">Female</label>
            <input type="radio" name="gender" id="male" value="male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "male") echo "checked"; ?>> <label for="male">Male</label>
            <input type="radio" name="gender" id="other" value="other" <?php if (isset($_POST['gender']) && $_POST['gender'] == "other") echo "checked"; ?>> <label for="other">Other</label>
            <span class="error"><?php echo isset($genderErr) ? htmlspecialchars($genderErr) : ''; ?></span>
        </div>
        <div class="form-row">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

    <?php
    // ცვლადები შეცდომების შესანახად
    $nameErr = $emailErr = $genderErr = "";
    $name = $email = $website = $comment = $gender = "";
    $hasErrors = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $hasErrors = true;
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $hasErrors = true;
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $hasErrors = true;
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $hasErrors = true;
        } else {
            $gender = test_input($_POST["gender"]);
        }

        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);

        if (!$hasErrors) {
            echo "<div class='your-input'>";
            echo "<h2>Your Input:</h2>";
            echo "<table>";
            echo "<tr><td>Name:</td><td>" . $name . "</td></tr>";
            echo "<tr><td>Email:</td><td>" . $email . "</td></tr>";
            echo "<tr><td>Website:</td><td>" . $website . "</td></tr>";
            echo "<tr><td>Comment:</td><td>" . $comment . "</td></tr>";
            echo "<tr><td>Gender:</td><td>" . $gender . "</td></tr>";
            echo "</table>";
            echo "</div>";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</div>
</body>
</html>