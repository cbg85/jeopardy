<!-- answer.php -->
<?php
session_start();
include 'questions.php';

$answer = trim(strtolower($_POST['answer']));
$category = $_SESSION['current']['category'];
$points = $_SESSION['current']['points'];
$correctAnswer = strtolower($questions[$category][$points]['answer']);
$key = $category . '-' . $points;
$_SESSION['used'][] = $key;

if ($answer == strtolower($correctAnswer)) {
    if ($_SESSION['turn'] == 1) {
        $_SESSION['score1'] += $points;
        $result = "Correct!";
    } else {
        $_SESSION['score2'] += $points;
        $result = "Correct!";
    }
} else {
    $result = "Incorrect. The correct answer was: " . $questions[$category][$points]['answer'];
}

// Switch turns
$_SESSION['turn'] = ($_SESSION['turn'] == 1) ? 2 : 1;

// Check if game is over
if (count($_SESSION['used']) == 20) {
    header('Location: final.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer Feedback</title>
    <link rel="stylesheet" href="jstyles.css">
</head>
<body>
    <h1><?php echo $result; ?></h1>
    <h2><?php echo $_SESSION['player1'] . ": " . $_SESSION['score1'] . " pts | " . $_SESSION['player2'] . ": " . $_SESSION['score2'] . " pts"; ?></h2>
    <a href="game.php" class="button">Next Question</a>
</body>
</html>