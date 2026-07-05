<?php
session_start();
include "database.php";
include "includes/helpers.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
$result = $conn->query("SELECT a.*, s.service_name FROM applications a JOIN services s ON a.service_id = s.id WHERE a.user_id = $user_id ORDER BY a.id DESC");

$pageTitle = 'My Applications';
$activePage = 'applications';
include 'includes/header.php';
?>

<a href="home.php" class="app-back">← Back to Home</a>

<div class="app-page-head">
    <span class="app-label">Your Requests</span>
    <h1>My Applications</h1>
    <p>Track the status of all your submitted service applications.</p>
</div>

<div class="app-toolbar">
    <a href="apply_service.php" class="app-btn">+ New Application</a>
</div>

<?php if ($result->num_rows === 0) { ?>
<div class="app-empty">
    <p>📭 You haven't submitted any applications yet.</p>
    <a href="apply_service.php" class="app-btn">Apply for a Service</a>
</div>
<?php } else { ?>
<div class="app-table-wrap">
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
