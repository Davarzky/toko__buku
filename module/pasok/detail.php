<?php
include 'koneksi/config.php';

// Ambil id_pasok dari parameter URL
$id_pasok = $_GET['id_pasok'];

// Query untuk mendapatkan detail pasok berdasarkan id_pasok
$sql = "SELECT pasok.id_pasok, pasok.id_buku, pasok.jumlah, pasok.tanggal, buku.judul 
        FROM pasok 
        INNER JOIN buku ON pasok.id_buku = buku.id_buku
        WHERE pasok.id_pasok = $id_pasok";

$result = $koneksi->query($sql);

// Jika tidak ada data, tampilkan pesan
if ($result->num_rows == 0) {
    echo "Data pasok tidak ditemukan.";
    exit;
}

// Ambil data pasok dari hasil query
$row = $result->fetch_assoc();
?>

<div class="container">
    <h1 class="mb-4">Detail Pasok</h1>
    <div class="mb-3">
        <label class="form-label">Judul Buku:</label>
        <input type="text" class="form-control" value="<?= $row['judul'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah:</label>
        <input type="text" class="form-control" value="<?= $row['jumlah'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal:</label>
        <input type="text" class="form-control" value="<?= $row['tanggal'] ?>" readonly>
    </div>
    <a href="index.php?module=pasok&action=index" class="btn btn-primary">Kembali</a>
</div>

<!-- Tambahkan link ke JS Bootstrap di sini -->

</html>

<?php
// Tutup koneksi
$koneksi->close();
?>
