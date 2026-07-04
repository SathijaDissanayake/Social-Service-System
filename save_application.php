<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$service_id = $_POST['service_id'];
$reason = $_POST['reason'];

$sql = "INSERT INTO applications (user_id, service_id, reason, status)
        VALUES ('$user_id', '$service_id', '$reason', 'Pending')";

$conn->query($sql);

header("Location: my_applications.php");
exit();
?>