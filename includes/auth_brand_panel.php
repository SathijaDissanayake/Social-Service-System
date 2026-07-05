<?php
if (!isset($brandTitle)) $brandTitle = 'Welcome!';
if (!isset($brandSubtitle)) $brandSubtitle = 'Access vital social services and support.';
?>

<div class="auth-layout">
    <div class="auth-brand">
        <h1><?php echo htmlspecialchars($brandTitle); ?></h1>
        <p><?php echo htmlspecialchars($brandSubtitle); ?></p>

        <div class="auth-illustration">
            <div class="auth-illust-bg"></div>
            <div class="auth-illust-icons">
                <span class="illust-float illust-1">🏥</span>
                <span class="illust-float illust-2">🤝</span>
                <span class="illust-float illust-3">🎓</span>
            </div>
            <div class="auth-illust-people">
                <div class="illust-person">
                    <span class="person-avatar">👩‍🌾</span>
                    <span class="person-label">Food Aid</span>
                </div>
                <div class="illust-person illust-person-center">
                    <span class="person-avatar">💻</span>
                    <span class="person-label">Online Apply</span>
                </div>
                <div class="illust-person">
                    <span class="person-avatar">👩‍⚕️</span>
                    <span class="person-label">Medical Care</span>
                </div>
            </div>
        </div>

        <div class="auth-features">
            <div class="auth-feature">
                <span class="auth-feature-icon">🛡️</span>
                <div>
                    <strong>Secure &amp; Safe</strong>
                    <span>Your data is protected with top security.</span>
                </div>
            </div>
            <div class="auth-feature">
                <span class="auth-feature-icon">🕐</span>
                <div>
                    <strong>24/7 Access</strong>
                    <span>Access services anytime, anywhere.</span>
                </div>
            </div>
            <div class="auth-feature">
                <span class="auth-feature-icon">👥</span>
                <div>
                    <strong>For Everyone</strong>
                    <span>Supporting communities with care.</span>
                </div>
            </div>
        </div>

        <p class="auth-brand-copy">&copy; <?php echo date('Y'); ?> Online Social Service Management System. Serving communities with care.</p>
    </div>

    <div class="auth-form-side">
