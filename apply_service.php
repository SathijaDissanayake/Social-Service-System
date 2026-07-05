<?php
session_start();
include "database.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$services = $conn->query("SELECT * FROM services");

$pageTitle = 'Apply for Service';
include 'includes/header.php';
?>

<a href="home.php" class="back-link">← Back to Home</a>

<div class="card card-narrow card-glow">
    <div class="card-header">
        <h1 class="page-title">📝 Apply for a Service</h1>
        <p class="page-subtitle">Select a service and tell us why you need assistance.</p>
    </div>

    <form action="save_application.php" method="POST">
        <div class="form-group">
            <label for="service_id">Select Service</label>
            <select id="service_id" name="service_id" required>
                <?php while ($s = $services->fetch_assoc()) { ?>
                    <option value="<?php echo $s['id']; ?>">
                        <?php echo htmlspecialchars($s['service_name']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="reason">Reason for Application</label>
            <textarea id="reason" name="reason" placeholder="Explain why you are applying for this service..." required></textarea>
        </div>

        <button type="submit" class="btn-block">Submit Application →</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
