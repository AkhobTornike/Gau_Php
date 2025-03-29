<?php 
    $sum = 0;
    $product = 0;
    $user = "";
    $email = "";
    $age = "";
    $error_user = "";
    $error_email = "";

    function sum($n1, $n2, $n3) {
        return $n1 + $n2 + $n3;
    }

    function product($n1, $n2, $n3) {
        return $n1 * $n2 * $n3;
    }

    if (isset($_POST["sum"])) {
        if (isset($_POST["n1"])) { $n1 = $_POST["n1"]; } else { $n1 = 0; }
        if (isset($_POST["n2"])) { $n2 = $_POST["n2"]; } else { $n2 = 0; }
        if (isset($_POST["n3"])) { $n3 = $_POST["n3"]; } else { $n3 = 0; }
        
        $sum = sum($n1, $n2, $n3);
    }
    if (isset($_POST["product"])) {
        if (isset($_POST["n1"])) { $n1 = $_POST["n1"]; } else { $n1 = 1; }
        if (isset($_POST["n2"])) { $n2 = $_POST["n2"]; } else { $n2 = 1; }
        if (isset($_POST["n3"])) { $n3 = $_POST["n3"]; } else { $n3 = 1; }
        
        $product = product($n1, $n2, $n3);
    }

    if (isset($_POST['signup'])) {
        if (isset($_POST['user'])) {
            $user = $_POST['user'];
            $error_user = "error";
        } else {
            $user = "";
        }
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $error_email = "error";
        } else {
            $email = "";
        }
        if (isset($_POST['age'])) {
            $age = $_POST['age'];
        } else {
            $age = "";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div>
            <form method="post">
                <label for="n1">Number 1</label>
                <input type="number" name="n1" id="n1">
                <label for="n2">Number 2</label>
                <input type="number" name="n2" id="n2">
                <label for="n3">Number 3</label>
                <input type="number" name="n3" id="n3">

                <button type="submit" name="sum">Sum</button>
                <p><?php echo "Sum of numbers: ". $sum ?></p>
                <button type="submit" name="product">Product</button>
                <p><?php echo "Product of numbers: ". $product ?></p>

            </form>
        </div>
    </div>

    <div class="container">
    <div>
            <form method="post">
                <label for="user">UserName</label>
                <input type="text" name="user" id="user"> - <span class="<?php echo $error_user ?>">*</span>
                <label for="email">E-Mail</label>
                <input type="text" name="email" id="email"> - <span class="<?php echo $error_email ?>">*</span>

                <input type="checkbox" name="age[]" id="age1" value="18-25"> 18-25
                <input type="checkbox" name="age[]" id="age2" value="26-35">  26-35

                <button type="submit" name="signup">Sign Up</button>
                <?php echo "<h3>UserName: ". $user ?>
                <?php echo "<h3>Email: ". $email ?>
                <?php echo "<h3>Age: ". implode(", ", (array)$age) ?>
            </form>
        </div>
    </div>
</body>
</html>