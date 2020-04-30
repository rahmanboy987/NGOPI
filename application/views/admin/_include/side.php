<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $this->warkop_settings['name'] ?></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item <?php if (current_url() == base_url('admin')) echo 'active' ?>">
        <a class="nav-link" href="<?= base_url() ?>admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Dashboard</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management Laporan:</h6>
                <a class="collapse-item" href="#">Laporan Pemasukan</a>
                <a class="collapse-item" href="#">Laporan Pengeluaran</a>
                <a class="collapse-item" href="#">Laporan Pendapatan</a>
                <a class="collapse-item" href="#">Laporan Produk</a>
                <a class="collapse-item" href="#">Laporan Diskon</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-dolly-flatbed"></i>
            <span>Produk</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management Produk:</h6>
                <a class="collapse-item" href="#">Stock Produk</a>
                <a class="collapse-item" href="#">Kategori Produk</a>
                <a class="collapse-item" href="#">Paket</a>
                <a class="collapse-item" href="#">Promo</a>
                <a class="collapse-item" href="#">Pemesanan Produk</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?php if (current_url() == base_url('admin/user')) echo 'active' ?>">
        <a class="nav-link" href="<?= base_url() ?>admin/user">
            <i class="fas fa-fw fa-users"></i>
            <span>Karyawan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Kasir</span></a>
    </li>
    <li class="nav-item <?php if (current_url() == base_url('admin/settings')) echo 'active' ?>">
        <a class="nav-link" href="<?= base_url() ?>admin/settings">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<div id="content-wrapper" class="d-flex flex-column">