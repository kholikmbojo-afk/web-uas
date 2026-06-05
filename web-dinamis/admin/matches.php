<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM matches ORDER BY match_date ASC"
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Matches</title>

<style>

body{
    font-family:Segoe UI,sans-serif;
    background:#f4f6f9;
}

.container{
    width:95%;
    margin:30px auto;
}

h1{
    color:#001f54;
}

.add-btn{
    display:inline-block;
    background:#c1121f;
    color:white;
    padding:10px 15px;
    border-radius:8px;
    text-decoration:none;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

th{
    background:#001f54;
    color:white;
}

th,td{
    padding:15px;
    text-align:left;
}

tr:nth-child(even){
    background:#f8f8f8;
}

.edit{
    color:#0d6efd;
    text-decoration:none;
    font-weight:bold;
}

.delete{
    color:#dc3545;
    text-decoration:none;
    font-weight:bold;
}
</style>
</head>
<body>

<div class="container">

<h1>⚽ Manage Matches</h1>

<a href="add_match.php" class="add-btn">
+ Add Match
</a>

<table>

<tr>
    <th>Home Team</th>
    <th>Away Team</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)): ?>

<tr>

<td><?= htmlspecialchars($row['home_team']) ?></td>

<td><?= htmlspecialchars($row['away_team']) ?></td>

<td><?= htmlspecialchars($row['match_date']) ?></td>

<td><?= htmlspecialchars($row['status']) ?></td>

<td>

<a class="edit"
href="edit_match.php?id=<?= $row['id'] ?>">
Edit
</a>

|

<a class="delete"
href="delete_match.php?id=<?= $row['id'] ?>"
onclick="return confirm('Delete Match?')">
Delete
</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>
