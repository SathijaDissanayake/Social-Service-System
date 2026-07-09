<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

if (isLoggedIn()) {
    if (isAdmin()) {
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
$brandTitle = 'Welcome Back!';
$brandSubtitle = 'Sign in to your account and continue accessing vital services and support.';

include 'includes/auth_header.php';
include 'includes/auth_brand_panel.php';
?>

        <div class="auth-card">
            <div class="auth-card-head">
                <h2>Sign In</h2>
                <span class="auth-card-underline"></span>
                <p>Enter your credentials to continue.</p>
            </div>

            <?php if ($error !== "") { ?>
                <div class="auth-error"><?php echo htmlspecialchars($error); ?></div>
            <?php } ?>

            <form method="POST">
                <div class="auth-field">
                    <label for="username">Username</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <button type="button" class="auth-toggle-pw" onclick="togglePassword('password', this)" aria-label="Toggle password">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="auth-row">
                    <label class="auth-remember">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    <a href="#" class="auth-forgot" onclick="alert('Please contact your administrator to reset your password.'); return false;">Forgot password?</a>
                </div>

                <button type="submit" name="login" class="auth-submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                    Sign In
                </button>
            </form>

            <p class="auth-switch">
                Don't have an account? <a href="signup.php">Create one free</a>
            </p>
        </div>

        <div class="auth-demo">
            <strong>Demo Accounts</strong>
            Admin — <code>admin</code> / <code>admin123</code> &nbsp;|&nbsp; User — <code>uoc</code> / <code>uoc</code>
        </div>

<?php include 'includes/auth_footer.php'; ?>
