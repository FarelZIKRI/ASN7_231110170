<?php include 'koneksi.php'; // Menghubungkan ke database ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Produk Makanan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Daftar Produk Makanan</h2>

    <!-- Tombol untuk menambah data baru -->
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Produk</a>

    <!-- Tabel data produk -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Ambil semua data dari tabel produk
        $result = mysqli_query($conn, "SELECT * FROM produk");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['kode_produk']}</td>
                <td>{$row['nama_produk']}</td>
                <td>{$row['kategori']}</td>
                <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                <td>{$row['tanggal_kadaluarsa']}</td>
                <td>
                    <!-- Tombol Edit dan Hapus -->
                    <a href='edit.php?kode_produk={$row['kode_produk']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus.php?kode_produk={$row['kode_produk']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
