<!-- final.php -->
<?php
session_start();
$finalScore = $_SESSION['score'];
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Score</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Game Over!</h1>
    <h2>Your Final Score: <?php echo $finalScore; ?> points</h2>
    <a href="index.html" class="button">Play Again</a>
</body>
</html>