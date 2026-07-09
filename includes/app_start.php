<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Social Service Hub';
}
if (!isset($activePage)) {
    $activePage = '';
}
$isAdmin = isAdmin();
$portalLabel = $isAdmin ? 'Admin Portal' : 'Citizen Portal';
$userInitial = strtoupper(substr($_SESSION['fullname'] ?? $_SESSION['user'] ?? 'U', 0, 1));
$userName = $_SESSION['fullname'] ?? $_SESSION['user'] ?? 'User';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | Social Service Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/landing.css">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body class="app-page">

<?php include 'includes/header.php'; ?>

<main class="app-main">
