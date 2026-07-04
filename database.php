<?php

$host = "localhost";
$user = "root";
$password = "Kiriibba01@";
$database = "social_service_db";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn)
{
    die("Database Connection Failed");
}

?>