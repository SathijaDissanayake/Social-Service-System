<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = 'Help & Support';
$activePage = 'help';
include 'includes/header.php';
?>

<a href="home.php" class="app-back">← Back to Home</a>

<div class="app-page-head">
    <span class="app-label">Support</span>
    <h1>Help &amp; Support</h1>
    <p>Everything you need to know about using the Social Service Hub.</p>
</div>

<div class="app-card app-card-wide app-help">
    <h2>Getting Started</h2>
    <span class="app-card-underline"></span>
    <p class="subtitle">Guides and information to help you use the platform.</p>

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

<?php include 'includes/footer.php'; ?>
