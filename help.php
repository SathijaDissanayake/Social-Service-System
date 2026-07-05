<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = 'Help';
include 'includes/header.php';
?>

<a href="home.php" class="back-link">← Back to Home</a>

<div class="card card-glow">
    <div class="page-banner">
        <span class="banner-badge">Support</span>
        <h1>Help & Support</h1>
        <p>Everything you need to know about using the Social Service Hub.</p>
    </div>

    <div class="help-content">
        <p>This platform helps citizens apply for social services online and allows administrators to manage applications efficiently.</p>

        <h3>👤 For Citizens</h3>
        <ul>
            <li><strong>Apply for Service</strong> — Choose a service and explain why you need assistance.</li>
            <li><strong>My Applications</strong> — Track status: Pending, Approved, or Rejected.</li>
            <li><strong>Sign Up</strong> — Create a free account if you're new here.</li>
        </ul>

        <h3>🛡️ For Administrators</h3>
        <ul>
            <li><strong>Manage Services</strong> — Add or remove available social services.</li>
            <li><strong>Applications</strong> — Review, approve, or reject citizen requests.</li>
        </ul>

        <p>Need further assistance? Contact your local social services office.</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
