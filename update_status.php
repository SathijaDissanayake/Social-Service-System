<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$status = $_GET['status'];

$conn->query("UPDATE applications SET status='$status' WHERE id=$id");

header("Location: admin_applications.php");
exit();
?>