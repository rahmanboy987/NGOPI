<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Kasir</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
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
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_menu->result_array() as $row) {  ?>
                            <tr>
                                <td><?= $row['jenis_produk']; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['harga_jual']; ?></td>
                                <td><?= $row['stock_produk']; ?></td>
                                <form role="form" action="<?= base_url() ?>admin/add_keranjang" method="post" autocomplete="off">
                                    <input type="hidden" name="id_barang" value="<?= $row['id_produk']; ?>">
                                    <td><input type="number" name="jumlah_jual" class="form-control" placeholder="Jumlah" required></td>
                                    <td><button type="submit" name="add_keranjang" class="btn btn-primary">Pesan</button></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Keranjang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($all_keranjang->result_array() as $row) {
                            $total = $total + ($row['harga_jual'] * $row['jumlah_jual']);
                        ?>
                            <tr>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['harga_jual']; ?></td>
                                <form role="form" action="<?= base_url() . 'admin/edit_keranjang/' . $row['id_keranjang'] ?>" method="post" autocomplete="off">
                                    <td><input type="number" name="jumlah_jual" class="form-control" value="<?= $row['jumlah_jual']; ?>" required></td>
                                    <td><?= $row['harga_jual'] * $row['jumlah_jual']; ?></td>
                                    <td>
                                        <button type="submit" name="edit_keranjang" class="btn btn-primary badge">Edit</button>
                                        <a href="#" onclick="del_barang<?= $row['id_keranjang'] ?>()" class="btn btn-danger badge">Delete</a>
                                        <script>
                                            function del_barang<?= $row['id_keranjang'] ?>() {
                                                var txt;
                                                if (confirm("Anda yakin ingin mendelete data ini?")) {
                                                    window.location = "<?= base_url() . 'admin/hapusPesanan/' . $row['id_keranjang'] ?>";
                                                }
                                            }
                                        </script>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" style="text-align:right">Total</th>
                            <th><?= $total ?></th>
                            <th>
                                <a href="#" onclick="reset_pesanan()" class="btn btn-danger badge">Reset Pesanan</a>
                                <script>
                                    function reset_pesanan() {
                                        var txt;
                                        if (confirm("Anda yakin ingin menreset data ini?")) {
                                            window.location = "<?= base_url() ?>admin/resetPesanan";
                                        }
                                    }
                                </script>
                                <br>
                                <form role="form" action="<?= base_url() ?>admin/bayar_pesanan" method="post" autocomplete="off">

                                    <input type="hidden" name="total_harga" value="<?= $total; ?>">
                                    <button type="submit" name="bayar_pesanan" class="btn btn-success badge">Bayar Pesanan</button>
                                </form>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>