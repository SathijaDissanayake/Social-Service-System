<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

requireAdmin();

$pageTitle = 'Admin Dashboard';
$activePage = 'dashboard';
include 'includes/app_start.php';
?>

<div class="app-page-head">
    <span class="app-label">Admin Panel</span>
    <h1>Admin Dashboard</h1>
    <p>Manage social services, review citizen applications, and keep the platform running smoothly.</p>
</div>

<div class="dash-cards">
    <div class="dash-card blue">
        <div class="dash-card-icon">🏥</div>
        <h3>Manage Services</h3>
        <p>Add, view, or remove available social services offered to citizens.</p>
        <ul class="dash-card-list">
            <li>Create new service offerings</li>
            <li>Update service descriptions</li>
            <li>Remove outdated services</li>
        </ul>
        <a href="admin_services.php" class="dash-card-btn">Manage Services →</a>
    </div>

    <div class="dash-card purple">
        <div class="dash-card-icon">📋</div>
        <h3>Applications</h3>
        <p>Review pending applications and approve or reject citizen requests.</p>
        <ul class="dash-card-list">
            <li>View all submitted applications</li>
            <li>Approve or reject requests</li>
            <li>Track application history</li>
        </ul>
        <a href="admin_applications.php" class="dash-card-btn">Review Applications →</a>
    </div>

    <div class="dash-card green">
        <div class="dash-card-icon">🏠</div>
        <h3>Citizen View</h3>
        <p>Switch to the citizen portal to see the user experience.</p>
        <ul class="dash-card-list">
            <li>Preview citizen dashboard</li>
            <li>Test application flow</li>
            <li>View as a regular user</li>
        </ul>
        <a href="home.php" class="dash-card-btn">Go to Home →</a>
    </div>
</div>

<?php include 'includes/app_end.php'; ?>
