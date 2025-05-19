<?php 
require_once '../includes/config.php';

if (!isLoggedIn()) {
	header("Location: login.php");
	exit();
}

$user = getUserData($pdo, $_SESSION['user_id']);
$betHistory = getBetHistory($pdo, $user['id']);

include '../includes/header.php';
?>
<div class="container">
    <h2>Your Betting History</h2>
    <div class="balance">Balance: $<?php echo number_format($user['balance'], 2); ?></div>
    
    <table class="bet-history">
        <thead>
            <tr>
                <th>Date</th>
                <th>Bet Type</th>
                <th>Bet Value</th>
                <th>Amount</th>
                <th>Result</th>
                <th>Payout</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($betHistory as $bet): ?>
                <tr>
                    <td><?php echo date('Y-m-d H:i', strtotime($bet['created_at'])); ?></td>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
