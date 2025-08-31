<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>
    
    <link rel="icon" href="<?= base_url('favicon-new.ico') ?>" type="image/x-icon">
    
   <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">


    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
     <link href="<?= base_url('css/sb-admin-2.min.css');?> "rel="stylesheet">
     
     
   
     <!--<link rel="stylesheet" href="/public/fontawesome/css/all.min.css">-->
     
        <style>

            @media (max-width: 576px) {
.container-fluid {
    padding-left: 10px;
    padding-right: 10px;
  }
                
                
    .img-fluid {
        width: 100%;
        height: auto;
    }
    .doc {
        width: 100%;
        height: 32px;
        border-radius: 3px;
    }

    #accordionSidebar {
        position: absolute;
        left: 0;
        top: 0;
        width: 35%;
        max-width: 100px;
        height: 100%;
        background-color: #4e73df;
        transform: translateX(-100%);
        transition: transform 0.35s ease-in-out, box-shadow 0.3s ease-in-out;
        /*transition: transform 0.3s ease;*/
        z-index: 1040;
       
    }
    /* Sembunyi */
    /*#accordionSidebar.toggled {*/
        /*transform: translateX(-250px);*/
    /*    transform: translateX(-100%);*/
    /*    pointer-events: none;*/
    /*}*/
     #accordionSidebar.active {
        transform: translateX(0);
        box-shadow: 2px 0 10px rgba(0,0,0,0.3);
    }
    /* Konten tetap full */
    /*#content-wrapper {*/
    /*    margin-left: 0 !important;*/
    /*}*/
      #content-wrapper {
        margin-left: 0 !important;
        transition: margin-left 0.35s ease-in-out;
    }
    
        /* Backdrop */
    .sidebar-backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.3);
        z-index: 1030;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;/* di bawah sidebar */
    }
    /*.sidebar-open .sidebar-backdrop {*/
    /*    display: block;*/
    /*}*/.sidebar-backdrop.show {
        display: block;
        opacity: 1;
    }

            }       
           
           
           @media(min-width: 577px) {
           .img-fluid {
               width: 100%;
               height: 300px;
           }
           
              #accordionSidebar {
        transform: none !important;
        position: relative;
    }
    
     .badge-alert {
               font-size: 0.65rem;
               margin-left: 4px;
               vertical-align: middle;
           }
           }
           
          
 
   </style>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar For Desktop-->
      
      <?= $this->include('templates/sidebar'); ?>
       
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
             <?= $this->include('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                 <div class="container-fluid bg-white">
             <!-- <main role="main" class="col-md9 ml-sm-auto col-lg-10 px-4"> -->
             <?= $this->renderSection('page-content'); ?>
          
             </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><small>Copyright &copy; Belajar Bareng Erit CN | <?= date('Y'); ?></small></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"><b>Apakah yakin ingin keluar gaes?</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-gray-700 text-sm">Klik tombol <b class="text-gray-900">Cancel</b> untuk membatalkan, klik tombol <b class="text-gray-900">Logout</b> kalau itu memang sudah menjadi keputusan anda untuk tetap keluar, tiada daya dan upaya saya untuk mencegahnya.</div>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
     <!--<script src="<?= base_url('js/sb-admin-2.min.js');?>"></script>-->

   
     <script src="<?= base_url('js/tinymce/tinymce.min.js'); ?>"></script>
     <script>
         tinymce.init({
             selector: '#jenis_pekerjaan',
             plugins: 'lists',
             toolbar: 'undo redo | bold italic | bullist numlist',
             menubar: 'false',
             branding: 'false'
         });
     </script>

    <script>
        function previewImg() {
        const keterangan = document.querySelector('#keterangan');
        const keteranganLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        keteranganLabel.textContent = keterangan.files[0].name;

        const fileKeterangan = new FileReader();
        fileKeterangan.readAsDataURL(keterangan.files[0]);

        fileKeterangan.onload = function(e) {
            imgPreview.src = e.target.result;
        }
        }
    </script>
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('accordionSidebar');
    const toggleBtnTop = document.getElementById('sidebarToggleTop');
    const toggleBtn = document.getElementById('sidebarToggle');

    // Buat backdrop
    const backdrop = document.createElement('div');
    backdrop.classList.add('sidebar-backdrop');
    document.body.appendChild(backdrop);
    
       function toggleSidebar() {
        sidebar.classList.toggle('active');
        backdrop.classList.toggle('show');
    }

    // if (window.innerWidth <= 576) {
    //     sidebar.classList.add('toggled');
    // }
      if (window.innerWidth <= 576) {
        sidebar.classList.remove('active');
    }

    // function toggleSidebar() {
    //     sidebar.classList.toggle('toggled');
    //     document.body.classList.toggle('sidebar-open', !sidebar.classList.contains('toggled'));
    // }

    if (toggleBtnTop) toggleBtnTop.addEventListener('click', toggleSidebar);
    if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);

    // Klik backdrop untuk menutup
    backdrop.addEventListener('click', toggleSidebar);
});
</script>

</script>


</body>

</html>