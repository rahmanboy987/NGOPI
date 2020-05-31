<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>

    <h1 class="h3 mb-2 text-gray-800">Menu</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTable Menu</h6>
        </div>
        <div class="card-body py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Tambah Menu</button>

            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Tambah Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" action="<?= base_url() ?>admin/add_menu" method="post" autocomplete="off">
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Menu</label>
                                        <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu" required><br>
                                        <div class="row">
                                            <div class="col-sm">
                                                <label>Harga Menu</label>
                                                <input type="number" name="harga_menu" class="form-control" placeholder="Harga Menu" required>
                                            </div>
                                            <div class="col-sm">
                                                <label>Stock Menu</label>
                                                <input type="number" name="stock_menu" class="form-control" placeholder="Stock Menu" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_menu" value="Makanan">
                                            <label class="form-check-label">Makanan</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_menu" value="Minuman">
                                            <label class="form-check-label">Minuman</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_menu" value="Other" checked>
                                            <label class="form-check-label">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="add_menu" class="btn btn-primary">Add Menu</button>
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
                            <th>Jenis</th>
                            <th>Nama</th>
                            <th>Harga Jual</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_menu->result_array() as $row) {  ?>
                            <tr>
                                <td>
                                    <?php if ($row['jenis_produk'] == "Makanan") { ?>
                                        <button class="btn btn-success badge"><?= $row['jenis_produk']; ?></button>
                                    <?php } else if ($row['jenis_produk'] == "Minuman") { ?>
                                        <button class="btn btn-primary badge"><?= $row['jenis_produk']; ?></button>
                                    <?php } else if ($row['jenis_produk'] == "Other") {  ?>
                                        <button class="btn btn-secondary badge"><?= $row['jenis_produk']; ?></button>
                                    <?php } ?>
                                </td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['harga_jual']; ?></td>
                                <td><?= $row['stock_produk']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#edit_user<?= $row['id_produk'] ?>">Edit</button>

                                    <div class="modal fade" id="edit_user<?= $row['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_userLabel">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form role="form" action="<?= base_url() . 'admin/edit_menu/' . $row['id_produk'] ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Nama Menu</label>
                                                                <input type="text" name="nama_produk" class="form-control" value="<?= $row['nama_produk'] ?>" required><br>
                                                                <div class="row">
                                                                    <div class="col-sm">
                                                                        <label>Harga Menu</label>
                                                                        <input type="number" name="harga_jual" class="form-control" value="<?= $row['harga_jual'] ?>" required>
                                                                    </div>
                                                                    <div class="col-sm">
                                                                        <label>Stock Menu</label>
                                                                        <input type="number" name="stock_produk" class="form-control" value="<?= $row['stock_produk'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jenis_menu" value="Makanan" <?php if ($row['jenis_produk'] == 'Makanan') echo "checked" ?>>
                                                                    <label class="form-check-label">Makanan</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jenis_menu" value="Minuman" <?php if ($row['jenis_produk'] == 'Minuman') echo "checked" ?>>
                                                                    <label class="form-check-label">Minuman</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jenis_menu" value="Other" <?php if ($row['jenis_produk'] == 'Other') echo "checked" ?>>
                                                                    <label class="form-check-label">Other</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_menu" class="btn btn-primary">Edit Menu</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" onclick="del_barang<?= $row['id_produk'] ?>()" class="btn btn-danger badge">Delete</a>
                                    <script>
                                        function del_barang<?= $row['id_produk'] ?>() {
                                            var txt;
                                            if (confirm("Anda yakin ingin mendelete data ini?")) {
                                                window.location = "<?= base_url() . 'admin/hapusMenu/' . $row['id_produk'] ?>";
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