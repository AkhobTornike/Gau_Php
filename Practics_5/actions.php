<?php
if (isset($_GET['delete']) && isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = "uploads/" . $file;
    if (file_exists($filePath)) {
        if (is_dir($filePath)) {
            // თუ ფაილი არის დირექტორია, წაშალე ყველა შიგთავსი
            $files = glob($filePath . '/*');
            foreach ($files as $fileToDelete) {
                if (is_dir($fileToDelete)) {
                    // თუ ქვედირექტორიაა, წაშალე რეკურსიულად
                    deleteDirectory($fileToDelete);
                } else {
                    unlink($fileToDelete);
                }
            }
            rmdir($filePath); // წაშალე ცარიელი დირექტორია
        } else {
            unlink($filePath); // წაშალე ფაილი
        }
    }
    header("Location: index.php");
    exit;
}

if (isset($_GET['open']) && isset($_GET['folder'])) {
    header("Location: index.php?folder=" . urlencode($_GET['folder']));
    exit;
}

if (isset($_GET['open']) && isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = "uploads/" . $file;
    if (file_exists($filePath) && is_file($filePath)) {
        $fileType = mime_content_type($filePath);
        if (strpos($fileType, 'image/') !== false) {
            header("Content-Type: " . $fileType);
            readfile($filePath);
        } else {
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: inline; filename=\"" . $file . "\"");
            readfile($filePath);
        }
    } else {
        echo "ფაილი არ არსებობს.";
    }
    exit;
}

// ფუნქცია დირექტორიის რეკურსიულად წასაშლელად
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
?>