<?php 
// Database configuration
  define('DB_HOST', 'localhost');
  define('DB_USER', 'TOKO');
  define('DB_PASS', '');
  define('DB_NAME', 'roulette_game');

// Start session
  session_start();

// Create database connection
  try {
       $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
	  die("Connection failed: " . $e ->getMessage());
  }

// Include functions
  require_once 'functions.php';
?>
