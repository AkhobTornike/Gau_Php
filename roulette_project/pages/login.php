<?php
require_once '../includes/config.php';

if (isLoggedIn()) {
	header("Location: dashboard.php");
	exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = trim($_POST['username']);
	$password = $_POST['password'];

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->execute([$username]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($user && password_verify($password, $user['password'])) {
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['username'] = $user['username'];

		header("Location: dashboard.php");
		exit();
	} else {
		$error = "Invalid username or password";
	}
}

include '../includes/header.php';
?>

<div class="container">
	<h2>Login</h2>
	<?php if (isset($_SESSION['success'])): ?>
		<div class="success"?<?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
	<?php endif; ?>
	
	<?php if ($error): ?>
		<div class="error"><?php echo $error; ?></div>
	<?php endif; ?>

	<form method="post">
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required>
		</div>
		
		<button type="submit">Login</button>
	</form>
	<p>Don't have an account? <a href="register.php">Register here</a></p>
</div>

<?php include '../includes/footer.php'; ?>
