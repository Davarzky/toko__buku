<div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create Buku</h5>
              <div class="card">
                <div class="card-body">
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="module" value="buku">
                    <input type="hidden" name="action" value="store">
                    <div class="mb-3">
                      <label for="gambar" class="form-label">Gambar</label>
                      <input type="file" class="form-control" id="gambar" name="gambar" >
                    </div>
                    <div class="mb-3">
                      <label for="judul" class="form-label">judul</label>
                      <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                      <label for="noisbn" class="form-label">NO ISBN</label>
                      <input type="text" class="form-control" id="noisbn" name="noisbn">
                    </div>
                    <div class="mb-3">
                      <label for="penulis" class="form-label">Penulis</label>
                      <input type="text" class="form-control" id="penulis" name="penulis">
                    </div>
                    <div class="mb-3">
                      <label for="tahun" class="form-label">Tahun</label>
                      <input type="text" class="form-control" id="tahun" name="tahun">
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stok</label>
                      <input type="text" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="mb-3">
                      <label for="harga_pokok" class="form-label">Harga Pokok</label>
                      <input type="text" class="form-control" id="harga_pokok" name="harga_pokok">
                    </div>
                    <div class="mb-3">
                      <label for="harga_jual" class="form-label">Harga Jual</label>
                      <input type="text" class="form-control" id="harga_jual" name="harga_jual">
                    </div>
                    <div class="mb-3">
                      <label for="ppn" class="form-label">PPN</label>
                      <input type="text" class="form-control" id="ppn" name="ppn">
                    </div>
                    <div class="mb-3">
                      <label for="diskon" class="form-label">Diskon</label>
                      <input type="text" class="form-control" id="diskon" name="diskon">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>