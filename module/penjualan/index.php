<?php
include 'koneksi/config.php';

// Ambil data penjualan dari database
$sql = "SELECT penjualan.id_penjualan, buku.judul, penjualan.jumlah, penjualan.tanggal 
        FROM penjualan 
        INNER JOIN buku ON penjualan.id_buku = buku.id_buku";

$result = $koneksi->query($sql);
?>


    <div class="container">
        <h1>Riwayat Penjualan</h1>
        <a href="index.php?module=penjualan&action=create" class="btn btn-primary">Tambah Penjualan</a>
        <?php include 'layout/notification.php'; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
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
                            <td>
                             <a href="index.php?module=penjualan&action=detail&id_penjualan=<?=$row['id_penjualan']?>" class="btn btn-info">Detail</a>
                            <a href="process.php?module=penjualan&action=delete&id_penjualan=<?=$row['id_penjualan']?>" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data penjualan.</td>
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