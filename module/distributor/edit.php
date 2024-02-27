<?php
$id_distributor = $_GET['id_distributor'];

$sql = "SELECT * FROM distributor WHERE id_distributor = $id_distributor";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Distributor</h5>
        <div class="card">
            <div class="card-body">
                <form action="process.php" method="post">
                    <input type="hidden" name="module" value="distributor">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_distributor" value="<?= $id_distributor ?>">
                    <div class="mb-3">
                        <label for="nama_distributor" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" value="<?= $row['nama_distributor'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?module=distributor&action=index" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    echo "Distributor tidak ditemukan.";
}
?>
