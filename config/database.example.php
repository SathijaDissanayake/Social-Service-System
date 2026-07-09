<?php

$host = "localhost";
$user = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$database = "social_service_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed");
}

?>
