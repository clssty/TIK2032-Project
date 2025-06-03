<?php
$servername = "localhost"; // Nama server database (biasanya localhost untuk pengembangan lokal)
$username = "root"; // Username database Anda (default XAMPP/WAMP)
$password = ""; // Password database Anda (default XAMPP/WAMP, kosong jika tidak diatur)
$dbname = "personal_portofolio"; // Nama database yang Anda buat di Langkah 1

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>