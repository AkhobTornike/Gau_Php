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
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" class="input-file">
            <input type="submit" value="ატვირთვა" name="submit" class="button-submit">
            <p id="error-message" class="error-message"></p>
        </form>
    </div>
</body>
</html>