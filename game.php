<!-- game.php -->
<?php
session_start();
include 'questions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['player1'] = $_POST['player1'];
    $_SESSION['player2'] = $_POST['player2'];
    $_SESSION['score1'] = 0;
    $_SESSION['score2'] = 0;
    $_SESSION['turn'] = 1; // Player 1 starts
    $_SESSION['used'] = [];
}

$player1 = $_SESSION['player1'] ?? 'Player 1';
$player2 = $_SESSION['player2'] ?? 'Player 2';
$score1 = $_SESSION['score1'] ?? 0;
$score2 = $_SESSION['score2'] ?? 0;
$turn = $_SESSION['turn'] ?? 1;
$currentPlayer = ($turn == 1) ? $player1 : $player2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy Game Board</title>
    <link rel="stylesheet" href="jstyles.css">
</head>
<body>
    <h1>Jeopardy Game Board</h1>
    <h2><?php echo "$player1: $score1 pts | $player2: $score2 pts"; ?></h2>
    <h3>Current Turn: <?php echo $currentPlayer; ?></h3>

    <table>
        <tr>
            <?php foreach ($questions as $category => $points) { echo "<th>$category</th>"; } ?>
        </tr>

        <?php for ($value = 100; $value <= 400; $value += 100) { ?>
            <tr>
                <?php foreach ($questions as $category => $pointSet) {
                    $key = $category . '-' . $value;
                    if (in_array($key, $_SESSION['used'])) {
                        echo '<td class="used">Used</td>';
                    } else {
                        echo '<td><a href="question.php?category=' . urlencode($category) . '&points=' . $value . '">$' . $value . '</a></td>';
                    }
                } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>