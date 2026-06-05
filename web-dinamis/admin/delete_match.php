<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}

include '../config/database.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM matches WHERE id='$id'");

header("Location: matches.php");
?>