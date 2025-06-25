<?php include 'koneksi.php'; ?>

<?php
// Ambil kode produk dari URL
$kode = $_GET['kode_produk'];

// Query untuk hapus produk
$query = "DELETE FROM produk WHERE kode_produk = $kode";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    header("Location: index.php"); // Redirect setelah hapus
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>
