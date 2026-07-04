<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$service_id = $_POST['service_id'];
$message = $_POST['message'];

$sql = "INSERT INTO applications (user, service_id, message, status)
        VALUES ('$user', '$service_id', '$message', 'Pending')";

$conn->query($sql);

header("Location: my_applications.php");
exit();
?>