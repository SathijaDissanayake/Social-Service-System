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

$pageTitle = 'Welcome';
$bodyClass = 'auth-body';
include 'includes/header.php';
?>

<div class="card card-narrow card-glow">
    <div class="hero">
        <div class="hero-icon">🏛️</div>
        <h1>Welcome to Social Service Hub</h1>
        <p>Your gateway to food, medical, and education assistance — apply online in minutes.</p>
    </div>

    <div class="auth-actions">
        <a class="btn btn-primary" href="login.php">Sign In</a>
        <a class="btn btn-accent" href="signup.php">Sign Up</a>
    </div>

    <p class="auth-note">Already registered? <strong>Sign In</strong> to continue. New user? <strong>Sign Up</strong> to get started.</p>
</div>

<div class="feature-row">
    <div class="feature-pill">
        <span>📋</span>
        <strong>Easy Apply</strong>
        Submit applications online
    </div>
    <div class="feature-pill">
        <span>⚡</span>
        <strong>Fast Track</strong>
        Quick status updates
    </div>
    <div class="feature-pill">
        <span>🤝</span>
        <strong>Trusted</strong>
        Secure & reliable
    </div>
</div>

<?php include 'includes/footer.php'; ?>
