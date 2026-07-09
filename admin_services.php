<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

requireAdmin();

$result = $conn->query("SELECT * FROM services");

$pageTitle = 'Manage Services';
$activePage = 'services';
include 'includes/app_start.php';
?>

<a href="admin_dashboard.php" class="app-back">← Back to Dashboard</a>

<div class="app-page-head">
    <span class="app-label">Admin</span>
    <h1>Manage Services</h1>
    <p>Add, view, or remove social services available to citizens.</p>
</div>

<div class="app-toolbar">
    <a href="add_service.php" class="app-btn app-btn-green">+ Add New Service</a>
</div>

<?php if ($result->num_rows === 0) { ?>
<div class="app-empty">
    <p>No services found. Add your first service to get started.</p>
    <a href="add_service.php" class="app-btn">Add Service</a>
</div>
<?php } else { ?>
<div class="app-table-wrap">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>#<?php echo $row['id']; ?></td>
                <td><strong><?php echo htmlspecialchars($row['service_name']); ?></strong></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td>
                    <a href="delete_service.php?id=<?php echo $row['id']; ?>" class="app-action-delete" onclick="return confirm('Delete this service?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php include 'includes/app_end.php'; ?>
