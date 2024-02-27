<?php
include 'koneksi/config.php';

// Ambil data pasok dari database
$sql = "SELECT pasok.id_pasok, buku.judul, pasok.jumlah, pasok.tanggal 
        FROM pasok 
        INNER JOIN buku ON pasok.id_buku = buku.id_buku";

$result = $koneksi->query($sql);
?>


    <div class="container">
        <h1>Riwayat Pasok</h1>
        <a href="index.php?module=pasok&action=create" class="btn btn-primary">Tambah Penjualan</a>
        <?php include 'layout/notification.php'; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><a href="index.php?module=pasok&action=detail&id_pasok=<?= $row['id_pasok'] ?>" class="btn btn-info">Detail</a>
                            <a href="process.php?module=pasok&action=delete&id_pasok=<?= $row['id_pasok'] ?>" class="btn btn-danger">Delete</a>

                          
                          </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data pasok.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Tambahkan link ke JS Bootstrap di sini -->


<?php
// Tutup koneksi
$koneksi->close();
?>
