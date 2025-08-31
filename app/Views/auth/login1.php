<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Login</title>
    
    <link rel="icon" href="<?= base_url('favicon-new.ico') ?>" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css');?> "rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('css/sb-admin-2.min.css');?> "rel="stylesheet">
    
     <style>
      
       .field-icon {
    position: absolute;
    top: 50%;
    right: 15px;  /* jarak dari kanan */
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d; /* abu-abu biar soft */
    font-size: 1.1rem;
    }

    </style>

</head>

<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                         <img class="col-md-4"
                                    src="<?= base_url('img/visitor.png'); ?>" >
                                        <h5 class="h4 text-gray-700"> <b>Selamat Datang, Yuk </h5>
                                        <h1 class="h4 text-gray-700 mb-4"> <?=lang('Auth.loginTitle')?></h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form action= "<?= route_to('login') ?>" method="post" class="user">
                                      <?= csrf_field() ?>
                                    
                                    <?php if ($config->validFields === ['email']): ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                name="login" 
                                                placeholder="<?=lang('Auth.email')?>">
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                        </div>
                                    <?php endif; ?>

                                           <div class="form-group position-relative">
                                              <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="password" 
                                              placeholder="<?=lang('Auth.password')?>"><span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                           </div>

                                    <?php if ($config->allowRemembering): ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input " name="remembering" <?php if (old('remember')) : ?> checked <?php endif ?>> 
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                     <?php endif; ?>   

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?=lang('Auth.loginAction')?>
                                        </button>
                                    </form>
                                    
                                    <hr>

                                      <div class="d-flex justify-content-between mt-3">
                                       <a class="small ml-3" href="<?= base_url('forgot') ?>">Lupa password?</a>
                                       <span></span>
                                       <a class="small mr-3" href="<?= url_to('register') ?>">Mau buat akun?</a>
                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
      </div>
    
       <script>
        document.querySelectorAll(".toggle-password").forEach(function(toggle) {
            toggle.addEventListener("click", function() {
                const input = document.querySelector(this.getAttribute("toggle"));
                const type = input.getAttribute("type") === "password" ? "text" : "password";
                input.setAttribute("type", type);
                this.classList.toggle("fa-eye-slash");
                this.classList.toggle("fa-eye");
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/sb-admin-2.min.js');?>"></script>

</body>

</html>