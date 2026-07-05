<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = 'Home';
include 'includes/header.php';
?>

<div class="page-banner">
    <span class="banner-badge">Citizen Portal</span>
    <h1>Hello, <?php echo htmlspecialchars($_SESSION['fullname'] ?? $_SESSION['user']); ?> 👋</h1>
    <p>Access social services, track your applications, and get the support you need — all in one place.</p>
</div>

<div class="action-grid">
    <a href="apply_service.php" class="action-card teal">
        <div class="action-card-icon teal">📝</div>
        <h3>Apply for Service</h3>
        <p>Submit a new application for food, medical, or education assistance.</p>
        <span class="card-arrow">Get started →</span>
    </a>

    <a href="my_applications.php" class="action-card amber">
        <div class="action-card-icon amber">📂</div>
        <h3>My Applications</h3>
        <p>Track the status of all your submitted applications in real time.</p>
        <span class="card-arrow">View all →</span>
    </a>

    <a href="help.php" class="action-card indigo">
        <div class="action-card-icon indigo">💡</div>
        <h3>Help & Support</h3>
        <p>Learn how to use the system and find answers to common questions.</p>
        <span class="card-arrow">Learn more →</span>
    </a>

    <?php if (($_SESSION['role'] ?? '') === 'admin') { ?>
    <a href="admin_dashboard.php" class="action-card rose">
        <div class="action-card-icon rose">⚙️</div>
        <h3>Admin Dashboard</h3>
        <p>Manage services, review applications, and oversee the platform.</p>
        <span class="card-arrow">Open dashboard →</span>
    </a>
    <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>
