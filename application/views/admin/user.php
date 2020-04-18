<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">User</h1>
  <p class="mb-4">User adalah seorang karyawan ataupun pemilik warkop tersebut.</p>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTabel User</h6>
    </div>
    <div class="card-body py-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Tambah User</button>

      <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="userModalLabel">Tambah User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="<?= base_url() ?>admin/add_user" method="post" autocomplete="off">
              <div class="modal-body">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="nama_user" class="form-control" placeholder="Nama User" required><br>
                    <label>Email</label>
                    <input type="email" name="email_user" class="form-control" placeholder="Email User" required><br>
                    <label>Password</label>
                    <input type="password" name="pass_user" class="form-control" placeholder="Password" required><br>
                    <div class="row">
                      <div class="col-sm">
                        <label>phone</label>
                        <input type="text" name="phone_user" class="form-control" placeholder="Phone Number" equired>
                      </div>
                      <div class="col-sm">
                        <label>KTP</label>
                        <input type="text" name="ktp_user" class="form-control" placeholder="KTP" required>
                      </div>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="role_user" value="1">
                      <label class="form-check-label">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="role_user" value="0" checked>
                      <label class="form-check-label">Kasir</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>KTP</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user as $usr) :  ?>
              <tr>
                <td><?php echo $usr['nama']; ?></td>
                <td><?php echo $usr['email']; ?></td>
                <td><?php echo $usr['phone']; ?></td>
                <td><?php echo $usr['ktp']; ?></td>
                <td><?php echo $usr['role']; ?></td>
                <td>
                  <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#edit_user<?= $usr['id'] ?>">
                    Edit
                  </button>

                  <div class="modal fade" id="edit_user<?= $usr['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="edit_userLabel">Edit Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <form role="form" action="<?= base_url() . 'admin/edit_user/' . $usr['id'] ?>" method="post">

                          <div class="modal-body">
                            <div class="card-body">
                              <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" name="nama_user" class="form-control" value="<?= $usr['nama'] ?>" required><br>
                                <label>Email</label>
                                <input type="email" name="email_user" class="form-control" value="<?= $usr['email'] ?>" required><br>
                                <label>Password</label>
                                <input type="password" name="pass_user" class="form-control" value="<?= $usr['pass'] ?>" required><br>
                                <div class="row">
                                  <div class="col-sm">
                                    <label>phone</label>
                                    <input type="text" name="phone_user" class="form-control" value="<?= $usr['phone'] ?>" equired>
                                  </div>
                                  <div class="col-sm">
                                    <label>KTP</label>
                                    <input type="text" name="ktp_user" class="form-control" value="<?= $usr['ktp'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="role_user" value="1" <?php if ($usr['role'] == 1) echo "checked" ?>>
                                  <label class="form-check-label">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="role_user" value="0" <?php if ($usr['role'] == 0) echo "checked" ?>>
                                  <label class="form-check-label">Kasir</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit_user" class="btn btn-primary">Edit User</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <a href="#" onclick="del_barang<?= $usr['id'] ?>()" class="btn btn-danger badge">Delete</a>
                  <script>
                    function del_barang<?= $usr['id'] ?>() {
                      var txt;
                      if (confirm("Anda yakin ingin mendelete data ini?")) {
                        window.location = "<?= base_url() . 'admin/hapusUser/' . $usr['id'] ?>";
                      }
                    }
                  </script>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>