<?php 
require_once '../includes/config.php';

if (isLoggedIn()) {
	header("location: dashboard.php");
	exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$confirm_password = ($_POST['confirm_password']);

	if (empty($username) || empty($email) || empty($password)) {
		$error = 'Please fill all fields';
	} elseif ($password !== $confirm_password) {
		$error = 'Passwords do not match';
	} else {
		// Check if username or email exists
		$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
		$stmt->execute([$username, $email]);

		if ($stmt->rowCount() > 0) {
			$error = 'Username or email already exists';
		} else {
			// Create new user
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

			if ($stmt->execute([$username, $email, $hashed_password])) {
				$_SESSION['success'] = 'Registration successful. Please login.';
				header("Location: login.php");
				exit();
			} else {
				$error = 'Registration failed. Please try again.';
			}
		}
	}
}

include '../includes/header.php';
?>


<div class="container">
	<h2>Register</h2>

	<?php if ($error): ?>
		<div class="error"><?php echo $error; ?></div>
	<?php endif; ?>

	<form method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" required>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" required>
		</div>
		<div class="form-group">
			<label for="confirm_password">Confirm Password</label>
			<input type="password" name="confirm_password" id="confirm_password" required>
		</div>
		<button type="submit">Register</button>
	</form>

	<p>Already have an account? <a href="login.php">Login here</a></p>
</div>

<?php include '../includes/footer.php'; ?>
