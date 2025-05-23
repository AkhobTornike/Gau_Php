<?php 
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'roulette_game');
define('DB_CHARSET', 'utf8mb4');
define('TABLE_PREFIX', ''); // Can be used for multi-tenant setups

// Environment configuration (development/production)
define('ENVIRONMENT', 'development'); // Change to 'production' in live environment

// Error reporting based on environment
if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Start session with enhanced security
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => ENVIRONMENT === 'production',
    'use_strict_mode' => true
]);

// Create database connection and initialize database
try {
    // First connect without selecting a database to create it if needed
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";charset=".DB_CHARSET, 
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    
    // Verify MySQL version (5.7+ required for full functionality)
    $mysqlVersion = $pdo->query('SELECT VERSION()')->fetchColumn();
    if (version_compare($mysqlVersion, '5.7.0', '<')) {
        die("MySQL 5.7 or higher is required. Your version: $mysqlVersion");
    }
    
    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `".DB_NAME."` CHARACTER SET ".DB_CHARSET);
    
    // Now connect to the specific database
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    
    // Create tables if they don't exist
    $tablePrefix = TABLE_PREFIX;
    
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `{$tablePrefix}users` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(50) NOT NULL UNIQUE,
            `email` VARCHAR(100) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `balance` DECIMAL(10,2) DEFAULT 100.00,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX `idx_username` (`username`),
            INDEX `idx_email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET."
    ");
    
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `{$tablePrefix}bets` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT NOT NULL,
            `game_id` INT NOT NULL,
            `bet_type` ENUM('number', 'color') NOT NULL,
            `bet_value` VARCHAR(20) NOT NULL,
            `amount` DECIMAL(10,2) NOT NULL,
            `result` VARCHAR(20) DEFAULT NULL,
            `payout` DECIMAL(10,2) DEFAULT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (`user_id`) REFERENCES `{$tablePrefix}users`(`id`) ON DELETE CASCADE,
            INDEX `idx_user_id` (`user_id`),
            INDEX `idx_game_id` (`game_id`),
            INDEX `idx_created_at` (`created_at`)
        ) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET."
    ");
    
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `{$tablePrefix}game_results` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `winning_number` INT NOT NULL,
            `winning_color` VARCHAR(10) NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX `idx_created_at` (`created_at`)
        ) ENGINE=InnoDB DEFAULT CHARSET=".DB_CHARSET."
    ");
    
    // Create a default admin user if no users exist (for initial setup)
    $stmt = $pdo->query("SELECT COUNT(*) FROM `{$tablePrefix}users`");
    if ($stmt->fetchColumn() === 0) {
        $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $pdo->exec("
            INSERT INTO `{$tablePrefix}users` 
            (`username`, `email`, `password`, `balance`) 
            VALUES 
            ('admin', 'admin@example.com', '$hashedPassword', 1000.00)
        ");
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Include functions
require_once 'functions.php';

// Helper function to get PDO instance
function getDBConnection() {
    global $pdo;
    return $pdo;
}
?>