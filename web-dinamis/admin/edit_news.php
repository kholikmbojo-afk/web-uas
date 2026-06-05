<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../config/database.php';

$id = (int)$_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM news WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

if(!$row){
    die("News tidak ditemukan");
}

if(isset($_POST['update'])){

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $content = mysqli_real_escape_string(
        $conn,
        $_POST['content']
    );

    mysqli_query(
        $conn,
        "UPDATE news
        SET
        title='$title',
        content='$content'
        WHERE id='$id'"
    );

    header("Location: news.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit News</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f6f9;
}

.container{
    width:900px;
    max-width:95%;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

h2{
    color:#001f54;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
}

input,
textarea{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-bottom:20px;
}

textarea{
    resize:vertical;
}

button{
    background:#c1121f;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#9d0208;
}

.back{
    display:inline-block;
    margin-left:10px;
    text-decoration:none;
    background:#6c757d;
    color:white;
    padding:12px 20px;
    border-radius:10px;
}

</style>

</head>
<body>

<div class="container">

<h2>📰 Edit News</h2>

<form method="POST">

<label>News Title</label>

<input
type="text"
name="title"
value="<?= htmlspecialchars($row['title']) ?>"
required>

<label>News Content</label>

<textarea
name="content"
rows="12"
required><?= htmlspecialchars($row['content']) ?></textarea>

<button type="submit" name="update">
💾 Update News
</button>

<a href="news.php" class="back">
← Back
</a>

</form>

</div>

</body>
</html>