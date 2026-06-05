<?php
session_start();
include '../config/database.php';

if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
    exit();
}

$error = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, username, password FROM admins WHERE username = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){

        $admin = mysqli_fetch_assoc($result);

        if(password_verify($password, $admin['password'])){

            $_SESSION['admin'] = $admin['username'];

            header("Location: dashboard.php");
            exit();

        }else{
            $error = "Password salah!";
        }

    }else{
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>World Cup 2026 Admin Login</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#001f54,#003566);
}

.login-box{
    width:420px;
    background:white;
    border-radius:20px;
    padding:40px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
}

.logo{
    text-align:center;
    font-size:60px;
}

h1{
    text-align:center;
    color:#001f54;
    margin-top:10px;
}

.subtitle{
    text-align:center;
    color:#666;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:14px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:15px;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#c1121f;
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#9d0208;
}

.error{
    background:#ffe5e5;
    color:#d00000;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
}

.footer{
    margin-top:20px;
    text-align:center;
    color:#888;
    font-size:13px;
}

</style>
</head>
<body>

<div class="login-box">

    <div class="logo">🏆</div>

    <h1>WORLD CUP 2026</h1>

    <p class="subtitle">
        Admin Control Panel
    </p>

    <?php if($error != ""): ?>
        <div class="error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required>

        <button type="submit" name="login">
            LOGIN
        </button>

    </form>

    <div class="footer">
        FIFA World Cup 2026 Administration System
    </div>

</div>

</body>
</html>
