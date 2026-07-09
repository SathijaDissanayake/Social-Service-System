<?php
require_once 'includes/auth.php';

if (isLoggedIn()) {
    if (isAdmin()) {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: home.php");
    }
    exit();
}

$pageTitle = 'Welcome';
include 'includes/landing_header.php';
?>

<!-- Hero -->
<section class="landing-hero" id="home">
    <div class="landing-hero-inner">
        <div class="landing-hero-left">
            <span class="landing-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Online Social Service Platform
            </span>

            <h1>Social Service Hub</h1>

            <p class="landing-hero-desc">
                Apply for food, medical, and education assistance online.<br>
                Fast, secure, and free for all citizens.
            </p>

            <div class="landing-hero-btns">
                <a href="login.php" class="landing-btn landing-btn-primary landing-btn-lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Sign In
                </a>
                <a href="signup.php" class="landing-btn landing-btn-secondary landing-btn-lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Create Account
                </a>
            </div>

            <div class="landing-trust">
                <div class="trust-item">
                    <span class="trust-icon trust-icon-green">🛡️</span>
                    <div>
                        <strong>100% Secure</strong>
                        <span>Your data is protected</span>
                    </div>
                </div>
                <div class="trust-item">
                    <span class="trust-icon trust-icon-blue">🕐</span>
                    <div>
                        <strong>24/7 Online</strong>
                        <span>Apply anytime</span>
                    </div>
                </div>
                <div class="trust-item">
                    <span class="trust-icon trust-icon-orange">🎁</span>
                    <div>
                        <strong>Free To Apply</strong>
                        <span>No hidden charges</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="landing-hero-right">
            <div class="landing-hero-circle"></div>
            <div class="landing-hero-image">
                <img src="assets/landing.png" alt="Global social service network">
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="landing-services-section" id="services">
    <div class="landing-section-inner">
        <div class="landing-section-head">
            <h2>Available Services</h2>
            <p>Choose the support that fits your needs.</p>
            <span class="section-underline"></span>
        </div>

        <div class="landing-service-cards">
            <div class="landing-service-card">
                <div class="service-card-icon-wrap service-green">🥗</div>
                <h3>Food Assistance</h3>
                <p>Receive monthly food packs and nutritional support for you and your family.</p>
                <a href="signup.php" class="service-apply service-apply-green">Apply Now</a>
            </div>
            <div class="landing-service-card">
                <div class="service-card-icon-wrap service-blue">🏥</div>
                <h3>Medical Assistance</h3>
                <p>Financial support for hospital expenses and essential medical care.</p>
                <a href="signup.php" class="service-apply service-apply-blue">Apply Now</a>
            </div>
            <div class="landing-service-card">
                <div class="service-card-icon-wrap service-orange">🎓</div>
                <h3>Education Assistance</h3>
                <p>Support for educational expenses to help students reach their goals.</p>
                <a href="signup.php" class="service-apply service-apply-orange">Apply Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="landing-stats-bar">
    <div class="landing-stats-inner">
        <div class="landing-stat">
            <span class="stat-icon stat-icon-blue">📋</span>
            <div><strong>3+</strong> Services</div>
        </div>
        <div class="landing-stat">
            <span class="stat-icon stat-icon-green">👥</span>
            <div><strong>Thousands+</strong> People Helped</div>
        </div>
        <div class="landing-stat">
            <span class="stat-icon stat-icon-purple">🕐</span>
            <div><strong>24/7</strong> Online Support</div>
        </div>
        <div class="landing-stat">
            <span class="stat-icon stat-icon-orange">💯</span>
            <div><strong>100%</strong> For Everyone</div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="landing-how-section" id="how-it-works">
    <div class="landing-section-inner">
        <div class="landing-section-head">
            <h2>How It Works</h2>
            <p>Get started in three simple steps.</p>
            <span class="section-underline"></span>
        </div>

        <div class="landing-steps">
            <div class="landing-step">
                <span class="step-circle">1</span>
                <h3>Create Account</h3>
                <p>Sign up for free with your basic details in under a minute.</p>
            </div>
            <div class="landing-step">
                <span class="step-circle">2</span>
                <h3>Apply for Service</h3>
                <p>Choose a service and submit your application with a reason.</p>
            </div>
            <div class="landing-step">
                <span class="step-circle">3</span>
                <h3>Track Status</h3>
                <p>Monitor your application and get updates when reviewed.</p>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section class="landing-about-section" id="about">
    <div class="landing-section-inner landing-about-inner">
        <div class="landing-about-text">
            <h2>About Social Service Hub</h2>
            <p>
                Social Service Hub is an online platform that connects citizens with essential
                social services including food, medical, and education assistance. Our mission
                is to make support accessible, transparent, and available to everyone who needs it.
            </p>
            <p>
                Whether you're applying for yourself or managing services as an administrator,
                our platform provides a simple and secure experience from start to finish.
            </p>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section class="landing-cta-bar">
    <div class="landing-cta-inner">
        <span class="cta-heart">❤️</span>
        <div class="landing-cta-text">
            <h2>Make a Difference Today</h2>
            <p>Join our mission to help those in need. Together, we can build a better tomorrow.</p>
        </div>
        <a href="signup.php" class="landing-btn landing-btn-white landing-btn-lg">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Create Account
        </a>
    </div>
</section>

<?php include 'includes/landing_footer.php'; ?>
