<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../config/database.php';

if(isset($_POST['save'])){

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $content = mysqli_real_escape_string($conn,$_POST['content']);

    mysqli_query($conn,"
        INSERT INTO news(title,content)
        VALUES('$title','$content')
    ");

    header("Location: news.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add News</title>

<style>
body{
    background:#f4f6f9;
    font-family:Segoe UI,sans-serif;
}

.container{
    width:800px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

h2{
    color:#001f54;
}

input,textarea{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-top:5px;
}

button{
    background:#c1121f;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#9d0208;
}
</style>
</head>
<body>

<div class="container">

<h2>📰 Add News</h2>

<form method="POST">

<label>Title</label>
<input type="text" name="title" required>

<br><br>

<label>Content</label>
<textarea name="content" rows="10" required></textarea>

<br><br>

<button type="submit" name="save">
Save News
</button>

</form>

</div>

</body>
</html>
