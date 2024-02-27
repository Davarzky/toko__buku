<?php
session_start();
include 'koneksi/config.php'; 

switch ($action) {
    case 'store':
        $sql = "INSERT INTO distributor(nama_distributor, alamat, telepon) VALUES('".$_POST['nama_distributor']."','".$_POST['alamat']."','".$_POST['telepon']."')";
        $koneksi->query($sql);
        $_SESSION['flash_message'] = 'Data berhasil disimpan!';
        break;

    case 'delete':
        if(isset($_GET['id_distributor'])) {
            $id_distributor = $_GET['id_distributor'];
            $sql = "DELETE FROM distributor WHERE id_distributor = $id_distributor";
            $koneksi->query($sql);
            $_SESSION['flash_message'] = 'Data berhasil dihapus!';
        } else {
            $_SESSION['flash_message'] = 'ID distributor tidak ditemukan!';
        }
        break;

    case 'update':
        if(isset($_POST['action']) && $_POST['action'] === 'update') {
            $id_distributor = $_POST['id_distributor'];
            $nama = $_POST['nama_distributor'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];
            
            $sql = "UPDATE distributor SET nama_distributor='$nama', alamat='$alamat', telepon='$telepon' WHERE id_distributor=$id_distributor";
            
            if ($koneksi->query($sql) === TRUE) {
                $_SESSION['flash_message'] = 'Data Distributor berhasil diperbarui!';
            } else {
                $_SESSION['flash_message'] = 'Gagal memperbarui data distributor: ' . $koneksi->error;
            }
        }
        break;

    default:
        break;
}

header('Location: index.php?module=distributor&action=index');
?>
