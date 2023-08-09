<?php
include_once("auth.php");


if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['technology'])) {
    header("Location: screen2.php");
    exit();
}

$technology = $_GET['technology'];

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo ucfirst($technology); ?> Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?php echo ucfirst($technology); ?> Quiz</h1>
   
    <form method="post" action="quiz_result.php">
        <?php
        include_once("database.php");

        // Retrieve questions for the selected technology
        $query = "SELECT * FROM questions WHERE technology = '$technology'";
        $result = mysqli_query($connection, $query);



        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row['question_text'] . "</p>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='1'>" . $row['option_1'] . "<br>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='2'>" . $row['option_2'] . "<br>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='3'>" . $row['option_3'] . "<br>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='4'>" . $row['option_4'] . "<br><br>";
        }
        ?>
        <div class="container">
            <div class="quiz">
                <div id="question" class="question"></div>
                <div id="options" class="options"></div>
                <button id="prev-button" class="button" >Previous</button>
                <button id="next-button" class="button">Next</button>
                <button id="skip-button" class="button">Skip</button>
                <button type="submit" class="button">Submit</button>
            </div>
        </div>
    </form>
    <script src="js/script.js"></script>
</body>
</html>
