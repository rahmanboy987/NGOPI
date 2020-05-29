<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
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
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Homepage</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Tools</div>
    <?php if ($this->user['role'] == 1) { ?>
        <li class="nav-item <?php if (current_url() == base_url('admin/report')) echo 'active' ?>">
            <a class="nav-link" href="<?= base_url() ?>admin/report">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Laporan</span></a>
        </li>
    <?php } ?>

    <li class="nav-item <?php if (current_url() == base_url('admin/stock')) echo 'active' ?>">
        <a class="nav-link" href="<?= base_url() ?>admin/stock">
            <i class="fas fa-fw fa-dolly-flatbed"></i>
            <span>Stock Produk</span></a>
    </li>

    <?php if ($this->user['role'] == 1) { ?>
        <li class="nav-item <?php if (current_url() == base_url('admin/user')) echo 'active' ?>">
            <a class="nav-link" href="<?= base_url() ?>admin/user">
                <i class="fas fa-fw fa-users"></i>
                <span>Karyawan</span></a>
        </li>
    <?php } ?>

    <li class="nav-item <?php if (current_url() == base_url('admin/kasir')) echo 'active' ?>">
        <a class="nav-link" href="<?= base_url() ?>admin/kasir">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Kasir</span></a>
    </li>

    <?php if ($this->user['role'] == 1) { ?>
        <li class="nav-item <?php if (current_url() == base_url('admin/settings')) echo 'active' ?>">
            <a class="nav-link" href="<?= base_url() ?>admin/settings">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span></a>
        </li>
    <?php } ?>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<div id="content-wrapper" class="d-flex flex-column">