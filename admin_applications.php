<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT a.*, u.username, s.service_name FROM applications a JOIN users u ON a.user_id = u.id JOIN services s ON a.service_id = s.id ORDER BY a.id DESC");

$pageTitle = 'Applications';
include 'includes/header.php';

function statusBadge($status) {
    $class = 'badge-pending';
    if ($status === 'Approved') $class = 'badge-approved';
    if ($status === 'Rejected') $class = 'badge-rejected';
    return '<span class="badge ' . $class . '">' . htmlspecialchars($status) . '</span>';
}
?>

<a href="admin_dashboard.php" class="back-link">← Back to Dashboard</a>

<div class="page-banner">
    <span class="banner-badge">Review Queue</span>
    <h1>All Applications</h1>
    <p>Review citizen requests and approve or reject applications.</p>
</div>

<?php if ($result->num_rows === 0) { ?>
<div class="card card-glow empty-state">
    <p>📭 No applications submitted yet.</p>
</div>
<?php } else { ?>
<div class="table-wrap">
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
                    <div class="table-actions">
                        <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Approved" class="link-approve">✓ Approve</a>
                        <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected" class="link-reject">✕ Reject</a>
                    </div>
                    <?php } else { ?>
                    <span style="color: var(--text-body); font-size: 0.85rem;">—</span>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php include 'includes/footer.php'; ?>
