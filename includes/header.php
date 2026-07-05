<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Social Service System';
}
if (!isset($bodyClass)) {
    $bodyClass = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | OSSMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo htmlspecialchars($bodyClass); ?>">

<div class="bg-shapes" aria-hidden="true">
    <span class="shape shape-1"></span>
    <span class="shape shape-2"></span>
    <span class="shape shape-3"></span>
</div>

<header class="site-header">
    <div class="header-inner">
        <a href="<?php echo isset($_SESSION['user']) ? (($_SESSION['role'] ?? '') === 'admin' ? 'admin_dashboard.php' : 'home.php') : 'index.php'; ?>" class="logo">
            <span class="logo-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </span>
            <span class="logo-text">Social Service<span class="logo-accent">Hub</span></span>
        </a>

        <?php if (isset($_SESSION['user'])) { ?>
        <nav class="main-nav">
            <?php if (($_SESSION['role'] ?? '') === 'admin') { ?>
                <a href="admin_dashboard.php">Dashboard</a>
                <a href="admin_services.php">Services</a>
                <a href="admin_applications.php">Applications</a>
            <?php } else { ?>
                <a href="home.php">Home</a>
                <a href="apply_service.php">Apply</a>
                <a href="my_applications.php">My Applications</a>
                <a href="help.php">Help</a>
            <?php } ?>
            <span class="nav-user">
                <span class="nav-avatar"><?php echo strtoupper(substr($_SESSION['fullname'] ?? $_SESSION['user'], 0, 1)); ?></span>
                <?php echo htmlspecialchars($_SESSION['fullname'] ?? $_SESSION['user']); ?>
            </span>
            <a href="logout.php" class="nav-logout">Logout</a>
        </nav>
        <?php } ?>
    </div>
</header>

<main class="page-content">
