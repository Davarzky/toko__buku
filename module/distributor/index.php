<?php
$sql = "SELECT * FROM distributor";
$hasil = $koneksi->query($sql)
?>

<a href="index.php?module=distributor&action=create" class="btn btn-primary">Tambah Distributor</a>
<?php include 'layout/notification.php'?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Distributor</th>
      <th scope="col">Alamat</th>
      <th scope="col">Telepon</th>
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
      <td><?=$row['nama_distributor']?></td>
      <td><?=$row['alamat']?></td>
      <td><?=$row['telepon']?></td>
      <td>
        <a href="index.php?module=distributor&action=edit&id_distributor=<?=$row['id_distributor']?>" class="btn btn-warning">Edit</a>
        <a href="index.php?module=distributor&action=detail&id_distributor=<?=$row['id_distributor']?>" class="btn btn-info">Detail</a>
        <a href="process.php?module=distributor&action=delete&id_distributor=<?=$row['id_distributor']?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php $i++; endwhile;?>
  </tbody>
</table>