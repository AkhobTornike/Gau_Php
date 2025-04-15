<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3>აირჩიეთ ფაილი ასატვირთად</h3>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <hr>
        <select name="uploadFolder">
            <option value="uploads/">აირჩიეთ დირექტორია</option>
            <?php
            function displayFolders($dir) {
                $folders = glob($dir . '*', GLOB_ONLYDIR);
                foreach ($folders as $folder) {
                    echo "<option value='" . $folder . "/'>" . basename($folder) . "</option>";
                    displayFolders($folder . '/'); // რეკურსიული გამოძახება
                }
            }
            displayFolders('uploads/');
            ?>
        </select>
        <input type="submit" value="ატვირთვა" name="submit">
    </form>
    <hr>

    <form action="create_folder.php" method="post">
        <select name="parentFolder">
            <option value="uploads/">მთავარი დირექტორია</option>
            <?php
            displayFolders('uploads/');
            ?>
        </select>
        <input type="text" name="folderName" id="folderName">
        <input type="submit" value="შექმნა" name="submit">
    </form>
    <hr>
    <?php
    session_start();
    if (isset($_SESSION['error_message'])) {
        echo '<p class="error-message">' . $_SESSION['error_message'] . "</p>";
        unset($_SESSION['error_message']);
        echo "<hr>";
    }
    if (isset($_SESSION['success_message'])) {
        echo '<p class="success_message">' . $_SESSION['success_message'] . "</p>";
        unset($_SESSION['success_message']);
    }
    ?>
    <hr>

    <div class="container">
        <?php
        $folderToDisplay = 'uploads/';
        $parentFolder = null;
        if (isset($_GET['folder'])) {
            $folderToDisplay = $_GET['folder'];
            $parentFolder = dirname(rtrim($_GET['folder'], '/')) . '/';
            if ($parentFolder == './uploads/') {
                $parentFolder = 'uploads/';
            }
        }

        if ($folderToDisplay != 'uploads/') {
            echo "<form action='index.php' method='get'>";
            echo "<input type='hidden' name='folder' value='" . $parentFolder . "'>";
            echo "<button type='submit'>უკან დაბრუნება</button>";
            echo "</form>";
        }

        $files = glob($folderToDisplay . '*');

        echo "<ul>";
        foreach ($files as $file) {
            $fileName = basename($file);
            $fileSize = filesize($file);
            $fileType = mime_content_type($file);
            $isImage = strpos($fileType, 'image/') !== false;
            echo "<li>";
            echo $fileName . "(" . $fileSize . "bytes, " . $fileType . ")";
            if ($isImage) {
                echo "<img src='" . $file . "' alt='" . $fileName . "' class='image' />";
            }
            echo "<form action='actions.php' method='get'>";
            if (is_dir($file)) {
                echo "<input type='hidden' name='folder' value='" . $file . "/'>";
                echo "<button type='submit' name='open'>გახსნა</button>";
                echo "<input type='hidden' name='file' value='" . $fileName . "'>";
                echo "<button type='submit' name='delete'>წაშლა</button>";
            } else {
                echo "<input type='hidden' name='file' value='" . $fileName . "'>";
                echo "<button type='submit' name='delete'>წაშლა</button>";
                echo "<button type='submit' name='open'>გახსნა</button>";
            }

            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
        ?>
    </div>
</body>
</html>