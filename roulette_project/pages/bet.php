<?php
require_once '../includes/config.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$user = getUserData($pdo, $_SESSION['user_id']);
$error = '';
$success = '';
$result = null;
$latestBet = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bet_type = $_POST['bet_type'];
    $bet_value = ($bet_type == 'color') ? strtolower($_POST['color_choice']) : $_POST['bet_value'];
    $amount = floatval($_POST['amount']);

    if ($amount <= 0) {
        $error = 'Bet amount must be positive.';
    } elseif ($amount > $user['balance']) {
        $error = 'Insufficient balance.';
    } elseif ($bet_type === 'color' && !in_array($bet_value, ['red', 'black', 'green'])) {
        $error = 'Invalid color selected.';
    } else {
        if (placeBet($pdo, $user['id'], $bet_type, $bet_value, $amount)) {
            $result = spinRoulette($pdo);
            $success = 'Bet placed successfully!';
            $latestBet = $pdo->query("SELECT * FROM bets WHERE user_id = {$_SESSION['user_id']} ORDER BY id DESC LIMIT 1")->fetch();
        } else {
            $error = 'Failed to place bet.';
        }
    }

    $user = getUserData($pdo, $_SESSION['user_id']); // Update balance after bet
}

include '../includes/header.php';
?>

<div class="container">
    <h2>Place Your Bet</h2>
    <div class="balance">Balance: $<?php echo number_format($user['balance'], 2); ?></div>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <?php if ($result && $latestBet): ?>
        <div class="roulette-result">
            <h3>Your Bet</h3>
            <p>
                Type: <strong><?php echo ucfirst($latestBet['bet_type']); ?></strong><br>
                Selection:
                <span class="<?php echo ($latestBet['bet_type'] === 'color') ? strtolower($latestBet['bet_value']) : ''; ?>">
                    <?php echo ucfirst($latestBet['bet_value']); ?>
                </span><br>
                Amount: <strong>$<?php echo number_format($latestBet['amount'], 2); ?></strong>
            </p>

            <h3>Roulette Result</h3>
            <div class="result-number <?php echo $result['color']; ?>">
                <?php echo $result['number']; ?>
            </div>
            <p>Winning color:
                <span class="<?php echo $result['color']; ?>"><?php echo ucfirst($result['color']); ?></span>
            </p>

            <div class="bet-result <?php echo $latestBet['result']; ?>">
                <?php if ($latestBet['result'] === 'win'): ?>
                    <p>You won! Payout: $<?php echo number_format($latestBet['payout'], 2); ?></p>
                <?php else: ?>
                    <p>You didn't win this time.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="betting-interface">
        <div class="roulette-wheel">
            <img src="../assets/images/roulette-wheel.png" alt="Roulette Wheel">
        </div>

        <div class="bet-form">
            <form method="post">
                <div class="form-group">
                    <label>Bet Type:</label>
                    <select name="bet_type" id="bet-type">
                        <option value="color">Color</option>
                        <option value="number">Number</option>
                    </select>
                </div>

                <div class="form-group" id="color-selection">
                    <label>Select Color:</label>
                    <div class="color-options">
                        <input type="radio" name="color_choice" id="color-red" value="red" checked>
                        <label for="color-red" class="color-btn red">Red</label>

                        <input type="radio" name="color_choice" id="color-black" value="black">
                        <label for="color-black" class="color-btn black">Black</label>

                        <input type="radio" name="color_choice" id="color-green" value="green">
                        <label for="color-green" class="color-btn green">Green</label>
                    </div>
                </div>

                <div class="form-group" id="number-selection" style="display: none;">
                    <label>Select Number (0-36):</label>
                    <input type="number" name="bet_value" id="number-value" min="0" max="36">
                </div>

                <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" name="amount" min="1" max="<?php echo $user['balance']; ?>" step="0.01" required>
                </div>

                <button type="submit" class="btn">Place Bet</button>
            </form>
        </div>
    </div>
</div>
<?php include '../includes/footer.php';
?>
<script>
document.getElementById('bet-type').addEventListener('change', function () {
    const isColor = this.value === 'color';
    document.getElementById('color-selection').style.display = isColor ? 'block' : 'none';
    document.getElementById('number-selection').style.display = isColor ? 'none' : 'block';
});

document.querySelectorAll('input[name="color_choice"]').forEach(radio => {
    radio.addEventListener('change', function () {
        document.getElementById('color-value').value = this.value;
    });
});
</script>
