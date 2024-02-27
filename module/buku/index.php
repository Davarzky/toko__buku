    <?php
    $sql = "SELECT * FROM buku";
    $hasil = $koneksi->query($sql);
    ?>

    <a href="index.php?module=buku&action=create" class="btn btn-primary">Tambah Buku</a>
    <?php include 'layout/notification.php'; ?>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Gambar</th>
        <th scope="col">Judul</th>
        <th scope="col">Harga</th>
        <th scope="col">No ISBN</th>
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
        <td><img src="/assets/images/products/<?=$row['gambar']?>" style="max-width: 100px;"></td>
        <td><?=$row['judul']?></td>
        <td><?=$row['harga_jual']?></td>
        <td><?=$row['noisbn']?></td>

        <td>
            <a href="index.php?module=buku&action=edit&id_buku=<?=$row['id_buku']?>" class="btn btn-warning">Edit</a>
            <a href="index.php?module=buku&action=detail&id_buku=<?=$row['id_buku']?>" class="btn btn-info">Detail</a>
            <a href="process.php?module=buku&action=delete&id_buku=<?=$row['id_buku']?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php $i++; endwhile;?>
    </tbody>
    </table>
