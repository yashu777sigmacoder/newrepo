<?php
// Simple helper to safely output text
function e($value) {
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}

// Get values from POST
$fullName = $_POST["fullName"] ?? "";
$email    = $_POST["email"] ?? "";
$phone    = $_POST["phone"] ?? "";
$dob      = $_POST["dob"] ?? "";
$gender   = $_POST["gender"] ?? "";
$course   = $_POST["course"] ?? "";
$address  = $_POST["address"] ?? "";
$city     = $_POST["city"] ?? "";
$state    = $_POST["state"] ?? "";
$pincode  = $_POST["pincode"] ?? "";
$skills   = $_POST["skills"] ?? [];
$agree    = isset($_POST["agree"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Submitted</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bg-overlay"></div>

<div class="container">
    <div class="form-card">
        <h1 class="title">Application Submitted ✅</h1>
        <p class="subtitle">Below is the summary of your registration details.</p>

        <div class="summary">
            <div class="summary-row">
                <span class="summary-label">Full Name</span>
                <span class="summary-value"><?php echo e($fullName); ?></span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Email</span>
                <span class="summary-value"><?php echo e($email); ?></span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Phone</span>
                <span class="summary-value"><?php echo e($phone); ?></span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Date of Birth</span>
                <span class="summary-value"><?php echo e($dob); ?></span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Gender</span>
                <span class="summary-value"><?php echo e($gender); ?></span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Course</span>
                <span class="summary-value"><?php echo e($course); ?></span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Address</span>
                <span class="summary-value">
                    <?php echo nl2br(e($address)); ?><br>
                    <?php echo e($city); ?>, <?php echo e($state); ?> - <?php echo e($pincode); ?>
                </span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Skills / Interests</span>
                <span class="summary-value">
                    <?php if (!empty($skills)): ?>
                        <?php echo e(implode(", ", $skills)); ?>
                    <?php else: ?>
                        Not specified
                    <?php endif; ?>
                </span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Declaration</span>
                <span class="summary-value">
                    <?php echo $agree ? "You confirmed that the information is correct." : "Not confirmed."; ?>
                </span>
            </div>
        </div>

        <div class="button-row" style="margin-top: 18px;">
            <a href="index.html">
                <button type="button" class="btn-ghost">Submit another response</button>
            </a>
        </div>
    </div>
</div>

<style>
/* A few extra styles specific to summary page */
.summary {
    margin-top: 16px;
    border-radius: 16px;
    padding: 14px 16px;
    background: linear-gradient(135deg, rgba(239, 246, 255, 0.9), rgba(254, 249, 195, 0.7));
    border: 1px solid rgba(191, 219, 254, 0.9);
}

.summary-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 6px 0;
    border-bottom: 1px dashed rgba(148, 163, 184, 0.6);
}

.summary-row:last-child {
    border-bottom: none;
}

.summary-label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #4b5563;
    margin-right: 20px;
}

.summary-value {
    font-size: 0.88rem;
    color: #111827;
    max-width: 60%;
}

@media (max-width: 768px) {
    .summary-row {
        flex-direction: column;
        gap: 3px;
    }

    .summary-value {
        max-width: 100%;
    }
}
</style>

</body>
</html>
