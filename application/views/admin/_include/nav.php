<div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button type="button" class="btn btn-rounded btn-light"><?= $this->user['email'] ?> <i class="fas fa-user"></i></button>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url() ?>admin/profile"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>

                    <?php if ($this->user['role'] == 1) { ?>
                        <a class="dropdown-item" href="<?= base_url() ?>admin/settings"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Settings</a>
                    <?php } ?>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                </div>
            </li>
        </ul>
    </nav>