<?php
    if (isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>document.getElenmentById('error-message').innerHTML = 'File is not IMAGE';</script>";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 100000000) {
            echo "<script>document.getElementById('error-message').innerHTML = 'ფაილი ძალიან დიდია.';</script>";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>document.getElementById('error-message').innerHTML = 'მხოლოდ JPG, JPEG, PNG და GIF ფაილების ატვირთვაა შესაძლებელი.';</script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>document.getElementById('error-message').innerHTML = 'ფაილი არ აიტვირთა.';</script>";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<script>alert('ფაილი " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " აიტვირთა.'); window.location.href='upload.html';</script>";
            } else {
                echo "<script>document.getElementById('error-message').innerHTML = 'ფაილის ატვირთვისას მოხდა შეცდომა.';</script>";
            }
        }
    }
?>