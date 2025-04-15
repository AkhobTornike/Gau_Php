<!DOCTYPE html>
<html>
<head>
    <title>სახელფასო უწყისი</title>
</head>
<body>
    <h1>სახელფასო უწყისი</h1>
    <form action="employee.php" method="get">
        <label for="firstName">სახელი:</label><br>
        <input type="text" id="firstName" name="firstName"><br><br>

        <label for="lastName">გვარი:</label><br>
        <input type="text" id="lastName" name="lastName"><br><br>

        <label for="position">თანამდებობა:</label><br>
        <input type="text" id="position" name="position"><br><br>

        <label for="salary">ხელფასი:</label><br>
        <input type="number" id="salary" name="salary"><br><br>

        <label for="incomeTaxPercent">საშემოსავლო (%):</label><br>
        <select id="incomeTaxPercent" name="incomeTaxPercent">
            <option value="20">20%</option>
            <option value="15">15%</option>
            <option value="10">10%</option>
            <option value="5">5%</option>
        </select><br><br>
        <input type="submit" value="გამოთვლა">
    </form>
</body>
</html>