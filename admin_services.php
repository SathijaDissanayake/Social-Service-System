<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Services</h2>

<a href="home.php">Home</a> |
<a href="admin_dashboard.php">Dashboard</a>

<br><br>

<a href="add_service.php">+ Add New Service</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td>
            <a href="delete_service.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
<?php } ?>

</table>

</div>

</body>
</html>