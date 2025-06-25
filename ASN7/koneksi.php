<?php
// Informasi koneksi database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "produk_makanan"; // Ganti sesuai nama database kamu

// Membuat koneksi ke MySQL
$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
