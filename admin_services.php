<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM services");

$pageTitle = 'Manage Services';
include 'includes/header.php';
?>

<div class="page-banner">
    <span class="banner-badge">Admin</span>
    <h1>Manage Services</h1>
    <p>Add, view, or remove social services available to citizens.</p>
</div>

<div class="toolbar">
    <div></div>
    <a href="add_service.php" class="btn btn-primary">+ Add New Service</a>
</div>

<?php if ($result->num_rows === 0) { ?>
<div class="card card-glow empty-state">
    <p>No services found. Add your first service to get started.</p>
    <a href="add_service.php" class="btn btn-primary">Add Service</a>
</div>
<?php } else { ?>
<div class="table-wrap">
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
                    <a href="delete_service.php?id=<?php echo $row['id']; ?>" class="link-delete" onclick="return confirm('Delete this service?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php include 'includes/footer.php'; ?>
