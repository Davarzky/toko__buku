<?php
$id_distributor = $_GET['id_distributor'];

$sql = "SELECT * FROM distributor WHERE id_distributor = $id_distributor";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Detail Distributor</h5>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Distributor</label>
                        <input type="text" class="form-control" id="nama" name="nama_distributor" value="<?= $row['nama_distributor'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>" readonly>
                    </div>
                    <a href="index.php?module=distributor&action=index" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    echo "distributor tidak ditemukan.";
}
?>
