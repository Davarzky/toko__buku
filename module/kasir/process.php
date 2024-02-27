<?php
switch ($action) {
    case 'store':
        $sql = "INSERT INTO kasir(nama,alamat,telepon,status,username,password,akses) VALUES('".$_POST['nama']."','".$_POST['alamat']."','".$_POST['telepon']."','".$_POST['status']."','".$_POST['username']."','".$_POST['password']."','".$_POST['akses']."')";
        $koneksi->query($sql);
        $_SESSION['flash_message'] = 'Data berhasil disimpan!';
        break;
    case 'delete':
        if(isset($_GET['id_kasir'])) {
            $id_kasir = $_GET['id_kasir'];
            $sql = "DELETE FROM kasir WHERE id_kasir = $id_kasir";
            $koneksi->query($sql);
            $_SESSION['flash_message'] = 'Data berhasil dihapus!';
        } else {
            $_SESSION['flash_message'] = 'ID kasir tidak ditemukan!';
        }
        break;
        case 'update':
            if(isset($_POST['action']) && $_POST['action'] === 'update') {
                $id_kasir = $_POST['id_kasir'];
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                $status = $_POST['status'];
                $username = $_POST['username'];
                $akses = $_POST['akses'];
            
                $sql = "UPDATE kasir SET nama='$nama', alamat='$alamat', telepon='$telepon', status='$status', username='$username', akses='$akses' WHERE id_kasir=$id_kasir";
            
                if ($koneksi->query($sql) === TRUE) {
                    $_SESSION['flash_message'] = 'Data kasir berhasil diperbarui!';
                } else {
                    $_SESSION['flash_message'] = 'Gagal memperbarui data kasir: ' . $koneksi->error;
                }
            }
    default:
        break;
}
header('Location: index.php?module=kasir&action=index');
?>
