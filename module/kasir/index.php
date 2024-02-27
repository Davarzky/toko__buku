<?php
$sql = "SELECT * FROM kasir";
$hasil = $koneksi->query($sql);
?>

<a href="index.php?module=kasir&action=create" class="btn btn-primary">Tambah Kasir</a>
<?php include 'layout/notification.php'; ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Namaa</th>
      <th scope="col">Alamat</th>
      <th scope="col">Telepon</th>
      <th scope="col">Status</th>
      <th scope="col">Username</th>
      <th scope="col">Akses</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 1;
    while($row = $hasil->fetch_assoc()):
    ?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$row['nama']?></td>
      <td><?=$row['alamat']?></td>
      <td><?=$row['telepon']?></td>
      <td style="color: <?=$row['status'] == 'online' ? 'green' : 'red'?>;"><?=$row['status']?></td>
      <td><?=$row['username']?></td>
      <td><?=$row['akses']?></td>
      <td>
        <a href="index.php?module=kasir&action=edit&id_kasir=<?=$row['id_kasir']?>" class="btn btn-warning">Edit</a>
        <a href="index.php?module=kasir&action=detail&id_kasir=<?=$row['id_kasir']?>" class="btn btn-info">Detail</a>
        <a href="process.php?module=kasir&action=delete&id_kasir=<?=$row['id_kasir']?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php $i++; endwhile;?>
  </tbody>
</table>
