<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

$result = $conn->query("SELECT a.*, s.service_name FROM applications a JOIN services s ON a.service_id = s.id WHERE a.user_id = $user_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Applications</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>My Applications</h2>

<a href="home.php">Home</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Service</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['service_name']); ?></td>
        <td><?php echo htmlspecialchars($row['reason']); ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
<?php } ?>

</table>

</div>

</body>
</html>