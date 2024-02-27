<div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create Distributor</h5>
              <div class="card">
                <div class="card-body">
                  <form action="process.php" method="post">
                    <input type="hidden" name="module" value="distributor">
                    <input type="hidden" name="action" value="store">
                    <div class="mb-3">
                      <label for="nama_distributor" class="form-label">Nama Distributor</label>
                      <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" >
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                      <label for="telepon" class="form-label">Telepon</label>
                      <input type="text" class="form-control" id="telepon" name="telepon">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>