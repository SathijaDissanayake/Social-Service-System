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
$brandTitle = 'Join Our Community!';
$brandSubtitle = 'Create your free account and start applying for food, medical, and education assistance today.';

include 'includes/auth_header.php';
include 'includes/auth_brand_panel.php';
?>

        <div class="auth-card">
            <div class="auth-card-head">
                <h2>Sign Up</h2>
                <span class="auth-card-underline"></span>
                <p>Fill in your details to create an account.</p>
            </div>

            <?php if ($error !== "") { ?>
                <div class="auth-error"><?php echo htmlspecialchars($error); ?></div>
            <?php } ?>

            <form method="POST">
                <div class="auth-field">
                    <label for="fullname">Full Name</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>
                </div>

                <div class="auth-field">
                    <label for="username">Username</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <input type="text" id="username" name="username" placeholder="Choose a username" required>
                    </div>
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Create a password" required>
                        <button type="button" class="auth-toggle-pw" onclick="togglePassword('password', this)" aria-label="Toggle password">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="auth-field">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>
                        <button type="button" class="auth-toggle-pw" onclick="togglePassword('confirm_password', this)" aria-label="Toggle password">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" name="signup" class="auth-submit">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Create Account
                </button>
            </form>

            <p class="auth-switch">
                Already have an account? <a href="login.php">Sign In</a>
            </p>
        </div>

<?php include 'includes/auth_footer.php'; ?>
