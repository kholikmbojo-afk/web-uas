<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../config/database.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM news WHERE id='$id'");

header("Location: news.php");
?>
