<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$pageTitle = 'Admin Dashboard';
include 'includes/header.php';
?>

<div class="page-banner">
    <span class="banner-badge">Admin Panel</span>
    <h1>Admin Dashboard</h1>
    <p>Manage social services, review citizen applications, and keep the platform running smoothly.</p>
</div>

<div class="action-grid">
    <a href="admin_services.php" class="action-card teal">
        <div class="action-card-icon teal">🏥</div>
        <h3>Manage Services</h3>
        <p>Add, view, or remove available social services offered to citizens.</p>
        <span class="card-arrow">Manage →</span>
    </a>

    <a href="admin_applications.php" class="action-card amber">
        <div class="action-card-icon amber">📋</div>
        <h3>Applications</h3>
        <p>Review pending applications and approve or reject requests.</p>
        <span class="card-arrow">Review →</span>
    </a>

    <a href="home.php" class="action-card indigo">
        <div class="action-card-icon indigo">🏠</div>
        <h3>User Home</h3>
        <p>Switch to the citizen view of the platform.</p>
        <span class="card-arrow">Go to home →</span>
    </a>
</div>

<?php include 'includes/footer.php'; ?>
