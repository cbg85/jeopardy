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
    $_SESSION['score'] += $points;
    $result = "Correct!";
} else {
    $result = "Incorrect. The correct answer was: " . $questions[$category][$points]['answer'];
}

// Check if all questions are used
$totalQuestions = 20; // 5 categories * 4 questions each
if (count($_SESSION['used']) == $totalQuestions) {
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
    <h2>Your Score: <?php echo $_SESSION['score']; ?> points</h2>
    <a href="game.php" class="button">Next Question</a>
</body>
</html>