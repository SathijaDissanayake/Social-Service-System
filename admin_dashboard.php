<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Admin Dashboard</h2>

<a href="home.php">Home</a> |
<a href="admin_services.php">Manage Services</a> |
<a href="admin_applications.php">Applications</a> |
<a href="logout.php">Logout</a>

</div>

</body>
</html>