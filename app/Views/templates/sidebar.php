
  <ul  class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion"  id="accordionSidebar" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-mug-hot text-gray-500 text-sm"></i>
                </div>
                <div class="sidebar-brand-text mx-1 text-info">Kopi - Susu<sup class="sup text-gray-500 text-12px">++</sup></div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider border-gray-700">

<?php if (in_groups('admin')) : ?>
            <!-- Heading -->
            <div class="sidebar-heading text-gray-800">
                Kelola Pengguna
            </div>
        
            <!-- User List -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-users text-primary"></i>
                    <span class="user-list text-gray-600"><b>Data Pengguna </b></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider border-gray-700">
<?php endif; ?>
            <!-- Heading -->
            <div class="sidebar-heading text-gray-800">
                Profil Pengguna
            </div>

            <!-- My Profile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-user text-success"></i>
                    <span class="my-profile text-gray-600"><b> Profil Saya Gaes</b></span></a>
            </li>

            <hr class="sidebar-divider border-gray-700">

            <!-- New Item Data Base -->
               <div class="sidebar-heading text-gray-800">
                Kelola List Data
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder text-warning"></i>
                    <span class="pages text-gray-600"> Halaman Data</span>
                </a>   

                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">

                    <div class="bg-gray-100 py-0 collapse-inner rounded">
                          <a class="nav-link" href="<?= base_url('database'); ?>">
                    <i class="fas fa-fw fa-file text-gray-700"></i>
                    <span class="data-base text-gray-700"><small> Stock Sparepart </small></span></a>


                         <a class="nav-link" href="<?= base_url('rigrfu'); ?>">
                    <i class="fas fa-fw fa-file text-gray-700"></i>
                    <span class="data-base text-gray-700"><small> Radio Rig Bagus </small></span></a>

                     <a class="nav-link" href="<?= base_url('rusak'); ?>">
                    <i class="fas fa-fw fa-file text-gray-700"></i>
                    <span class="data-base text-gray-700"><small> Radio Rig Rusak </small></span></a>


                     <a class="nav-link" href="<?= base_url('ht'); ?>">
                    <i class="fas fa-fw fa-file text-gray-700"></i>
                    <span class="data-base text-gray-700"><small> Perbaikan Radio HT </small></span></a>


                       <a class="nav-link" href="<?= base_url('gsjob'); ?>">
                    <i class="fas fa-fw fa-file text-gray-700"></i>
                    <span class="data-base text-gray-700"><small> Pekerjaan General </small></span></a>

                    </div>
                </div>   
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider border-gray-700">

            
                  <!-- New Item Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt text-danger"></i>
                    <span class="logout text-danger" onclick="return confirm('Apakah anda yakin mau keluar?');"><b>[ Logout ] </b></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block border-gray-700">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>      

        </ul>
    