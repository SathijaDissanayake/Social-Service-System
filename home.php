<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

requireLogin();

$pageTitle = 'Home';
$activePage = 'home';
$userName = htmlspecialchars($_SESSION['fullname'] ?? $_SESSION['user']);

include 'includes/app_start.php';
?>

<section class="home-hero">
    <div class="home-hero-inner">
        <div>
            <h1>Hello, <?php echo $userName; ?> 👋</h1>
            <p class="home-hero-desc">
                Access social services, track your applications, and get the support you need — all in one place.
            </p>
            <div class="home-info-box">
                <span class="home-info-icon">🛡️</span>
                <span><strong>We're here to help</strong> you and your community. Fast. Secure. Reliable.</span>
            </div>
        </div>
        <div class="home-hero-visual">
            <div class="home-float-icons">
                <span class="home-float-icon hfi-blue">🤝</span>
                <span class="home-float-icon hfi-green">🏥</span>
                <span class="home-float-icon hfi-purple">🎓</span>
            </div>
            <div class="home-family">
                <span>👩‍🌾</span>
                <span>👨‍💼</span>
                <span>👧</span>
            </div>
        </div>
    </div>
</section>

<div class="dash-cards">
    <div class="dash-card purple">
        <div class="dash-card-icon">📝</div>
        <h3>Apply for Service</h3>
        <p>Submit a new application for food, medical, or education assistance.</p>
        <ul class="dash-card-list">
            <li>Simple and quick application process</li>
            <li>Secure and confidential</li>
            <li>Get assistance faster</li>
        </ul>
        <a href="apply_service.php" class="dash-card-btn">Get Started →</a>
    </div>

    <div class="dash-card blue">
        <div class="dash-card-icon">📂</div>
        <h3>My Applications</h3>
        <p>Track the status of all your submitted applications in real time.</p>
        <ul class="dash-card-list">
            <li>View application status</li>
            <li>Get updates and notifications</li>
            <li>Access application history</li>
        </ul>
        <a href="my_applications.php" class="dash-card-btn">View All Applications →</a>
    </div>

    <div class="dash-card green">
        <div class="dash-card-icon">🎧</div>
        <h3>Help &amp; Support</h3>
        <p>Learn how to use the system and find answers to common questions.</p>
        <ul class="dash-card-list">
            <li>FAQs and guides</li>
            <li>Contact support</li>
            <li>System tutorials and tips</li>
        </ul>
        <a href="help.php" class="dash-card-btn">Learn More →</a>
    </div>

    <?php if (isAdmin()) { ?>
    <div class="dash-card orange">
        <div class="dash-card-icon">⚙️</div>
        <h3>Admin Dashboard</h3>
        <p>Manage services, review applications, and oversee the platform.</p>
        <ul class="dash-card-list">
            <li>Manage social services</li>
            <li>Review citizen applications</li>
            <li>Full admin control panel</li>
        </ul>
        <a href="admin_dashboard.php" class="dash-card-btn">Open Dashboard →</a>
    </div>
    <?php } ?>
</div>

<?php include 'includes/app_end.php'; ?>
