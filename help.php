<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Help</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Help Page</h2>

<p>
This is a simple Social Service System.
Users can apply for services and admins can manage them.
</p>

<a href="home.php">Back Home</a>

</div>

</body>
</html>