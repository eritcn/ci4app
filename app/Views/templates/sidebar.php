  <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion"  id="accordionSidebar" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-mug-hot text-light text-sm"></i>
                </div>
                <div class="sidebar-brand-text mx-1 text-info">Coffee_Time<sup class="sup text-light text-12px">++</sup></div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider border-secondary">

<?php if (in_groups('admin')) : ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                User Manage
            </div>
        
            <!-- User List -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-users text-primary"></i>
                    <span class="user-list text-gray-500"><b> User List </b></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider border-secondary">
<?php endif; ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                User Profile
            </div>

            <!-- My Profile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-user text-success"></i>
                    <span class="my-profile text-gray-500"><b> My Profile </b></span></a>
            </li>

            <hr class="sidebar-divider border-secondary">

            <!-- New Item Data Base -->
               <div class="sidebar-heading">
                Data Manage
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder text-warning"></i>
                    <span class="pages text-gray-500"> Page List </span>
                </a>   

                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-gray-700 py-1 collapse-inner rounded">

                    
                          <a class="nav-link" href="<?= base_url('database'); ?>">
                    <i class="fas fa-fw fa-file text-gray-400"></i>
                    <span class="data-base text-gray-400"><small> Stock Sparepart </small></span></a>


                         <a class="nav-link" href="<?= base_url('rigrfu'); ?>">
                    <i class="fas fa-fw fa-file text-gray-400"></i>
                    <span class="data-base text-gray-400"><small> Radio Rig Bagus </small></span></a>

                     <a class="nav-link" href="<?= base_url('rusak'); ?>">
                    <i class="fas fa-fw fa-file text-gray-400"></i>
                    <span class="data-base text-gray-400"><small> Radio Rig Rusak </small></span></a>


                     <a class="nav-link" href="<?= base_url('ht'); ?>">
                    <i class="fas fa-fw fa-file text-gray-400"></i>
                    <span class="data-base text-gray-400"><small> Repair Radio HT </small></span></a>

                       <a class="nav-link" href="<?= base_url('gsjob'); ?>">
                    <i class="fas fa-fw fa-file text-gray-400"></i>
                    <span class="data-base text-gray-400"><small> General Jobdesk </small></span></a>

                    </div>
                </div>   
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider border-secondary">

                  <!-- New Item Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt text-danger"></i>
                    <span class="logout text-gray-500"><b> Logout </b></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block border-secondary">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

               

        </ul>