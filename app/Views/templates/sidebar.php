
  <ul  class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion"  id="accordionSidebar" >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://warkop.eritcn.my.id/">
                <div class="sidebar-brand-icon rotate-n-0 mb-2">
                    <i class="fas fa-mug-hot text-gray-500 text-sm ml-2"></i>
                </div>
                <div class="sidebar-brand-text mx-1 text-gray-500">KOPI <span class="text-info">NDAN</span><sup class="sup text-gray-500 text-12px"> <i class= "fas fa-smile text-gray-500 text-sm"></i></sup></div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider border-secondary">

<?php if (in_groups('admin')) : ?>

 <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users text-primary"></i>
                    <span class="pages text-gray-600">Kelola Pengguna</span>
                </a>   
  <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                    data-parent="#accordionSidebar">
      <div class="bg-gray-900 py-0 collapse-inner rounded">      <!-- Heading -->
          
            <!-- User List -->
           
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-list text-primary"></i>
                    <span class="user-list text-gray-500">Data Pengguna</span></a>

            <!-- Divider -->
            <hr class="sidebar-divider border-secondary">

            <!-- Heading -->
            
                  <!-- Edit Role -->
                <a class="nav-link" href="<?= site_url('admin/editRole'); ?>">
                    <i class="fas fa-fw fa-user-shield text-primary"></i>
                    <span class="user-role text-gray-500">Edit Role</span>
                </a>
                
                 <!-- Divider -->
                <hr class="sidebar-divider border-secondary">
        
            <!-- User List -->
            
                <a class="nav-link" href="<?= base_url('admin/logs'); ?>">
                    <i class="fas fa-fw fa-list text-primary"></i>
                    <span class="user-list text-gray-500">Log Aktivitas</span></a>

            <!-- Divider -->
      </div>  
     </div>
     

           <hr class="sidebar-divider border-secondary">
           
         <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagers" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-window-maximize text-success"></i>
                    <span class="pages text-gray-600">Export Excel</span>
                </a>   
  <div id="collapsePagers" class="collapse" aria-labelledby="headingPage"
                    data-parent="#accordionSidebar">
      <div class="bg-gray-900 py-0 collapse-inner rounded">      <!-- Heading -->
          
            <!-- User List -->
           
            <a class="nav-link" href="<?= base_url('export/users'); ?>" target="_blank">
            <i class="fas fa-fw fa-file-excel text-success"></i>
            <span class="text-gray-500">Export Users</span></a>

            <hr class="sidebar-divider border-secondary">

            <a class="nav-link" href="<?= base_url('/sparepart/export'); ?>" target="_blank">
            <i class="fas fa-fw fa-file-excel text-success"></i>
            <span class="text-gray-500">Export Sparepart</span></a>

               <!-- Export Sparepart PDF -->
            <a class="nav-link" href="<?= base_url('/sparepart/export-pdf'); ?>" target="_blank">
                <i class="fas fa-fw fa-file-pdf text-danger"></i>
                <span class="text-gray-500">Export Sparepart (PDF)</span>
            </a>

                  <!-- Import Sparepart -->
            <a class="nav-link" href="<?= base_url('/sparepart/import'); ?>">
                <i class="fas fa-fw fa-file-upload text-warning"></i>
                <span class="text-gray-500">Import Sparepart</span>
            </a>

            
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider border-secondary">
   
           
<?php endif; ?>

             <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePager" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-address-card text-info"></i>
                    <span class="pages text-gray-600">Profil Pengguna</span>
                </a>   
  <div id="collapsePager" class="collapse" aria-labelledby="headingPage"
                    data-parent="#accordionSidebar">
      <div class="bg-gray-900 py-0 collapse-inner rounded">      <!-- Heading -->
          
            <!-- User List -->
           
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-user text-info"></i>
                    <span class="user-list text-gray-500">Profilku Nih</span></a>

            <!-- Divider -->
            <hr class="sidebar-divider border-secondary">

            <!-- Heading -->
            
                  <!-- Edit Role -->
                <a class="nav-link" href="<?= site_url('profile/edit'); ?>">
                    <i class="fas fa-fw fa-pen text-info"></i>
                    <span class="user-role text-gray-500">Edit Profil</span>
                </a>
                
                 <!-- Divider -->
                <!--<hr class="sidebar-divider border-secondary">-->
    
      </div>  
     </div>  
   </li> 
       


            <hr class="sidebar-divider border-secondary">

            <!-- New Item Data Base -->
            <!--   <div class="sidebar-heading text-gray-500">-->
            <!--    Kelola List Data-->
            <!--</div>-->

            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-keyboard text-warning"></i>
                    <span class="pages text-gray-600"> Halaman Tabel</span>
                </a>   

                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">

                    <div class="bg-gray-900 py-0 collapse-inner rounded">
                        
                             <a class="nav-link" href="<?= base_url('gsjob'); ?>">
                    <i class="fas fa-fw fa-list text-warning"></i>
                    <span class="data-base text-gray-500">Pekerjaan General</span></a>
                    
                            <a class="nav-link" href="<?= base_url('ht'); ?>">
                    <i class="fas fa-fw fa-list text-warning"></i>
                    <span class="data-base text-gray-500">Perbaikan Radio HT</span></a> 
                        
                          <a class="nav-link" href="<?= base_url('sparepart'); ?>">
                    <i class="fas fa-fw fa-list text-warning"></i>
                    <span class="data-base text-gray-500">Stock Sparepart</a>


                         <a class="nav-link" href="<?= base_url('rigrfu'); ?>">
                    <i class="fas fa-fw fa-list text-warning"></i>
                    <span class="data-base text-gray-500">Baru bikin konsep</span></a>

                     <a class="nav-link" href="<?= base_url('rusak'); ?>">
                    <i class="fas fa-fw fa-list text-warning"></i>
                    <span class="data-base text-gray-500">Stock Radio Rig</span></a>

                    </div>
                </div>   
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider border-secondary">

            
                  <!-- New Item Logout -->
            <li class="nav-item">
              
            
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt text-danger"></i>
                                   <span class="logout text-danger"><b>[ Logout ]</b></span>
                                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block border-secondary">

            <!-- Sidebar Toggler (Sidebar) -->
            <!--<div class="text-center d-none d-md-inline">-->
            <!--    <button class="rounded-circle bg-dark border gray-900" id="sidebarToggle"></button>-->
            <!--</div>      -->

        </ul>
     
        