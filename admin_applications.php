<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT a.*, u.username, s.service_name FROM applications a JOIN users u ON a.user_id = u.id JOIN services s ON a.service_id = s.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Applications</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>All Applications</h2>

<a href="admin_dashboard.php">Back</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Service</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['username']); ?></td>
        <td><?php echo htmlspecialchars($row['service_name']); ?></td>
        <td><?php echo htmlspecialchars($row['reason']); ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Approved">Approve</a> |
            <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected">Reject</a>
        </td>
    </tr>
<?php } ?>

</table>

</div>

</body>
</html>