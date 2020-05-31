<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Pemasukan dan pengeluaran</h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $all_penjualanSum['totalPenjualan'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $all_pembelianSum['totalPembelian'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_user->num_rows() ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Stok</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all_menuSum['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Terbanyak Pembelian Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive badge">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Banyak</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_pembelianBanyak->result_array() as $row) {  ?>
                                    <tr>
                                        <td><?= $row['banyak']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Terbanyak Penjualan Keluar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive badge">
                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Banyak</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_penjualanBanyak->result_array() as $row) {  ?>
                                    <tr>
                                        <td><?= $row['banyak']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Pemasukan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Pengeluaran
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url() ?>asset/js/Chart.min.js"></script>
        <script>
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Pemasukan", "Pengeluaran"],
                    datasets: [{
                        data: [<?= $all_penjualanSum['totalPenjualan'] ?>, <?= $all_pembelianSum['totalPembelian'] ?>],
                        backgroundColor: ['#4e73df', '#1cc88a'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        </script>
    </div>

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