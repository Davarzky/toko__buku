<?php
include 'koneksi/config.php'; 

switch ($action) {
    case 'store':
        if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $gambar = $_FILES['gambar']['name']; 
            $gambar_tmp = $_FILES['gambar']['tmp_name']; 
            $gambar_path = 'assets/images/products/' . $gambar; 
            move_uploaded_file($gambar_tmp, $gambar_path);
        } else {
            $gambar = ''; 
        }

        $sql = "INSERT INTO buku(gambar, judul, noisbn, penulis, tahun, stok, harga_pokok, harga_jual, ppn, diskon) VALUES ('$gambar', '".$_POST['judul']."', '".$_POST['noisbn']."', '".$_POST['penulis']."', '".$_POST['tahun']."', '".$_POST['stok']."', '".$_POST['harga_pokok']."', '".$_POST['harga_jual']."', '".$_POST['ppn']."', '".$_POST['diskon']."')";
        $koneksi->query($sql);
        $_SESSION['flash_message'] = 'Data berhasil disimpan!';
        break;

        case 'delete':
            if(isset($_GET['id_buku'])) {
                $id_buku = $_GET['id_buku'];
                
                $sql_check_pasok = "SELECT * FROM pasok WHERE id_buku = $id_buku";
                $result_check_pasok = $koneksi->query($sql_check_pasok);
        
                if ($result_check_pasok->num_rows > 0) {
                    $_SESSION['flash_message'] = 'Buku tidak dapat dihapus karena memiliki relasi dengan tabel pasok!';
                } else {
                    $sql_delete_buku = "DELETE FROM buku WHERE id_buku = $id_buku";
                    if ($koneksi->query($sql_delete_buku) === TRUE) {
                        $_SESSION['flash_message'] = 'Buku berhasil dihapus!';
                    } else {
                        $_SESSION['flash_message'] = 'Error: ' . $koneksi->error;
                    }
                }
            } else {
                $_SESSION['flash_message'] = 'ID buku tidak ditemukan!';
            }
            break;

    case 'update':
        if(isset($_POST['action']) && $_POST['action'] === 'update') {
            $id_buku = $_POST['id_buku'];
            $old_image = $_POST['old_image']; 

            if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $gambar = $_FILES['gambar']['name']; 
                $gambar_tmp = $_FILES['gambar']['tmp_name']; 
                $gambar_path = 'assets/images/products/' . $gambar; 
                move_uploaded_file($gambar_tmp, $gambar_path);
                unlink('assets/images/products/' . $old_image);
            } else {
                $gambar = $old_image; 
            }

            $judul = $_POST['judul'];
            $noisbn = $_POST['noisbn'];
            $penulis = $_POST['penulis'];
            $tahun = $_POST['tahun'];
            $stok = $_POST['stok'];
            $harga_pokok = $_POST['harga_pokok'];
            $harga_jual = $_POST['harga_jual'];
            $ppn = $_POST['ppn'];
            $diskon = $_POST['diskon'];
            
            $sql = "UPDATE buku SET  judul='$judul', noisbn='$noisbn', penulis='$penulis', tahun='$tahun', stok='$stok', harga_pokok='$harga_pokok', harga_jual='$harga_jual', ppn=$ppn, diskon=$diskon, gambar='$gambar' WHERE id_buku = $id_buku";
            
            if ($koneksi->query($sql) === TRUE) {
                $_SESSION['flash_message'] = 'Data buku berhasil diperbarui!';
            } else {
                $_SESSION['flash_message'] = 'Gagal memperbarui data buku: ' . $koneksi->error;
            }
        }
        break;

    default:
        break;
}

header('Location: index.php?module=buku&action=index');
?>
