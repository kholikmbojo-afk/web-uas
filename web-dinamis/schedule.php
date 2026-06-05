<?php
include 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$result = mysqli_query($conn, "SELECT * FROM matches WHERE status='Upcoming' ORDER BY match_date ASC");
?>

<div class="container" style="padding-top:100px;">
    <h2 class="section-title">Upcoming Matches</h2>
    <div class="match-grid">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="match-card">
            <h3><?= htmlspecialchars($row['home_team']) ?> vs <?= htmlspecialchars($row['away_team']) ?></h3>
            <p>📍 <?= htmlspecialchars($row['stadium']) ?></p>
            <p>🗓 <?= date('d M Y H:i', strtotime($row['match_date'])) ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
