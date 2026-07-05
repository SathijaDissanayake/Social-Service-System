<?php
session_start();
include("database.php");

if (isset($_SESSION['user'])) {
    if (($_SESSION['role'] ?? '') === 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: home.php");
    }
    exit();
}

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == "admin") {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: home.php");
        }
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Sign In</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>

<h2>Online Social Service Management System</h2>

</header>

<div class="container">

<h3>Sign In</h3>

<form method="POST">

Username

<input type="text" name="username" required>

Password

<input type="password" name="password" required>

<br><br>

<button name="login">Sign In</button>

</form>

<p class="auth-links">
    Don't have an account? <a href="signup.php">Sign Up</a>
    <br>
    <a href="index.php">Back to Welcome</a>
</p>

<br>

<p>

Admin Login

<br>

Username : admin

<br>

Password : admin123

</p>

<p>

User Login

<br>

Username : uoc

<br>

Password : uoc

</p>

</div>

</body>

</html>