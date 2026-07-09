<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

requireAdmin();

$id = $_GET['id'];
$status = $_GET['status'];

$conn->query("UPDATE applications SET status='$status' WHERE id=$id");

header("Location: admin_applications.php");
exit();
