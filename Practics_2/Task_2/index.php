<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include("logic.php"); ?>
    <table class="full_matrix">
        <?php
        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                echo "<td>" . $myMatrix[$i][$j] . "</td>"; 
            }
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <table class="upper_triangle">
        <?php
        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                if ($j > $i) {
                    echo "<td class='active'>" . $myMatrix[$i][$j] . "</td>";
                } else {
                    echo "<td class='inactive'></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
    </div>

    <br>
    <form method="post" action="">
        <label for="x">შეიყვანეთ X რიცხვი:</label>
        <input type="number" name="x" id="x">
        <button type="submit" name="submit">დათვლა</button>
    </form>
</body>
</html>