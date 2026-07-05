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

$error = "";

if (isset($_POST['signup'])) {
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($fullname === "" || $username === "" || $password === "") {
        $error = "All fields are required.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username'");

        if (mysqli_num_rows($check) > 0) {
            $error = "Username already taken. Please choose another.";
        } else {
            $sql = "INSERT INTO users (fullname, username, password, role)
                    VALUES ('$fullname', '$username', '$password', 'user')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['id'] = mysqli_insert_id($conn);
                $_SESSION['user'] = $username;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['role'] = 'user';

                header("Location: home.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Online Social Service Management System</h2>
</header>

<div class="container auth-page">

    <h3>Create Account</h3>

    <?php if ($error !== "") { ?>
        <p class="error-msg"><?php echo htmlspecialchars($error); ?></p>
    <?php } ?>

    <form method="POST">

        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <br><br>

        <button type="submit" name="signup">Sign Up</button>

    </form>

    <p class="auth-links">
        Already have an account? <a href="login.php">Sign In</a>
        <br>
        <a href="index.php">Back to Welcome</a>
    </p>

</div>

</body>
</html>
