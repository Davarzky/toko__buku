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

                    // Lakukan operasi tambah data ke tabel pasok
                    $sql = "INSERT INTO pasok (id_buku, jumlah, tanggal) VALUES ('$id_buku_current', '$jumlah_current', '$tanggal')";
                    if ($koneksi->query($sql) === TRUE) {
                        echo "Data pasok berhasil ditambahkan.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $koneksi->error;
                    }
                }
            }

            $_SESSION['flash_message'] = 'Pasok berhasil ditambahkan!';
        }

        header('Location: index.php?module=pasok&action=index');
        break;

    case 'delete':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id_pasok = $_GET['id_pasok'];

            // Hapus entri pasok dari database
            $sql_delete = "DELETE FROM pasok WHERE id_pasok = '$id_pasok'";
            if ($koneksi->query($sql_delete) === TRUE) {
                $_SESSION['flash_message'] = 'Pasok berhasil dihapus!';
            } else {
                echo "Error: " . $sql_delete . "<br>" . $koneksi->error;
            }
        }

        header('Location: index.php?module=pasok&action=index'); // Redirect kembali ke halaman utama
        break;

    case 'update':
        // Tambahkan kode untuk aksi update di sini
        break;

    default:
        // Jika aksi tidak dikenali, lakukan sesuatu di sini
        break;
}

// Tutup koneksi
$koneksi->close();
?>
