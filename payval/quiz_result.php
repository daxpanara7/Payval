l<?php
include_once("auth.php");
include_once("database.php");

if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $score = 0;

    foreach ($_POST as $key => $value) {
        if (substr($key, 0, 1) === 'q') {
            $questionId = substr($key, 1);
            $selectedOption = intval($value);

            // Retrieve the correct option from the database
            $query = "SELECT correct_option FROM questions WHERE id = '$questionId'";
            $result = mysqli_query($connection, $query);

            if ($result && mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $correctOption = intval($row['correct_option']);  // Correct option fetched from DB

                // Check if the selected option is correct
                $isCorrect = ($selectedOption === $correctOption) ? 1 : 0;
                $score += $isCorrect;

                // Insert the answer into the database
                $insertQuery = "INSERT INTO user_answers (user_id, question_id, selected_option, is_correct) 
                                VALUES ('$userId', '$questionId', '$selectedOption', '$isCorrect')";
                mysqli_query($connection, $insertQuery);
            }
        }
    }

    // Redirect to the result screen
    header("Location: result_screen.php?score=$score");
    exit();
}
?>
