<?php
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserData($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function placeBet($pdo, $user_id, $bet_type, $bet_value, $amount) {
    error_log("Attempting to place bet - User: $user_id, Type: $bet_type, Value: $bet_value, Amount: $amount");
    
    $user = getUserData($pdo, $user_id);
    if ($user['balance'] < $amount) {
        error_log("Insufficient balance");
        return false;
    }

    // Deduct balance
    $new_balance = $user['balance'] - $amount;
    $stmt = $pdo->prepare("UPDATE users SET balance = ? WHERE id = ?");
    $stmt->execute([$new_balance, $user_id]);

    // Insert bet
    $stmt = $pdo->prepare("INSERT INTO bets (user_id, bet_type, bet_value, amount) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$user_id, $bet_type, $bet_value, $amount]);

    error_log("Bet placement " . ($result ? "succeeded" : "failed"));
    return $result;
}

function spinRoulette($pdo) {
    $winning_number = rand(0, 36);
    $winning_color = ($winning_number == 0) ? 'green' : (($winning_number % 2 == 0) ? 'black' : 'red');

    // Store result
    $stmt = $pdo->prepare("INSERT INTO game_results (winning_number, winning_color) VALUES (?, ?)");
    $stmt->execute([$winning_number, $winning_color]);
    $game_id = $pdo->lastInsertId();

    // Process unresolved bets
    $stmt = $pdo->prepare("SELECT * FROM bets WHERE result IS NULL");
    $stmt->execute();
    $bets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($bets as $bet) {
        $payout = 0;
        $result = 'lose';

        if ($bet['bet_type'] == 'number' && $bet['bet_value'] == $winning_number) {
            $payout = $bet['amount'] * 35;
            $result = 'win';
        } elseif ($bet['bet_type'] == 'color') {
            if (strtolower($bet['bet_value']) === $winning_color) {
                $payout = $bet['amount'] * 2;
                $result = 'win';
            }
        }

        $stmt = $pdo->prepare("UPDATE bets SET result = ?, payout = ?, game_id = ? WHERE id = ?");
        $stmt->execute([$result, $payout, $game_id, $bet['id']]);

        if ($payout > 0) {
            $stmt = $pdo->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
            $stmt->execute([$payout, $bet['user_id']]);
        }
    }

    return [
        'number' => $winning_number,
        'color' => $winning_color,
        'game_id' => $game_id
    ];
}

function getBetHistory($pdo, $user_id) {
    $stmt = $pdo->prepare("SELECT * FROM bets WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getGameHistory($pdo, $limit = 10) {
    $limit = (int)$limit;
    $stmt = $pdo->prepare("SELECT * FROM game_results ORDER BY created_at DESC LIMIT :limit");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
