<!-- game.php -->
<?php
session_start();
include 'questions.php';
if (!isset($_SESSION['used'])) {
    $_SESSION['used'] = [];
    $_SESSION['score'] = 0;
}
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
    <h2>Score: <?php echo $_SESSION['score']; ?> points</h2>

    <table align="center">
        <tr>
            <?php foreach ($questions as $category => $points) { echo "<th>$category</th>"; } ?>
        </tr>

        <?php for ($value = 100; $value <= 400; $value += 100) { ?>
            <tr>
                <?php foreach ($questions as $category => $pointSet) {
                    $key = $category . '-' . $value;
                    if (in_array($key, $_SESSION['used'])) {
                        echo '<td style="background-color: gray;">Used</td>';
                    } else {
                        echo '<td><a href="question.php?category=' . urlencode($category) . '&points=' . $value . '">$' . $value . '</a></td>';
                    }
                } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
