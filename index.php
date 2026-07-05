<?php
session_start();

if (isset($_SESSION['user'])) {
    if (($_SESSION['role'] ?? '') === 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: home.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Online Social Service Management System</h2>
</header>

<div class="container auth-page">

    <h3>Welcome</h3>

    <p>Apply for social services or manage applications as an admin.</p>

    <div class="auth-actions">
        <a class="btn btn-primary" href="login.php">Sign In</a>
        <a class="btn btn-secondary" href="signup.php">Sign Up</a>
    </div>

    <p class="auth-note">Already have an account? Use Sign In. New here? Create an account with Sign Up.</p>

</div>

</body>
</html>
