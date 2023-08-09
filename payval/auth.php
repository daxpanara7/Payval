<?php
session_start();

include_once("database.php");

function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($username, $password) {
    global $connection;

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT id, username FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        return true;
    }

    return false;
}

function logout() {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

?>
