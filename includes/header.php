<header class="landing-header app-header">
    <div class="landing-header-inner app-header-inner">
        <a href="<?php echo $isAdmin ? 'admin_dashboard.php' : 'home.php'; ?>" class="landing-logo">
            <span class="landing-logo-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </span>
            <span class="landing-logo-text">
                <strong>Social Service Hub</strong>
                <small><?php echo $portalLabel; ?></small>
            </span>
        </a>

        <nav class="app-nav">
            <?php if ($isAdmin) { ?>
                <a href="admin_dashboard.php" class="app-nav-link <?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    Dashboard
                </a>
                <a href="admin_services.php" class="app-nav-link <?php echo $activePage === 'services' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    Services
                </a>
                <a href="admin_applications.php" class="app-nav-link <?php echo $activePage === 'applications' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    Applications
                </a>
                <a href="home.php" class="app-nav-link <?php echo $activePage === 'home' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                    Citizen View
                </a>
            <?php } else { ?>
                <a href="home.php" class="app-nav-link <?php echo $activePage === 'home' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                    Home
                </a>
                <a href="apply_service.php" class="app-nav-link <?php echo $activePage === 'apply' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
                    Apply
                </a>
                <a href="my_applications.php" class="app-nav-link <?php echo $activePage === 'applications' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                    My Applications
                </a>
                <a href="help.php" class="app-nav-link <?php echo $activePage === 'help' ? 'active' : ''; ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    Help
                </a>
            <?php } ?>
        </nav>

        <div class="app-user-area">
            <div class="app-user">
                <span class="app-user-avatar"><?php echo $userInitial; ?></span>
                <span class="app-user-name"><?php echo htmlspecialchars($userName); ?></span>
            </div>
            <a href="logout.php" class="app-logout">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
        </div>
    </div>
</header>
