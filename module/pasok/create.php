<div class="container">
    <h1>Tambah Pembelian ke Distributor</h1>
    <form action="process.php" method="post">
        <input type="hidden" name="module" value="pasok">
        <input type="hidden" name="action" value="store">
        <div class="mb-3">
            <label for="id_buku" class="form-label">Pilih Buku</label>
            <select class="form-select" id="id_buku" name="id_buku[]" multiple>
                <?php
                $sql = "SELECT * FROM buku WHERE stok > 0";
                $hasil = $koneksi->query($sql);
                while ($row = $hasil->fetch_assoc()): ?>
                    <option value="<?= $row['id_buku'] ?>" data-harga="<?= $row['harga_jual'] ?>"><?= $row['judul'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="distributor" class="form-label">Pilih Distributor</label>
            <select class="form-select" id="distributor" name="distributor">
                <?php
                $sql = "SELECT * FROM distributor";
                $hasil = $koneksi->query($sql);
                while ($row = $hasil->fetch_assoc()): ?>
                    <option value="<?= $row['id_distributor'] ?>"><?= $row['nama_distributor'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div id="jumlah_input">
            <!-- Field untuk memasukkan jumlah buku akan ditambahkan secara dinamis -->
        </div>
        <button type="button" class="btn btn-primary" onclick="tambahPembelian()">Tambah Pembelian</button>
        <button type="button" class="btn btn-primary" onclick="hitungTotal()">Hitung Total</button>
        <div class="mb-3">
            <label for="total" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total" name="total" readonly>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    // Fungsi untuk menambah input jumlah buku secara dinamis
    function tambahInputJumlahBuku() {
        var jumlahInputHTML = '<div class="mb-3">' +
                                    '<label for="jumlah_buku" class="form-label">Jumlah Buku</label>' +
                                    '<input type="number" class="form-control" name="jumlah[]" min="1">' +
                                '</div>';
        document.getElementById('jumlah_input').innerHTML += jumlahInputHTML;
    }

    // Panggil fungsi tambahInputJumlahBuku() saat halaman dimuat
    window.onload = tambahInputJumlahBuku;

    // Fungsi untuk menambah pembelian buku
    function tambahPembelian() {
        var div = document.createElement('div');
        div.className = 'mb-3';

        var selectBuku = document.getElementById('id_buku').cloneNode(true);
        div.appendChild(selectBuku);

        var jumlahInput = document.createElement('input');
        jumlahInput.type = 'number';
        jumlahInput.className = 'form-control';
        jumlahInput.name = 'jumlah[]';
        jumlahInput.min = '1';
        div.appendChild(jumlahInput);

        document.getElementById('jumlah_input').appendChild(div);
    }

    // Fungsi untuk menghitung total harga
    function hitungTotal() {
        var total = 0;
        var jumlahInputs = document.getElementsByName('jumlah[]');
        var hargaInputs = document.querySelectorAll('#id_buku option:checked');
        
        for (var i = 0; i < jumlahInputs.length; i++) {
            var jumlah = parseInt(jumlahInputs[i].value);
            var harga = parseInt(hargaInputs[i].getAttribute('data-harga'));
            total += jumlah * harga;
        }

        document.getElementById('total').value = total;
    }
</script>
