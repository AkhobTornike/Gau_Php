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
            <input type="file" name="fileToUpload" if="fileToUpload" class="input-file">
            <button name="submit" class="button-submit">Upload</button>

            <hr>
            <p id="error-message" class="error-message"></p>
        </form>
    </div>

    <div class="file-list">
        <h2>Uploaded Files</h2>
        <table id="fileTable">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>SIZE</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                </tr>
                <tr>
                    <th><form action="file_list.php"><button type="submit">Load Images</button></form></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_POST["submit"])) {include 'file_list.php';}
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>