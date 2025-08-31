<!-- Topbar -->
<nav class="navbar navbar-expand navbar bg-white topbar mb-4 static-top shadow">

    <div class="d-flex align-items-center justify-content-between w-100">
        
        <!-- Tombol Hamburger -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars fa-1x text-gray-900"></i>
        </button>



        <!-- Navbar kanan -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?= logged_in() ? user()->username : 'Guest'; ?>
                    </span>
                    <img class="img-profile rounded-circle" src="<?= base_url('img/hai.png'); ?>">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('user'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-600"></i> Profil Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i> Mau Keluar ?
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!--<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">-->

    <!-- Sidebar Toggle (Topbar) -->
<!--    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">-->
<!--        <i class="fa fa-bars"></i>-->
<!--    </button>-->

    <!-- Judul / Konten Topbar -->
<!--    <span class="navbar-brand font-weight-bold">Dashboard</span>-->

<!--</nav>-->

