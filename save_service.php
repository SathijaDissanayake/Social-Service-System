<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

requireAdmin();

$name = $_POST['name'];
$description = $_POST['description'];

$sql = "INSERT INTO services (service_name, description) VALUES ('$name', '$description')";

$conn->query($sql);

header("Location: admin_services.php");
exit();
