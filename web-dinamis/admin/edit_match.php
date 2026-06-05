```php
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
    "SELECT * FROM matches WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

if(!$row){
    die("Match tidak ditemukan");
}

if(isset($_POST['update'])){

    $home_team  = mysqli_real_escape_string($conn,$_POST['home_team']);
    $away_team  = mysqli_real_escape_string($conn,$_POST['away_team']);
    $stadium    = mysqli_real_escape_string($conn,$_POST['stadium']);
    $match_date = mysqli_real_escape_string($conn,$_POST['match_date']);
    $home_score = (int)$_POST['home_score'];
    $away_score = (int)$_POST['away_score'];
    $status     = mysqli_real_escape_string($conn,$_POST['status']);

    mysqli_query($conn,"
        UPDATE matches SET

        home_team='$home_team',
        away_team='$away_team',
        stadium='$stadium',
        match_date='$match_date',
        home_score='$home_score',
        away_score='$away_score',
        status='$status'

        WHERE id='$id'
    ");

    header("Location: matches.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Match</title>

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
    width:800px;
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
    margin-bottom:5px;
    font-weight:bold;
}

input,
select{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-bottom:15px;
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

<h2>⚽ Edit Match</h2>

<form method="POST">

<label>Home Team</label>
<input type="text"
name="home_team"
value="<?= htmlspecialchars($row['home_team']) ?>"
required>

<label>Away Team</label>
<input type="text"
name="away_team"
value="<?= htmlspecialchars($row['away_team']) ?>"
required>

<label>Stadium</label>
<input type="text"
name="stadium"
value="<?= htmlspecialchars($row['stadium']) ?>"
required>

<label>Match Date</label>
<input type="datetime-local"
name="match_date"
value="<?= date('Y-m-d\TH:i', strtotime($row['match_date'])) ?>"
required>

<label>Home Score</label>
<input type="number"
name="home_score"
value="<?= $row['home_score'] ?>"
required>

<label>Away Score</label>
<input type="number"
name="away_score"
value="<?= $row['away_score'] ?>"
required>

<label>Status</label>
<select name="status">

<option value="Upcoming"
<?= ($row['status']=='Upcoming') ? 'selected' : '' ?>>
Upcoming
</option>

<option value="Finished"
<?= ($row['status']=='Finished') ? 'selected' : '' ?>>
Finished
</option>

</select>

<button type="submit" name="update">
💾 Update Match
</button>

<a href="matches.php" class="back">
← Back
</a>

</form>

</div>

</body>
</html>
```
