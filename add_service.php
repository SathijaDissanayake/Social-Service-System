<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$pageTitle = 'Add Service';
$activePage = 'services';
include 'includes/header.php';
?>

<a href="admin_services.php" class="app-back">← Back to Services</a>

<div class="app-page-head">
    <span class="app-label">Admin</span>
    <h1>Add New Service</h1>
    <p>Create a new service for citizens to apply to.</p>
</div>

<div class="app-card">
    <h2>Service Details</h2>
    <span class="app-card-underline"></span>
    <p class="subtitle">Enter the name and description for the new service.</p>

    <form action="save_service.php" method="POST">
        <div class="app-field">
            <label for="name">Service Name</label>
            <input type="text" id="name" name="name" placeholder="e.g. Food Assistance" required>
        </div>

        <div class="app-field">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Describe what this service provides..." required></textarea>
        </div>

        <button type="submit" class="app-btn app-btn-block">Save Service →</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
