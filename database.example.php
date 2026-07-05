<?php

$host = "localhost";
$user = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$dbname = "online_social_service";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connection failed");
}