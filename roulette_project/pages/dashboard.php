<?php
require_once '../includes/config.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$user = getUserData($pdo, $_SESSION['user_id']);
$gameHistory = getGameHistory($pdo, 10);

include '../includes/header.php';
?>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>
    <div class="balance">Balance: $<?php echo number_format($user['balance'], 2); ?></div>
    
    <div class="dashboard-grid">
        <div class="card">
            <h3>Place a Bet</h3>
            <p>Try your luck on the roulette wheel</p>
            <a href="bet.php" class="btn">Go to Betting</a>
        </div>
        
        <div class="card">
            <h3>Betting History</h3>
            <p>View your previous bets</p>
            <a href="history.php" class="btn">View History</a>
        </div>
    </div>
    
    <div class="recent-results">
        <h3>Recent Game Results</h3>
        <div class="results-grid">
            <?php foreach ($gameHistory as $game): ?>
                <div class="result-number <?php echo $game['winning_color']; ?>">
                    <?php echo $game['winning_number']; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>