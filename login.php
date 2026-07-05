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

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

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
    } else {
        $error = "Invalid username or password.";
    }
}

$pageTitle = 'Sign In';
$bodyClass = 'auth-body';
include 'includes/header.php';
?>

<div class="card card-narrow card-glow">
    <div class="card-header">
        <h1 class="page-title">Sign In</h1>
        <p class="page-subtitle">Welcome back! Enter your credentials to continue.</p>
    </div>

    <?php if ($error !== "") { ?>
        <p class="error-msg"><?php echo htmlspecialchars($error); ?></p>
    <?php } ?>

    <form method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" name="login" class="btn-block">Sign In →</button>
    </form>

    <p class="auth-links">
        Don't have an account? <a href="signup.php">Create one free</a><br>
        <a href="index.php">← Back to Welcome</a>
    </p>

    <div class="info-box">
        <strong>🔑 Demo Accounts</strong>
        Admin — <code>admin</code> / <code>admin123</code><br>
        User — <code>uoc</code> / <code>uoc</code>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
