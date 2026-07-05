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

$pageTitle = 'Sign Up';
$bodyClass = 'auth-body';
include 'includes/header.php';
?>

<div class="card card-narrow card-glow">
    <div class="card-header">
        <h1 class="page-title">Create Account</h1>
        <p class="page-subtitle">Join today and start applying for social services.</p>
    </div>

    <?php if ($error !== "") { ?>
        <p class="error-msg"><?php echo htmlspecialchars($error); ?></p>
    <?php } ?>

    <form method="POST">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Choose a unique username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a strong password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>
        </div>

        <button type="submit" name="signup" class="btn-block">Create Account →</button>
    </form>

    <p class="auth-links">
        Already have an account? <a href="login.php">Sign In</a><br>
        <a href="index.php">← Back to Welcome</a>
    </p>
</div>

<?php include 'includes/footer.php'; ?>
