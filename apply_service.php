<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$services = $conn->query("SELECT * FROM services");

$pageTitle = 'Apply for Service';
$activePage = 'apply';
include 'includes/header.php';
?>

<a href="home.php" class="app-back">← Back to Home</a>

<div class="app-page-head">
    <span class="app-label">New Application</span>
    <h1>Apply for a Service</h1>
    <p>Select a service and tell us why you need assistance.</p>
</div>

<div class="app-card">
    <h2>Application Form</h2>
    <span class="app-card-underline"></span>
    <p class="subtitle">Fill in the details below to submit your request.</p>

    <form action="save_application.php" method="POST">
        <div class="app-field">
            <label for="service_id">Select Service</label>
            <select id="service_id" name="service_id" required>
                <?php while ($s = $services->fetch_assoc()) { ?>
                    <option value="<?php echo $s['id']; ?>">
                        <?php echo htmlspecialchars($s['service_name']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="app-field">
            <label for="reason">Reason for Application</label>
            <textarea id="reason" name="reason" placeholder="Explain why you are applying for this service..." required></textarea>
        </div>

        <button type="submit" class="app-btn app-btn-block">Submit Application →</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
