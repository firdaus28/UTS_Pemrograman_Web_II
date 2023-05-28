<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siakad";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengatur karakter set koneksi ke UTF-8
mysqli_set_charset($conn, "utf8");
?>