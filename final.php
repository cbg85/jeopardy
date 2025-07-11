<!-- final.php -->
<?php
session_start();
$score1 = $_SESSION['score1'];
$score2 = $_SESSION['score2'];
$player1 = $_SESSION['player1'];
$player2 = $_SESSION['player2'];
session_destroy();

if ($score1 > $score2) {
    $winner = "$player1 Wins!";
} elseif ($score2 > $score1) {
    $winner = "$player2 Wins!";
} else {
    $winner = "It's a Tie!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Score</title>
    <link rel="stylesheet" href="jstyles.css">
</head>
<body>
    <h1>Game Over!</h1>
    <h2><?php echo "$player1: $score1 pts | $player2: $score2 pts"; ?></h2>
    <h2><?php echo $winner; ?></h2>
    <a href="jindex.html" class="button">Play Again</a>
</body>
</html>
