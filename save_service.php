<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$name = $_POST['name'];
$description = $_POST['description'];

$sql = "INSERT INTO services (name, description) VALUES ('$name', '$description')";

$conn->query($sql);

header("Location: admin_services.php");
exit();
?>