<?php
include 'koneksi/config.php';

// Ambil id_penjualan dari parameter URL
$id_penjualan = $_GET['id_penjualan'];

// Query untuk mendapatkan detail penjualan berdasarkan id_penjualan
$sql = "SELECT penjualan.id_penjualan,total, buku.judul, penjualan.jumlah, penjualan.tanggal 
        FROM penjualan 
        INNER JOIN buku ON penjualan.id_buku = buku.id_buku
        WHERE penjualan.id_penjualan = $id_penjualan";

$result = $koneksi->query($sql);

// Jika tidak ada data, tampilkan pesan
if ($result->num_rows == 0) {
    echo "Data penjualan tidak ditemukan.";
    exit;
}

// Ambil data penjualan dari hasil query
$row = $result->fetch_assoc();
?>

<div class="container">
    <h1 class="mb-4">Detail Penjualan</h1>
    <div class="mb-3">
        <label class="form-label">Judul Buku:</label>
        <input type="text" class="form-control" value="<?= $row['judul'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah:</label>
        <input type="text" class="form-control" value="<?= $row['jumlah'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Total:</label>
        <input type="text" class="form-control" value="<?= $row['total'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal:</label>
        <input type="text" class="form-control" value="<?= $row['tanggal'] ?>" readonly>
    </div>
    <a href="index.php?module=penjualan&action=index" class="btn btn-primary">Kembali</a>
</div>


    <!-- Tambahkan link ke JS Bootstrap di sini -->

</html>

<?php
// Tutup koneksi
$koneksi->close();
?>
