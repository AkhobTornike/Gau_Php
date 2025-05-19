<?php
require_once '../includes/config.php';

if (!isLoggedIn() || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$allBets = $pdo->query("SELECT bets.*, users.username FROM bets JOIN users ON bets.user_id = users.id ORDER BY bets.created_at DESC")->fetchAll();
$gameResults = $pdo->query("SELECT * FROM game_results ORDER BY created_at DESC")->fetchAll();
$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();

include '../includes/header.php';
?>

<div class="container">
    <h2>Admin Dashboard</h2>
    
    <div class="admin-tabs">
        <button class="tab-btn active" data-tab="bets">All Bets</button>
        <button class="tab-btn" data-tab="results">Game Results</button>
        <button class="tab-btn" data-tab="users">Users</button>
    </div>
    
    <div id="bets" class="tab-content active">
        <h3>All Bets</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Amount</th>
                    <th>Result</th>
                    <th>Payout</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allBets as $bet): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($bet['username']); ?></td>
                        <td><?php echo ucfirst($bet['bet_type']); ?></td>
                        <td><?php echo htmlspecialchars($bet['bet_value']); ?></td>
                        <td>$<?php echo number_format($bet['amount'], 2); ?></td>
                        <td class="<?php echo $bet['result']; ?>"><?php echo ucfirst($bet['result']); ?></td>
                        <td>
                            <?php if ($bet['payout'] > 0): ?>
                                +$<?php echo number_format($bet['payout'], 2); ?>
                            <?php else: ?>
                                -$<?php echo number_format($bet['amount'], 2); ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date('Y-m-d H:i', strtotime($bet['created_at'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div id="results" class="tab-content">
        <h3>Game Results</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Color</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gameResults as $result): ?>
                    <tr>
                        <td><?php echo $result['winning_number']; ?></td>
                        <td class="<?php echo $result['winning_color']; ?>"><?php echo ucfirst($result['winning_color']); ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($result['created_at'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div id="users" class="tab-content">
        <h3>Users</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Joined</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>$<?php echo number_format($user['balance'], 2); ?></td>
                        <td><?php echo date('Y-m-d', strtotime($user['created_at'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Remove active class from all buttons and content
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        
        // Add active class to clicked button and corresponding content
        this.classList.add('active');
        document.getElementById(this.dataset.tab).classList.add('active');
    });
});
</script>

<?php include '../includes/footer.php'; ?>