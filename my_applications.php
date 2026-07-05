<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$result = $conn->query("SELECT a.*, s.service_name FROM applications a JOIN services s ON a.service_id = s.id WHERE a.user_id = $user_id ORDER BY a.id DESC");

$pageTitle = 'My Applications';
include 'includes/header.php';

function statusBadge($status) {
    $class = 'badge-pending';
    if ($status === 'Approved') $class = 'badge-approved';
    if ($status === 'Rejected') $class = 'badge-rejected';
    return '<span class="badge ' . $class . '">' . htmlspecialchars($status) . '</span>';
}
?>

<a href="home.php" class="back-link">← Back to Home</a>

<div class="page-banner">
    <span class="banner-badge">Your Requests</span>
    <h1>My Applications</h1>
    <p>Track the status of all your submitted service applications.</p>
</div>

<div class="toolbar">
    <div></div>
    <a href="apply_service.php" class="btn btn-primary">+ New Application</a>
</div>

<?php if ($result->num_rows === 0) { ?>
<div class="card card-glow empty-state">
    <p>📭 You haven't submitted any applications yet.</p>
    <a href="apply_service.php" class="btn btn-primary">Apply for a Service</a>
</div>
<?php } else { ?>
<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>#<?php echo $row['id']; ?></td>
                <td><strong><?php echo htmlspecialchars($row['service_name']); ?></strong></td>
                <td><?php echo htmlspecialchars($row['reason']); ?></td>
                <td><?php echo statusBadge($row['status']); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php include 'includes/footer.php'; ?>
