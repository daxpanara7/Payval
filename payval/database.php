<?php
$connection = mysqli_connect("localhost", "root", "", "payval");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
