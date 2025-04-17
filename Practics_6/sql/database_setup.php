<?php
include("../db_connection.php");

if ($conn) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database Setup</title>
        <style>
            body { font-family: sans-serif; margin: 20px; }
            .message { margin-bottom: 10px; font-weight: bold; }
            .success { color: green; }
            .error { color: red; }
            #progress-container { margin-top: 20px; border: 1px solid #ccc; padding: 15px; border-radius: 5px; }
            #progress-output { margin-top: 10px; }
            .step-message { margin-bottom: 5px; }
        </style>
    </head>
    <body>
        <h1>Database Setup Progress</h1>
        <div id="progress-container">
            <p>Setting up the database...</p>
            <div id="progress-output"></div>
        </div>

        <script>
            const progressOutput = document.getElementById('progress-output');
            let delay = 1000; // 1 second delay

            async function executeSqlFiles(type, directory, description) {
                const response = await fetch(`get_sql_files.php?type=${type}&directory=${directory}`);
                const files = await response.json();

                for (const file of files) {
                    await displayMessage(`Executing ${description} from ${file}...`);
                    await delayPromise(delay);
                    const result = await executeSql(type, directory, file);
                    await displayMessage(result);
                    await delayPromise(delay);
                }
                await displayMessage(`<p class="message success">All ${description} executed.</p>`);
                await delayPromise(delay);
            }

            async function executeSql(type, directory, file) {
                const response = await fetch('execute_sql.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `type=${type}&directory=${directory}&file=${file}`,
                });
                return await response.text();
            }

            async function displayMessage(message) {
                let messageClass = '';
                if (message.includes('successfully')) {
                    messageClass = 'success';
                } else if (message.includes('Error')) {
                    messageClass = 'error';
                }
                progressOutput.innerHTML += `<p class="step-message ${messageClass}">${message}</p>`;
                progressOutput.scrollTop = progressOutput.scrollHeight;
            }

            function delayPromise(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            async function setupDatabase() {
                await executeSqlFiles('create', 'sql/create_table/', 'CREATE TABLE scripts');
                await displayMessage('Executing CREATE PROCEDURE script...');
                await delayPromise(delay);
                const procedureResult = await fetch('sql/create_procedure.php'); // Fetch the PHP script output
                const procedureText = await procedureResult.text();
                await displayMessage(procedureText);
                await delayPromise(delay);

                await executeSqlFiles('insert', 'sql/insert_data/', 'INSERT INTO scripts');
                await displayMessage('<p class="message" style="font-weight: bold;">Database setup complete. You can now return to the main page.</p>');
            }

            setupDatabase();
        </script>
    </body>
    </html>
    <?php
    $conn->close();
} else {
    echo "<p style='color: red; font-weight: bold;'>Database connection failed.</p>";
}
?>