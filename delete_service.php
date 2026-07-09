<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

requireAdmin();

$id = $_GET['id'];

$conn->query("DELETE FROM services WHERE id=$id");

header("Location: admin_services.php");
exit();
