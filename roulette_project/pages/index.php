<?php
require_once '../includes/config.php';

include '../includes/header.php';
?>

<div class="container">
    <div class="hero">
        <h1>Welcome to Roulette Bookmaker</h1>
        <p>Test your luck and strategy with our virtual roulette game</p>
        
        <?php if (!isLoggedIn()): ?>
            <div class="auth-buttons">
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Register</a>
            </div>
        <?php else: ?>
            <a href="dashboard.php" class="btn">Go to Dashboard</a>
        <?php endif; ?>
    </div>
    
    <div class="features">
        <div class="feature">
            <h3>Realistic Roulette</h3>
            <p>Experience the thrill of a real roulette wheel with our realistic simulation.</p>
        </div>
        <div class="feature">
            <h3>Secure Betting</h3>
            <p>Your account and transactions are securely protected.</p>
        </div>
        <div class="feature">
            <h3>Track Your History</h3>
            <p>View your betting history and analyze your strategies.</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>