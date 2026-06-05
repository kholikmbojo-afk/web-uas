```php
<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../config/database.php';

$news = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM news"));
$matches = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM matches"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>World Cup 2026 Admin</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#eef2f7;
}

/* HEADER */

.header{
    background:linear-gradient(135deg,#001f54,#003566);
    color:white;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:28px;
    font-weight:bold;
}

.user{
    font-size:15px;
}

/* HERO */

.hero{
    background:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
    url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1600');
    background-size:cover;
    background-position:center;
    color:white;
    text-align:center;
    padding:80px 20px;
}

.hero h1{
    font-size:48px;
    margin-bottom:10px;
}

.hero p{
    font-size:18px;
    opacity:.9;
}

/* CONTAINER */

.container{
    width:90%;
    max-width:1200px;
    margin:30px auto;
}

/* CARDS */

.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:-50px;
}

.card{
    background:white;
    border-radius:20px;
    padding:30px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.card .icon{
    font-size:45px;
}

.card h2{
    font-size:42px;
    color:#001f54;
    margin:10px 0;
}

/* MENU */

.menu{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:30px;
}

.menu a{
    text-decoration:none;
    background:white;
    padding:25px;
    border-radius:15px;
    text-align:center;
    color:#001f54;
    font-weight:bold;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.menu a:hover{
    transform:translateY(-5px);
}

.logout{
    color:#c1121f !important;
}

/* FOOTER */

.footer{
    text-align:center;
    padding:30px;
    color:#777;
}

</style>
</head>
<body>

<div class="header">
    <div class="logo">🏆 World Cup 2026</div>
    <div class="user">
        Welcome, <?= htmlspecialchars($_SESSION['admin']) ?>
    </div>
</div>

<div class="hero">
    <h1>Admin Dashboard</h1>
    <p>Manage news, match schedules, and tournament information.</p>
</div>

<div class="container">

    <div class="stats">

        <div class="card">
            <div class="icon">📰</div>
            <h2><?= $news ?></h2>
            <p>Total News</p>
        </div>

        <div class="card">
            <div class="icon">⚽</div>
            <h2><?= $matches ?></h2>
            <p>Total Matches</p>
        </div>

    </div>

    <div class="menu">

        <a href="news.php">
            📰 Manage News
        </a>

        <a href="matches.php">
            ⚽ Manage Matches
        </a>

        <a href="logout.php" class="logout">
            🚪 Logout
        </a>

    </div>

</div>

<div class="footer">
    FIFA World Cup 2026 Administration Panel
</div>

</body>
</html>
```
