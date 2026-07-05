<?php
session_start();
include "database.php";
include "includes/helpers.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT a.*, u.username, s.service_name FROM applications a JOIN users u ON a.user_id = u.id JOIN services s ON a.service_id = s.id ORDER BY a.id DESC");

$pageTitle = 'Applications';
$activePage = 'applications';
include 'includes/header.php';
?>

<a href="admin_dashboard.php" class="app-back">← Back to Dashboard</a>

<div class="app-page-head">
    <span class="app-label">Review Queue</span>
    <h1>All Applications</h1>
    <p>Review citizen requests and approve or reject applications.</p>
</div>

<?php if ($result->num_rows === 0) { ?>
<div class="app-empty">
    <p>📭 No applications submitted yet.</p>
</div>
<?php } else { ?>
<div class="app-table-wrap">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Service</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>#<?php echo $row['id']; ?></td>
                <td><strong><?php echo htmlspecialchars($row['username']); ?></strong></td>
                <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                <td><?php echo htmlspecialchars($row['reason']); ?></td>
                <td><?php echo statusBadge($row['status']); ?></td>
                <td>
                    <?php if ($row['status'] === 'Pending') { ?>
                    <div class="app-table-actions">
                        <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Approved" class="app-action-approve">✓ Approve</a>
                        <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected" class="app-action-reject">✕ Reject</a>
                    </div>
                    <?php } else { ?>
                    <span style="color:#94a3b8;font-size:0.85rem;">—</span>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php include 'includes/footer.php'; ?>
