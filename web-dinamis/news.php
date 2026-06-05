<?php
include 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$news = mysqli_query(
    $conn,
    "SELECT * FROM news ORDER BY id DESC"
);
?>

<div class="container">

    <h1 class="section-title">
        📰 Latest World Cup News
    </h1>

    <div class="news-grid">

    <?php while($row = mysqli_fetch_assoc($news)): ?>

        <div class="news-card">

            <div class="news-content">

                <h3>
                    <?= htmlspecialchars($row['title']) ?>
                </h3>

                <p>
                    <?= substr(strip_tags($row['content']),0,120) ?>...
                </p>

                <br>

                <a
                href="news_detail.php?id=<?= $row['id'] ?>"
                class="hero-btn">
                    Read More
                </a>

            </div>

        </div>

    <?php endwhile; ?>

    </div>

</div>

<?php include 'includes/footer.php'; ?>