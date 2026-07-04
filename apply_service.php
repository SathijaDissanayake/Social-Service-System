<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$services = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Service</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Apply for a Service</h2>

<form action="save_application.php" method="POST">

    <label>Select Service</label>
    <select name="service_id">
        <?php while ($s = $services->fetch_assoc()) { ?>
            <option value="<?php echo $s['id']; ?>">
                <?php echo htmlspecialchars($s['service_name']); ?>
            </option>
        <?php } ?>
    </select>

    <br><br>

    <input type="text" name="reason" placeholder="Reason for application" required>

    <br><br>

    <button type="submit">Apply</button>

</form>

</div>

</body>
</html>