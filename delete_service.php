<?php
session_start();
include "database.php";

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$conn->query("DELETE FROM services WHERE id=$id");

header("Location: admin_services.php");
exit();
?>