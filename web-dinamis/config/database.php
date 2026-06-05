<?php
// database.php

// PENTING: Host-nya HARUS 'db-server' (mengikuti nama service di docker-compose), BUKAN 'localhost' atau '127.0.0.1'
$host     = 'db-server'; 
$db       = 'uas_db';
$user     = 'uas_user';
$password = 'uas_password';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $password, $options);
     // echo "Koneksi sukses!"; // matikan ini jika sudah aman
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>