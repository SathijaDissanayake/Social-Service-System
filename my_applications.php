<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

$result = $conn->query("SELECT * FROM applications WHERE user='$user'");
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
        <th>Service ID</th>
        <th>Message</th>
        <th>Status</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['service_id']; ?></td>
        <td><?php echo $row['message']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
<?php } ?>

</table>

</div>

</body>
</html>