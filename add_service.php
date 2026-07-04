<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Service</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add New Service</h2>

<a href="admin_services.php">Back</a>

<br><br>

<form action="save_service.php" method="POST">

    <label>Service Name</label>
    <input type="text" name="name" required>

    <br><br>

    <label>Description</label>
    <input type="text" name="description" required>

    <br><br>

    <button type="submit">Save Service</button>

</form>

</div>

</body>
</html>
