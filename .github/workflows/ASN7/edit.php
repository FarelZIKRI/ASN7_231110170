<?php include 'koneksi.php'; ?>
<?php
// Ambil kode produk dari URL
$kode = $_GET['kode_produk'];

// Ambil data berdasarkan kode
$data = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = $kode");
$row = mysqli_fetch_assoc($data); // Ambil baris data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Produk</h2>

    <!-- Form edit data -->
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="<?= $row['nama_produk']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= $row['kategori']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="harga" value="<?= $row['harga']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kadaluarsa</label>
            <input type="date" name="tanggal_kadaluarsa" value="<?= $row['tanggal_kadaluarsa']; ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>

    <?php
    // Proses update data
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['kategori'];
        $harga = (float)$_POST['harga'];
        $tanggal = $_POST['tanggal_kadaluarsa'];

        // Query update data
        $query = "UPDATE produk SET 
                    nama_produk='$nama',
                    kategori='$kategori',
                    harga='$harga',
                    tanggal_kadaluarsa='$tanggal'
                  WHERE kode_produk=$kode";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success mt-3'>Produk berhasil diupdate! <a href='index.php'>Kembali</a></div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</body>
</html>
