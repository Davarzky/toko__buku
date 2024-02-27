<?php
include 'koneksi/config.php';

// Memastikan variabel $action sudah didefinisikan sebelum digunakan
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    case 'store':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_buku = $_POST['id_buku'];
            $jumlah = $_POST['jumlah'];
            $tanggal = $_POST['tanggal'];

            // Memastikan bahwa $id_buku adalah array sebelum menggunakan count()
            if (is_array($id_buku)) {
                for ($i = 0; $i < count($id_buku); $i++) {
                    $id_buku_current = $id_buku[$i];
                    $jumlah_current = $jumlah[$i];

                    // Ambil harga jual buku dari database
                    $query_harga = "SELECT harga_jual FROM buku WHERE id_buku = '$id_buku_current'";
                    $result_harga = $koneksi->query($query_harga);
                    $row_harga = $result_harga->fetch_assoc();
                    $harga_buku = (int)$row_harga['harga_jual']; // Konversi harga menjadi integer

                    // Hitung total harga untuk buku saat ini
                    $total_harga = $jumlah_current * $harga_buku;

                    // Periksa apakah entri dengan id_buku dan tanggal yang sama sudah ada dalam database
                    $sql_check = "SELECT * FROM penjualan WHERE id_buku = '$id_buku_current' AND tanggal = '$tanggal'";
                    $result_check = $koneksi->query($sql_check);

                    if ($result_check->num_rows > 0) {
                        // Jika sudah ada, lakukan pembaruan jumlah dan total harga
                        $sql_update = "UPDATE penjualan SET jumlah = jumlah + '$jumlah_current', total = total + '$total_harga' WHERE id_buku = '$id_buku_current' AND tanggal = '$tanggal'";
                        $koneksi->query($sql_update);
                    } else {
                        // Jika belum ada, lakukan penambahan entri baru
                        $sql_insert = "INSERT INTO penjualan (id_buku, jumlah, total, tanggal) VALUES ('$id_buku_current', '$jumlah_current', '$total_harga', '$tanggal')";
                        $koneksi->query($sql_insert);
                    }
                }
            }

            $_SESSION['flash_message'] = 'Penjualan berhasil ditambahkan!';
        }

        header('Location: index.php?module=penjualan&action=index');
        break;

        case 'delete':
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_penjualan'])) {
                // Ambil id_penjualan yang akan dihapus dari parameter GET
                $id_penjualan = $_GET['id_penjualan'];
    
                // Query untuk menghapus penjualan berdasarkan id_penjualan
                $sql_delete = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";
                if ($koneksi->query($sql_delete) === TRUE) {
                    $_SESSION['flash_message'] = 'Penjualan berhasil dihapus!';
                } else {
                    $_SESSION['flash_message'] = 'Error: ' . $koneksi->error;
                }
            } else {
                $_SESSION['flash_message'] = 'ID Penjualan tidak valid!';
            }
    
            header('Location: index.php?module=penjualan&action=index'); // Redirect kembali ke halaman utama
            break;

    case 'update':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_buku = $_POST['id_buku'];
            $jumlah = $_POST['jumlah'];

            // Memastikan bahwa $id_buku adalah array sebelum menggunakan count()
            if (is_array($id_buku)) {
                // Lakukan pembaruan stok untuk setiap buku yang dipilih
                for ($i = 0; $i < count($id_buku); $i++) {
                    $id_buku_current = $id_buku[$i];
                    $jumlah_current = $jumlah[$i];

                    // Perbarui jumlah stok buku
                    $sql_update = "UPDATE penjualan SET jumlah = '$jumlah_current' WHERE id_buku = '$id_buku_current'";
                    $koneksi->query($sql_update);
                }

                $_SESSION['flash_message'] = 'Penjualan berhasil diperbarui!';
            }
        }

        header('Location: index.php?module=penjualan&action=index'); // Redirect kembali ke halaman utama
        break;

    default:
        // Jika aksi tidak dikenali, lakukan sesuatu di sini
        break;
}
?>
