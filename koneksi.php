<?php
$host = "localhost"; // Sesuaikan dengan host database
$user = "root"; // Sesuaikan dengan username database
$pass = ""; // Sesuaikan dengan password database
$db   = "portofolio_raka"; // Sesuaikan dengan nama database

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
