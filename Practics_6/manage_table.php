<?php
include("db_connection.php");

// Determine which table to manage
$table = $_GET['table'] ?? 'blog_categories';
$escapedTable = mysqli_real_escape_string($conn, $table);
$primaryKeyColumn = ''; // Will be determined dynamically

// Function to get all data
function getAll($conn, $table) {
    $sql = "SELECT * FROM " . mysqli_real_escape_string($conn, $table);
    $result = $conn->query($sql);
    return $result;
}

// Function to get the primary key column of a table
function getPrimaryKeyColumn($conn, $table) {
    $sql = "SHOW KEYS FROM " . mysqli_real_escape_string($conn, $table) . " WHERE Key_name = 'PRIMARY'";
    $result = $conn->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        return $row['Column_name'];
    }
    return null;
}

$primaryKeyColumn = getPrimaryKeyColumn($conn, $table);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $columns = [];
        $values = [];
        $placeholders = [];
        $types = '';
        $bindParams = [];

        $resultColumns = $conn->query("SHOW COLUMNS FROM " . $escapedTable);
        if ($resultColumns) {
            while ($column = $resultColumns->fetch_assoc()) {
                if ($column['Key'] !== 'PRI' && isset($_POST[$column['Field']])) {
                    $columns[] = $column['Field'];
                    $values[] = $_POST[$column['Field']];
                    $placeholders[] = '?';
                    $types .= 's'; // Treat all as string for simplicity
                    $bindParams[] = &$_POST[$column['Field']];
                }
            }

            if (!empty($columns)) {
                $sql = "INSERT INTO " . $escapedTable . " (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    array_unshift($bindParams, $types);
                    call_user_func_array([$stmt, 'bind_param'], $bindParams);
                    if ($stmt->execute()) {
                        header("Location: ?table=" . urlencode($table) . "&message=Record added successfully");
                        exit();
                    } else {
                        $errorMessage = "Error adding record: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $errorMessage = "Error preparing statement: " . $conn->error;
                }
            } else {
                $errorMessage = "No data to insert.";
            }
        }

    } elseif ($action === 'edit' && isset($_POST['id']) && $primaryKeyColumn) {
        $id = $_POST['id'];
        $setClauses = [];
        $types = '';
        $bindParams = [];

        $resultColumns = $conn->query("SHOW COLUMNS FROM " . $escapedTable);
        if ($resultColumns) {
            while ($column = $resultColumns->fetch_assoc()) {
                if ($column['Field'] !== $primaryKeyColumn && isset($_POST[$column['Field']])) {
                    $setClauses[] = $column['Field'] . " = ?";
                    $values[] = $_POST[$column['Field']];
                    $types .= 's'; // Treat all as string for simplicity
                    $bindParams[] = &$_POST[$column['Field']];
                }
            }

            if (!empty($setClauses)) {
                $sql = "UPDATE " . $escapedTable . " SET " . implode(', ', $setClauses) . " WHERE " . $primaryKeyColumn . " = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $types .= 's';
                    $bindParams[] = &$id;
                    array_unshift($bindParams, $types);
                    call_user_func_array([$stmt, 'bind_param'], $bindParams);
                    if ($stmt->execute()) {
                        header("Location: ?table=" . urlencode($table) . "&message=Record updated successfully");
                        exit();
                    } else {
                        $errorMessage = "Error updating record: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $errorMessage = "Error preparing statement: " . $conn->error;
                }
            } else {
                $errorMessage = "No data to update.";
            }
        }

    } elseif ($action === 'delete' && isset($_POST['id']) && $primaryKeyColumn) {
        $id = $_POST['id'];
        $sql = "DELETE FROM " . $escapedTable . " WHERE " . $primaryKeyColumn . " = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $id);
            if ($stmt->execute()) {
                header("Location: ?table=" . urlencode($table) . "&message=Record deleted successfully");
                exit();
            } else {
                $errorMessage = "Error deleting record: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errorMessage = "Error preparing statement: " . $conn->error;
        }
    }
}

// Fetch data for the selected table
$result = getAll($conn, $table);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage <?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $table))); ?></title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        thead {
            background-color: #007bff;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #e0f7fa;
        }
        .actions a, .actions form {
            display: inline-block;
            margin-right: 10px;
        }
        .actions a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            color: #fff;
        }
        .actions a:first-child {
            background-color: #28a745; /* Edit button color */
        }
        .actions a:first-child:hover {
            background-color: #1e7e34;
        }
        .actions form button {
            background-color: #dc3545; /* Delete button color */
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .actions form button:hover {
            background-color: #c82333;
        }
        .message {
            color: green;
            margin-top: 10px;
            font-weight: bold;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            font-weight: bold;
        }
        .add-new-form {
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        .add-new-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .add-new-form input[type="text"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .add-new-form button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .add-new-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
        .edit-form {
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        .edit-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .edit-form input[type="text"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .edit-form button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .edit-form button[type="submit"]:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-button">Back to Main</a>
        <h1>Manage <?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $table))); ?></h1>

        <?php if (isset($_GET['message'])): ?>
            <p class="message"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <p class="error-message"><?php echo htmlspecialchars($errorMessage); ?></p>
        <?php endif; ?>

        <h2>View Data</h2>
        <table>
            <thead>
                <tr>
                    <?php
                    if ($result && $row = $result->fetch_assoc()) {
                        foreach ($row as $key => $value) {
                            echo "<th>" . htmlspecialchars(ucfirst(str_replace('_', ' ', $key))) . "</th>";
                        }
                        echo "<th>Actions</th>";
                        $result->data_seek(0);
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            echo "<td>" . htmlspecialchars($value) . "</td>";
                        }
                        if ($primaryKeyColumn) {
                            echo "<td class='actions'>";
                            echo "<a href='?table=" . urlencode($table) . "&action=edit&id=" . htmlspecialchars($row[$primaryKeyColumn]) . "'>Edit</a>";
                            echo "<form method='post' style='display:inline;' onsubmit='return confirm(\"Are you sure?\");'>";
                            echo "<input type='hidden' name='action' value='delete'>";
                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row[$primaryKeyColumn]) . "'>";
                            echo "<button type='submit'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                        } else {
                            echo "<td>No actions available (primary key not found).</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='99'>No data found in " . htmlspecialchars($table) . ".</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Add New <?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $table))); ?></h2>
        <form method="post" class="add-new-form">
            <input type="hidden" name="action" value="add">
            <?php
            $resultColumns = $conn->query("SHOW COLUMNS FROM " . $escapedTable);
            if ($resultColumns) {
                while ($column = $resultColumns->fetch_assoc()) {
                    if ($column['Key'] !== 'PRI') {
                        echo "<label for='" . htmlspecialchars($column['Field']) . "'>" . htmlspecialchars(ucfirst(str_replace('_', ' ', $column['Field']))) . ":</label><br>";
                        echo "<input type='text' id='" . htmlspecialchars($column['Field']) . "' name='" . htmlspecialchars($column['Field']) . "'><br><br>";
                    }
                }
                echo "<button type='submit'>Add</button>";
            }
            ?>
        </form>

        <?php if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id']) && $primaryKeyColumn): ?>
            <h2>Edit <?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $table))); ?></h2>
            <?php
            $idToEdit = $_GET['id'];
            $sqlEdit = "SELECT * FROM " . $escapedTable . " WHERE " . $primaryKeyColumn . " = ?";
            $stmtEdit = $conn->prepare($sqlEdit);
            $stmtEdit->bind_param("s", $idToEdit);
            $stmtEdit->execute();
            $resultEdit = $stmtEdit->get_result();
            if ($rowToEdit = $resultEdit->fetch_assoc()):
            ?>
            <form method="post" class="edit-form">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($idToEdit); ?>">
                <?php foreach ($rowToEdit as $key => $value): ?>
                    <label for='<?php echo htmlspecialchars($key); ?>'><?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $key))); ?>:</label><br>
                    <input type='text' id='<?php echo htmlspecialchars($key); ?>' name='<?php echo htmlspecialchars($key); ?>' value='<?php echo htmlspecialchars($value); ?>'><br><br>
                <?php endforeach; ?>
                <button type="submit">Update</button>
            </form>
            <?php else: ?>
                <p>Record not found.</p>
            <?php endif; ?>
            <?php $stmtEdit->close(); ?>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>