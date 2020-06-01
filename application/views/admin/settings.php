<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <h1 class="h3 mb-2 text-gray-800">Settings</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Main Settings</h6>
        </div>
        <div class="card-body py-3">
            <form role="form" action="" method="post" autocomplete="off">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label>Nama Toko</label>
                            <input type="text" name="nama_toko" class="form-control" value="<?= $this->warkop_settings['name'] ?>" required>
                        </div>
                        <div class="col-sm">
                            <label>Nomor Telepon Toko</label>
                            <input type="text" name="telepon_toko" class="form-control" value="<?= $this->warkop_settings['phone'] ?>" required>
                        </div>
                    </div>
                    <label>Alamat Toko</label>
                    <textarea name="alamat_toko" class="form-control" required><?= $this->warkop_settings['place'] ?></textarea>
                    <label>Quotes Toko</label>
                    <div class="row">
                        <div class="col-sm">
                            <input type="text" name="quote_toko" class="form-control" value="<?= $this->warkop_settings['quotes'] ?>" required>
                        </div>
                        <div class="col-sm">
                            <button type="submit" name="set_settings" class="btn btn-primary">Set Settings</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Highlight Content</h6>
        </div>
        <div class="card-body py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#highlightModal">Tambah Highlight</button>

            <div class="modal fade" id="highlightModal" tabindex="-1" role="dialog" aria-labelledby="highlightModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="highlightModalLabel">Tambah Highlight</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= form_open_multipart('admin/add_highlight'); ?>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mini Text</label>
                                    <input type="text" name="minitext" class="form-control" placeholder="Minitext Highlight" required><br>
                                    <label>Text Label</label>
                                    <input type="text" name="textlabel" class="form-control" placeholder="Text Label Highlight" required><br>
                                    <label>Description</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Description" required></textarea><br>
                                    <label>Template</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="template" value="1">
                                        <label class="form-check-label">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="template" value="2">
                                        <label class="form-check-label">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="template" value="3" checked>
                                        <label class="form-check-label">3</label>
                                    </div><br>
                                    <label>Photo</label>
                                    <input type="file" name="foto" class="form-control">
                                    <small class="text-danger">Max file uploaded are 2MB</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="add_highlight" class="btn btn-primary">Add Highlight</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Mini Text</th>
                            <th>Text Label</th>
                            <th>Description</th>
                            <th>Template</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($highlight->result_array() as $row) {  ?>
                            <tr>
                                <td><?= $row['id_highlight']; ?></td>
                                <td><img src="<?= base_url('asset/img/') . $row['photo'] ?>" alt="<?= $row['photo']; ?>" width="100"></td>
                                <td><?= $row['mini_text']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['description']; ?></td>
                                <td><?= $row['template']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success badge" data-toggle="modal" data-target="#upload<?= $row['id_highlight'] ?>">Upload</button>

                                    <div class="modal fade" id="upload<?= $row['id_highlight'] ?>" tabindex="-1" role="dialog" aria-labelledby="uploadLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="uploadLabel">Upload Foto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <?= form_open_multipart('admin/upload_foto/' . $row['id_highlight']); ?>
                                                <div class="modal-body">
                                                    <div class="card-body text-center">
                                                        <img src="<?= base_url('asset/img/') . $row['photo'] ?>" alt="<?= $row['photo']; ?>" width="400">
                                                        <input type="file" name="foto" class="form-control" required>
                                                        <small class="text-danger">Max file uploaded are 2MB</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="#" onclick="deletefoto<?= $row['id_highlight'] ?>()" class="btn btn-danger">Hapus Foto</a>
                                                    <script>
                                                        function deletefoto<?= $row['id_highlight'] ?>() {
                                                            var txt;
                                                            if (confirm("Anda yakin ingin menghapus foto ini?")) {
                                                                window.location = "<?= base_url() . 'admin/delete_foto/' . $row['id_highlight'] ?>";
                                                            }
                                                        }
                                                    </script>
                                                    <button type="submit" name="upload_foto" class="btn btn-primary">Upload/Replace</button>
                                                </div>
                                                <?= form_close(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#edit_highlight<?= $row['id_highlight'] ?>">Edit</button>

                                    <div class="modal fade" id="edit_highlight<?= $row['id_highlight'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_highlightLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_highlightLabel">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form role="form" action="<?= base_url() . 'admin/edit_highlight/' . $row['id_highlight'] ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <label>Id</label>
                                                                        <input type="number" name="id_highlight" class="form-control" value="<?= $row['id_highlight']; ?>" required>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label>Mini Text</label>
                                                                        <input type="text" name="minitext" class="form-control" value="<?= $row['mini_text']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label>Text Label</label>
                                                                <input type="text" name="textlabel" class="form-control" value="<?= $row['name']; ?>" required><br>
                                                                <label>Description</label>
                                                                <textarea type="text" name="description" class="form-control" required><?= $row['description']; ?></textarea><br>
                                                                <label>Template</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="template" value="1" <?php if ($row['template'] == 1) echo "checked" ?>>
                                                                    <label class="form-check-label">1</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="template" value="2" <?php if ($row['template'] == 2) echo "checked" ?>>
                                                                    <label class="form-check-label">2</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="template" value="3" <?php if ($row['template'] == 3) echo "checked" ?>>
                                                                    <label class="form-check-label">3</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_highlight" class="btn btn-primary">Edit Highlight</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" onclick="del_barang<?= $row['id_highlight'] ?>()" class="btn btn-danger badge">Delete</a>
                                    <script>
                                        function del_barang<?= $row['id_highlight'] ?>() {
                                            var txt;
                                            if (confirm("Anda yakin ingin mendelete data ini?")) {
                                                window.location = "<?= base_url() . 'admin/delete_highlight/' . $row['id_highlight'] ?>";
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Schedule Content</h6>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Keterangan</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($schedule->result_array() as $schedule) {  ?>
                                <tr>
                                    <td><?= $schedule['days']; ?></td>
                                    <td><?= $schedule['descript']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#edit_schedule<?= $schedule['id_schedule'] ?>">Edit</button>

                                        <div class="modal fade" id="edit_schedule<?= $schedule['id_schedule'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_scheduleLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit_scheduleLabel">Edit Schedule</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form role="form" action="<?= base_url() . 'admin/edit_schedule/' . $schedule['id_schedule'] ?>" method="post">
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm">
                                                                            <label>Hari</label>
                                                                            <input type="text" name="hari" class="form-control" value="<?= $schedule['days']; ?>" required><br>
                                                                        </div>
                                                                        <div class="col-sm">
                                                                            <label>Deskripsi</label>
                                                                            <input type="text" name="waktu" class="form-control" value="<?= $schedule['descript']; ?>" required><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit_schedule" class="btn btn-primary">Edit Schedule</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Home Menu Content</h6>
            </div>
            <div class="card-body">
                <form role="form" action="<?= base_url() ?>admin/add_homeMenu" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Add Home Menu</label>
                        <select multiple class="form-control" name="menu[]">
                            <?php foreach ($all_menu->result_array() as $row) {  ?>
                                <option value="<?= $row['id_produk'] ?>"><?= '[' . $row['jenis_produk'] . '] ' . $row['nama_produk'] . '[' . $row['harga_jual'] . ']' ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="add_homeMenu" class="btn btn-primary badge">Add Home Menu</button>
                </form>
            </div>

            <div class="table-responsive badge">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Produk</th>
                            <th>Harga Jual</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_homeMenu->result_array() as $row) {  ?>
                            <tr>
                                <td><?= $row['id_menu']; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['harga_jual']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#edit_user<?= $row['id_menu'] ?>">Edit</button>

                                    <div class="modal fade" id="edit_user<?= $row['id_menu'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_userLabel">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form role="form" action="<?= base_url() . 'admin/edit_homeMenu/' . $row['id_menu'] ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Id Menu</label>
                                                                <input type="number" name="id_menu" class="form-control" value="<?= $row['id_menu'] ?>" required><br>
                                                                <div class="form-group">
                                                                    <label>Add Home Menu</label>
                                                                    <select class="form-control" name="menu">
                                                                        <?php foreach ($all_menu->result_array() as $rows) {  ?>
                                                                            <option value="<?= $rows['id_produk'] ?>" <?php if ($rows['id_produk'] == $row['id_produk']) echo "selected"; ?>><?= '[' . $rows['jenis_produk'] . '] ' . $rows['nama_produk'] . '[' . $rows['harga_jual'] . ']' ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_homeMenu" class="btn btn-primary">Edit Menu</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" onclick="del_barang<?= $row['id_menu'] ?>()" class="btn btn-danger badge">Delete</a>
                                    <script>
                                        function del_barang<?= $row['id_menu'] ?>() {
                                            var txt;
                                            if (confirm("Anda yakin ingin mendelete data ini?")) {
                                                window.location = "<?= base_url() . 'admin/hapusHomeMenu/' . $row['id_menu'] ?>";
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>