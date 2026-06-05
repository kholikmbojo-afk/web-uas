<?php
include 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$featured = mysqli_query(
    $conn,
    "SELECT * FROM news ORDER BY id DESC LIMIT 1"
);

$story = mysqli_fetch_assoc($featured);
?>

<style>

.featured-news{
    height:550px;
    border-radius:25px;
    overflow:hidden;
    margin-bottom:50px;

    background:
    linear-gradient(
        rgba(0,0,0,.25),
        rgba(0,0,0,.75)
    ),
    url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1600');

    background-size:cover;
    background-position:center;

    display:flex;
    align-items:flex-end;
}

.featured-overlay{
    width:100%;
    padding:50px;
    color:white;
}

.featured-badge{
    display:inline-block;
    background:#c1121f;
    padding:10px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:bold;
    margin-bottom:20px;
}

.featured-overlay h2{
    font-size:48px;
    margin-bottom:15px;
}

.featured-overlay p{
    max-width:700px;
    line-height:1.8;
}

.featured-btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 22px;
    background:white;
    color:#001f54;
    text-decoration:none;
    border-radius:10px;
    font-weight:bold;
}

.featured-bottom{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:35px;
    flex-wrap:wrap;
    gap:20px;
}

.featured-stats{
    display:flex;
    gap:20px;
}

.stat-box{
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(8px);
    padding:18px 25px;
    border-radius:15px;
    text-align:center;
}

.stat-box h3{
    font-size:28px;
}

.featured-match{
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(8px);
    padding:20px;
    border-radius:15px;
    min-width:280px;
}

.featured-match h4{
    margin:10px 0;
}

@media(max-width:768px){

    .featured-overlay{
        padding:25px;
    }

    .featured-overlay h2{
        font-size:30px;
    }

    .featured-bottom{
        flex-direction:column;
        align-items:flex-start;
    }

    .featured-stats{
        flex-wrap:wrap;
    }

}

</style>

<section class="hero">

    <div class="hero-content">

        <span class="badge">
            ⚽ FIFA WORLD CUP 2026
        </span>

        <h1>
            THE WORLD'S BIGGEST
            FOOTBALL TOURNAMENT
        </h1>

        <p>
            Stay updated with the latest news,
            match schedules, results and everything
            about FIFA World Cup 2026.
        </p>

        <a href="news.php" class="hero-btn">
            Explore News
        </a>

    </div>

</section>

<div class="breaking-news">

    <span>BREAKING NEWS</span>

    <marquee>
        Welcome to FIFA World Cup 2026 News Portal • Latest schedules, match results, and tournament updates.
    </marquee>

</div>

<div class="container">

    <h2 class="section-title">
        Featured Story
    </h2>

    <div class="featured-news">

        <div class="featured-overlay">

            <span class="featured-badge">
                ⭐ FEATURED STORY
            </span>

            <h2>
                <?= htmlspecialchars($story['title']) ?>
            </h2>

            <p>
                <?= substr(strip_tags($story['content']),0,250) ?>...
            </p>

            <a
            href="news_detail.php?id=<?= $story['id'] ?>"
            class="featured-btn">
                Read Full Story →
            </a>

            <div class="featured-bottom">

                <div class="featured-stats">

                    <div class="stat-box">
                        <h3>48</h3>
                        <span>Teams</span>
                    </div>

                    <div class="stat-box">
                        <h3>104</h3>
                        <span>Matches</span>
                    </div>

                    <div class="stat-box">
                        <h3>16</h3>
                        <span>Host Cities</span>
                    </div>

                </div>

                <div class="featured-match">

                    <small>⚽ FEATURED MATCH</small>

                    <h4>
                        Argentina 🇦🇷 vs Brazil 🇧🇷
                    </h4>

                    <p>
                        📍 MetLife Stadium
                    </p>

                    <p>
                        🗓 15 June 2026
                    </p>

                </div>

            </div>

        </div>

    </div>

    <h2 class="section-title">
        Latest News
    </h2>

    <div class="news-grid">

        <div class="news-card">
            <img src="assets/images/news1.jpg">
            <div class="news-content">
                <h3>Argentina Ready For World Cup</h3>
                <p>Latest squad preparations ahead of the tournament.</p>
            </div>
        </div>

        <div class="news-card">
            <img src="assets/images/news2.jpg">
            <div class="news-content">
                <h3>Brazil Announces Squad</h3>
                <p>Brazil reveals final list of players.</p>
            </div>
        </div>

        <div class="news-card">
            <img src="assets/images/news3.jpg">
            <div class="news-content">
                <h3>Opening Match Confirmed</h3>
                <p>FIFA confirms the opening fixture.</p>
            </div>
        </div>

    </div>

    <h2 class="section-title">
        Upcoming Matches
    </h2>

    <div class="match-grid">

        <div class="match-card">
            <h3>Argentina vs Brazil</h3>
            <p>📍 MetLife Stadium</p>
            <p>🗓 15 June 2026</p>
        </div>

        <div class="match-card">
            <h3>France vs Spain</h3>
            <p>📍 SoFi Stadium</p>
            <p>🗓 16 June 2026</p>
        </div>

    </div>

    <h2 class="section-title">
        Latest Results
    </h2>

    <div class="result-grid">

        <div class="result-card">
            <h3>Argentina</h3>
            <div class="score">2 - 1</div>
            <h3>Brazil</h3>
        </div>

        <div class="result-card">
            <h3>France</h3>
            <div class="score">3 - 0</div>
            <h3>Japan</h3>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>