<?php
include("db_connection.php");

if ($conn) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database Management</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h1>Database Management</h1>

            <h2>Database Setup</h2>
            <p>Click the button below to run the database setup (create tables and insert data).</p>
            <form action="./sql/database_setup.php" method="get">
                <button type="submit" class="setup-button">Run Database Setup</button>
            </form>

            <hr>

            <h2>Manage Tables</h2>
            <div class="manage-links">
                <a href="manage_table.php?table=blog_categories">Manage Blog Categories</a>
                <a href="manage_table.php?table=products">Manage Products</a>
                <a href="manage_table.php?table=tags">Manage Tags</a>
                <a href="manage_table.php?table=users">Manage Users</a>
                <a href="manage_table.php?table=posts">Manage Posts</a>
                <a href="manage_table.php?table=comments">Manage Comments</a>
                <a href="manage_table.php?table=post_products">Manage Post Products</a>
                <a href="manage_table.php?table=post_tags">Manage Post Tags</a>
            </div>

            <hr>
        </div>
    </body>
    </html>
    <?php
    $conn->close();
} else {
    echo "<script> alert('Database connection failed.');</script>";
}
?>