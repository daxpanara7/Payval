<?php
include_once("auth.php");

if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

$score = isset($_GET['score']) ? intval($_GET['score']) : 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <link rel="stylesheet" href="css/style.css">
</head>
    <h1>Quiz Result</h1>
    <h3>Your score: <?php echo $score; ?></h3>
    <button><a href="screen2.php">Start New Quiz</a></button>
    <button><a href="http://localhost/payval/screen3.php?technology=css">ReStart Quiz</a></button>
    <script src="js/script.js"></script>
</body>
</html>
