<?php
include 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$result = mysqli_query($conn, "SELECT * FROM matches WHERE status='Finished' ORDER BY match_date DESC");
?>

<div class="container" style="padding-top:100px;">
    <h2 class="section-title">Match Results</h2>
    <div class="result-grid">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="result-card">
            <h3><?= htmlspecialchars($row['home_team']) ?></h3>
            <div class="score"><?= $row['home_score'] ?> - <?= $row['away_score'] ?></div>
            <h3><?= htmlspecialchars($row['away_team']) ?></h3>
            <p>📍 <?= htmlspecialchars($row['stadium']) ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
