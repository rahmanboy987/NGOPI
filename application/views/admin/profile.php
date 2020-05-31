<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <h1 class="h3 mb-4 text-gray-800">Profile </h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Display Profile</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>Nama : </td>
                                    <td><?= $nama ?></td>
                                </tr>
                                <tr>
                                    <td>Email : </td>
                                    <td><?= $email ?></td>
                                </tr>
                                <tr>
                                    <td>No Telpon : </td>
                                    <td><?= $phone ?></td>
                                </tr>
                                <tr>
                                    <td>KTP : </td>
                                    <td><?= $ktp ?></td>
                                </tr>
                                <tr>
                                    <td>ROLE : </td>
                                    <td><?php if ($role == 1) echo "Admin";
                                        if ($role == 2) echo "Kasir";
                                        ?> </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url() ?>admin/edit_profile" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="nama_user" class="form-control" value="<?= $nama ?>" required><br>
                            <input type="email" name="email_user" class="form-control" value="<?= $email ?>" disabled><br>
                            <div class="row">
                                <div class="col-sm">
                                    <input type="text" name="phone_user" class="form-control" value="<?= $phone ?>" required>
                                </div>
                                <div class="col-sm">
                                    <input type="text" name="ktp_user" class="form-control" value="<?= $ktp ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="edit_profile" class="btn btn-primary">Edit Profile</button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_password">Edit Password</button>
                    <div class="modal fade" id="edit_password" tabindex="-1" role="dialog" aria-labelledby="edit_passwordLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit_passwordLabel">Edit Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form role="form" action="<?= base_url() ?>admin/edit_password" method="post">
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" name="old_pass" class="form-control" placeholder="Old Password" required><br>
                                                <label>New Password</label>
                                                <input type="password" name="new_pass" class="form-control" placeholder="New Password" required><br>
                                                <label>Retype New Password</label>
                                                <input type="password" name="retype_newpass" class="form-control" placeholder="Retype New Password" required><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="edit_password" class="btn btn-primary">Edit Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




</div>
</div>
</div>