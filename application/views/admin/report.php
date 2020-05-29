<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Pemasukan dan pengeluaran</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pembelian</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="post" autocomplete="off">
                        <div class="form-row">
                            <div class="col-sm">
                                <input type="text" name="user" class="form-control" placeholder="Pegawai" required>
                            </div>
                            <div class="col-sm">
                                <input type="text" name="total_keluar" class="form-control" placeholder="Total Pengeluaran" required>
                            </div>
                            <div class="col-sm">
                                <button type="submit" name="add_menu" class="btn btn-primary">Add Pengeluaran</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pemasukan</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="post" autocomplete="off">
                        <div class="form-row">
                            <div class="col-sm">
                                <input type="text" name="kas" class="form-control" placeholder="Kas Masuk" required>
                            </div>
                            <div class="col-sm">
                                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                            </div>
                            <div class="col-sm">
                                <button type="submit" name="add_menu" class="btn btn-primary">Add Pemasukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>