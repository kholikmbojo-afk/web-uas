<?php
// database.php

// PENTING: Host-nya HARUS 'db-server' (mengikuti nama service di docker-compose)
$host     = 'db-server'; 
$db       = 'uas_db';
$user     = 'uas_user';
$password = 'uas_password';

// MENGGUNAKAN MYSQLI AGAR COCOK DENGAN index.php LU
$conn = mysqli_connect($host, $user, $password, $db);

// Cek koneksi, jika gagal langsung stop biar gampang didebug
if (!$conn) {
    die("Koneksi database ke Docker gagal: " . mysqli_connect_error());
}

// Set charset agar support utf8mb4 seperti setelan awal lu
mysqli_set_charset($conn, "utf8mb4");
?>