<?php
include 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$id = (int)$_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM news WHERE id='$id'"
);

$news = mysqli_fetch_assoc($data);

if(!$news){
    die("News not found");
}
?>

<div class="container" style="padding-top:100px;">

    <h1>
        <?= htmlspecialchars($news['title']) ?>
    </h1>

    <br>

    <div style="line-height:1.8;">
        <?= nl2br(htmlspecialchars($news['content'])) ?>
    </div>

    <br><br>

    <a href="news.php" class="hero-btn">
        ← Back to News
    </a>

</div>

<?php include 'includes/footer.php'; ?>