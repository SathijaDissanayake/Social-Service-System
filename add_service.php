<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$pageTitle = 'Add Service';
include 'includes/header.php';
?>

<a href="admin_services.php" class="back-link">← Back to Services</a>

<div class="card card-narrow card-glow">
    <div class="card-header">
        <h1 class="page-title">➕ Add New Service</h1>
        <p class="page-subtitle">Create a new service for citizens to apply to.</p>
    </div>

    <form action="save_service.php" method="POST">
        <div class="form-group">
            <label for="name">Service Name</label>
            <input type="text" id="name" name="name" placeholder="e.g. Food Assistance" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Describe what this service provides..." required></textarea>
        </div>

        <button type="submit" class="btn-block">Save Service →</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
