<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM applications");
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
        <th>Service ID</th>
        <th>Message</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['user']; ?></td>
        <td><?php echo $row['service_id']; ?></td>
        <td><?php echo $row['message']; ?></td>
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