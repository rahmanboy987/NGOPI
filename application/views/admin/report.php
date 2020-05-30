<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Pemasukan dan pengeluaran</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pembelian Masuk</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url() ?>admin/add_pembelian" method="post" autocomplete="off">
                        <div class="form-row">
                            <div class="col-sm">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Pegawai</label>
                                    </div>
                                    <select class="custom-select" name="id_user">
                                        <option selected>Choose...</option>
                                        <?php foreach ($all_user->result_array() as $row) {  ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <input type="number" name="total_beli" class="form-control" placeholder="Total Pengeluaran" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <textarea name="keterangan" class="form-control" placeholder="Keterangan Pengeluaran"></textarea>
                            <br>
                            <button type="submit" name="add_pembelian" class="btn btn-primary badge">Add Pengeluaran</button>
                        </div>
                    </form>

                    <br>

                    <div class="table-responsive badge">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>DateTime</th>
                                    <th>User</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_pembelian->result_array() as $row) {  ?>
                                    <tr>
                                        <td><?= $row['waktu_masuk']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['total_harga']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#laporanDetail<?= $row['id_masuk'] ?>">Lihat Data</button>

                                            <div class="modal fade" id="laporanDetail<?= $row['id_masuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="laporanDetailLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="laporanDetailLabel">Detail Laporan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>DateTime</th>
                                                                                <th>User</th>
                                                                                <th>Total Harga</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><?= $row['waktu_masuk']; ?></td>
                                                                                <td><?= $row['nama']; ?></td>
                                                                                <td><?= $row['total_harga']; ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="4" style="text-align:left">
                                                                                    <b>Keterangan : </b> <br>
                                                                                    <?= $row['keterangan']; ?>
                                                                                </th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
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
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Penjualan Keluar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive badge">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>DateTime</th>
                                    <th>User</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_penjualan->result_array() as $row) {  ?>
                                    <tr>
                                        <td><?= $row['waktu_keluar']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['total_harga']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary badge" data-toggle="modal" data-target="#laporanDetail<?= $row['id_keluar'] ?>">Lihat Data</button>

                                            <div class="modal fade" id="laporanDetail<?= $row['id_keluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="laporanDetailLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="laporanDetailLabel">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Menu</th>
                                                                                <th>Harga</th>
                                                                                <th>Jumlah</th>
                                                                                <th>Subtotal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $total = 0;
                                                                            $id_keluar = $row['id_keluar'];
                                                                            $query = $this->db->query("SELECT produk.nama_produk, produk.harga_jual, detail_keluar.jumlah_keluar, detail_keluar.subtotal_keluar FROM detail_keluar LEFT JOIN produk ON detail_keluar.id_barang=produk.id_produk WHERE detail_keluar.id_keluar='$id_keluar'");

                                                                            foreach ($query->result_array() as $row) {
                                                                                $total = $total + $row['subtotal_keluar']; ?>
                                                                                <tr>
                                                                                    <td><?= $row['nama_produk']; ?></td>
                                                                                    <td><?= $row['harga_jual']; ?></td>
                                                                                    <td><?= $row['jumlah_keluar']; ?></td>
                                                                                    <td><?= $row['subtotal_keluar']; ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="3" style="text-align:right">Total</th>
                                                                                <th><?= $total ?></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
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
    </div>
</div>
</div>