<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">User</h1>
  <p class="mb-4">User adalah seorang karyawan ataupun pemilik warkop tersebut.</p>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTabel User</h6>
    </div>
    <div class="card-body py-3">
      <a href="#" class="btn btn-primary">Tambah User</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
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
                <td><?php echo $usr['pass']; ?></td>
                <td><?php echo $usr['phone']; ?></td>
                <td><?php echo $usr['ktp']; ?></td>
                <td><?php echo $usr['role']; ?></td>
                <td>
                  <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                    <span class="text">Edit</span>
                  </a>
                  <a href="<?= base_url(); ?>admin/hapusUser/<?= $usr['id']; ?>" class="btn btn-danger btn-icon-split btn-sm">
                    <span class="text">Delete</span>
                  </a>
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