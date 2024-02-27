<div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Create Kasir</h5>
              <div class="card">
                <div class="card-body">
                  <form action="process.php" method="post">
                    <input type="hidden" name="module" value="kasir">
                    <input type="hidden" name="action" value="store">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" >
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                      <label for="telepon" class="form-label">Telepon</label>
                      <input type="text" class="form-control" id="telepon" name="telepon">
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">Status</label>
                      <div class="input-group">
                        <select class="form-select" id="status" name="status">
                        <option value="online">online</option>
                        <option value="offline">offline</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                    <label for="akses" class="form-label">Akses</label>
                    <div class="input-group">
                        <select class="form-select" id="akses" name="akses">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        </select>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
                </div>
              </div>
            </div>
          </div>