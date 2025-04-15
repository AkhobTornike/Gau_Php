    <?php
    session_start();

    $target_dir = $_POST['uploadFolder']; // ვიღებთ არჩეულ დირექტორიას
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 1;
        }
    }

    if (file_exists($target_file)) {
        $uploadOk = 0;
        $_SESSION['success_message'] = "სამწუხაროდ, ფაილი უკვე არსებობს.";
        header("Location: index.php");
        exit;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
        $_SESSION['error_message'] = 'სამწუხაროდ, ფაილი ძალიან დიდია. (მაქსიმალური ზომა 10მგ)';
        header("Location: index.php");
        exit;
    }

    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "txt" && $fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        $uploadOk = 0;
        $_SESSION['error_message'] = 'სამწუხაროდ, მხოლოდ (JPG, JPEG, PNG, GIF, TXT, PDF, DOC & DOCX) ფაილების ტიპებია დაშვებული.';
        header("Location: index.php");
        exit;
    }

    if ($uploadOk == 0) {
        $_SESSION['error_message'] = 'თქვენი ფაილი არ აიტვირთა.';
        header("Location: index.php");
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['success_message'] = "ფაილი '" . basename($_FILES["fileToUpload"]["name"]) . "' აიტვირთა.";
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error_message'] = 'სამწუხაროდ, ფაილის ატვირთვისას შეცდომა მოხდა.';
            header("Location: index.php");
            exit;
        }
    }
    ?>