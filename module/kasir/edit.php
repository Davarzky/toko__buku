<?php
// Ambil id_kasir dari URL
$id_kasir = $_GET['id_kasir'];

// Query untuk mengambil data kasir berdasarkan id_kasir
$sql = "SELECT * FROM kasir WHERE id_kasir = $id_kasir";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Kasir</h5>
        <div class="card">
            <div class="card-body">
                <form action="process.php" method="post">
                    <input type="hidden" name="module" value="kasir">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_kasir" value="<?= $id_kasir ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="<?= $row['status'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="akses" class="form-label">Akses</label>
                        <select class="form-select" id="akses" name="akses">
                            <option value="admin" <?= $row['akses'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="kasir" <?= $row['akses'] == 'kasir' ? 'selected' : '' ?>>Kasir</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?module=kasir&action=index" class="btn btn-secondary">Batal</a>
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
