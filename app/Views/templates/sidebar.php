  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-battle-net"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Instrument<sup>2</sup></div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider ">

<?php if (in_groups('admin')) : ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                User Manage
            </div>
        
            <!-- User List -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-users"></i>
                    <span class="user-list text-white">User List</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider ">
<?php endif; ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                User Profile
            </div>

            <!-- My Profile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-user"></i>
                    <span class="my-profile text-white">My Profile</span></a>
            </li>

            <hr class="sidebar-divider ">

            <!-- New Item Data Base -->
               <div class="sidebar-heading">
                Data Manage
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('database'); ?>">
                    <i class="fas fa-book"></i>
                    <span class="data-base text-primary">Data Base Radio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('ready'); ?>">
                    <i class="fas fa-pager"></i>
                    <span class="data-base text-success">Rig Ready Stock </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('breakdown'); ?>">
                    <i class="fas fa-pager"></i>
                    <span class="data-base text-warning">Rig Breakdown </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('ht'); ?>">
                    <i class="fas fa-building"></i>
                    <span class="data-base text-gray-400">Repair Radio HT  </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('gs'); ?>">
                    <i class="fab fa-connectdevelop"></i>
                    <span class="data-base text-info">General Service</span></a>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider ">

                  <!-- New Item Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="logout text-danger">Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>