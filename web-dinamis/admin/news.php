```php
<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM news ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Manage News</title>

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

.header{
    background:linear-gradient(135deg,#001f54,#003566);
    color:white;
    padding:20px 30px;
}

.container{
    width:95%;
    margin:30px auto;
}

h1{
    color:#001f54;
    margin-bottom:20px;
}

.top-menu{
    display:flex;
    gap:10px;
    margin-bottom:20px;
}

.btn{
    text-decoration:none;
    padding:12px 18px;
    border-radius:10px;
    color:white;
    font-weight:bold;
}

.add{
    background:#198754;
}

.back{
    background:#6c757d;
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
    background:#f8f9fa;
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

.badge{
    background:#001f54;
    color:white;
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
}

</style>
</head>
<body>

<div class="header">
    <h2>📰 World Cup 2026 - News Management</h2>
</div>

<div class="container">

    <h1>Manage News</h1>

    <div class="top-menu">

        <a href="add_news.php" class="btn add">
            ➕ Add News
        </a>

        <a href="dashboard.php" class="btn back">
            🏠 Dashboard
        </a>

    </div>

    <table>

        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)): ?>

        <tr>

            <td><?= $row['id']; ?></td>

            <td>
                <?= htmlspecialchars($row['title']); ?>
            </td>

            <td>
                <span class="badge">Published</span>
            </td>

            <td>

                <a class="edit"
                   href="edit_news.php?id=<?= $row['id']; ?>">
                   ✏ Edit
                </a>

                |

                <a class="delete"
                   href="delete_news.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Delete this news?')">
                   🗑 Delete
                </a>

            </td>

        </tr>

        <?php endwhile; ?>

    </table>

</div>

</body>
</html>
```
