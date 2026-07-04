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
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['fullname'] ?? $_SESSION['user']); ?> 👋</h2>

    <a href="apply_service.php">Apply for Service</a> |
    <a href="my_applications.php">My Applications</a> |
    <a href="help.php">Help</a>
    <?php if (($_SESSION['role'] ?? '') === 'admin') { ?> |
    <a href="admin_dashboard.php">Admin Dashboard</a>
    <?php } ?> |
    <a href="logout.php">Logout</a>
</div>

</body>
</html>