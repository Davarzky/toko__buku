<?php
// Ambil id_kasir dari URL
$id_kasir = $_GET['id_kasir'];

// Query untuk mengambil data kasir berdasarkan id_kasir
$sql = "SELECT * FROM kasir WHERE id_kasir = $id_kasir";
$result = $koneksi->query($sql);

// Periksa apakah kasir dengan id tersebut ditemukan
if ($result->num_rows > 0) {
    // Ambil data kasir
    $row = $result->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Detail Kasir</h5>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="<?= $row['status'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="akses" class="form-label">Akses</label>
                        <input type="text" class="form-control" id="akses" name="akses" value="<?= $row['akses'] ?>" readonly>
                    </div>
                    <a href="index.php?module=kasir&action=index" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    echo "Kasir tidak ditemukan.";
}
?>
