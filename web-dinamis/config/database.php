<?php

$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$db   = getenv('DB_NAME') ?: 'worldcup2026';

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $db
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>