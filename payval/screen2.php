<?php
include_once("auth.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    logout();
}

if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Technology Selection</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="post">
        <input type="hidden" name="logout" value="true">
        <!-- <button type="submit">Logout</button> -->
    </form>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?></h1>
    <ul>
        <li><a href="screen3.php?technology=html">HTML</a></li><br>
        <li><a href="screen3.php?technology=css">CSS</a></li><br>
        <li><a href="screen3.php?technology=javascript">JavaScript</a></li>
    </ul>
    <script src="js/script.js"></script>
</body>
</html>



