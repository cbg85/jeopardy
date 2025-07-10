<!-- question.php -->
<?php
session_start();
include 'questions.php';

$category = $_GET['category'];
$points = $_GET['points'];
$question = $questions[$category][$points]['question'];
$_SESSION['current'] = ['category' => $category, 'points' => $points];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy Question</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?php echo "$category for \$$points"; ?></h1>
    <p><?php echo $question; ?></p>

    <form action="answer.php" method="post">
        <input type="text" name="answer" required>
        <br><br>
        <button type="submit" class="button">Submit Answer</button>
    </form>
</body>
</html>
