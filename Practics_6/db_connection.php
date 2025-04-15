<?php 
    $servername = "localhost";
    $username = "TOKO";
    $dbname = "PHP_Practics_6_ecommerce_blog_db";

    $conn = new mysqli($servername, "root", "", $dbname);

    if ($conn -> connect_error) {
        die ("Connection failed: " . $conn -> connect_error);
    }
    echo "Connected successfully<br>";
?>