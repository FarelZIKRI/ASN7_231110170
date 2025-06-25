<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Produk</h2>

    <!-- Form input data produk -->
    <form method="POST" action="">
        <div class="mb-3">
            <label>Kode Produk (Angka Unik)</label>
            <input type="number" name="kode_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga (Contoh: 15000.50)</label>
            <input type="text" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kadaluarsa</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    // Proses simpan data
    if (isset($_POST['simpan'])) {
        // Ambil nilai dari form
        $kode = (int)$_POST['kode_produk'];
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga = (float)$_POST['harga'];
        $tanggal = $_POST['tanggal_kadaluarsa'];

        // Query insert ke tabel produk
        $query = "INSERT INTO produk (kode_produk, nama_produk, kategori, harga, tanggal_kadaluarsa)
                  VALUES ('$kode', '$nama', '$kategori', '$harga', '$tanggal')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success mt-3'>Produk berhasil ditambahkan!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</body>
</html>
