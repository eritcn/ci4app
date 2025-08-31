<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Register</title>
    
     <link rel="icon" href="<?= base_url('favicon-new.ico') ?>" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css');?> "rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
   <link href="<?= base_url('css/sb-admin-2.min.css');?> "rel="stylesheet">
   <style>
       /*.field-icon {*/
       /*    float: right;*/
       /*    margin-left: 235px;*/
       /*    margin-top: -30px;*/
       /*    position: relative;*/
       /*    z-index: 2;*/
       /*}*/
       
            @media(max-width: 576px) {
           .field-icon {
               top: 18px !important;
               right: 35px !important;
               font-size: 1rem;
           }
       }
       
       @media(min-width: 577px) {
           .field-icon {
               top: 15px;
               right: 32px;
               font-size: 1.2rem;
           }
       }
   </style>

</head>

<body class="bg-dark">

    <div class="container">

      <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                       <img class="col-md-4"
                                    src="<?= base_url('img/daftar.png'); ?>" >
                                <h3 class="h4 text-gray-700"><b> Belum Punya Akun? Yuk</h4>
                                <h1 class="h4 text-gray-700 mb-4"><?=lang('Auth.register')?></h1>
                            </div>

                             <?= view('Myth\Auth\Views\_message_block') ?>

                            <form action="<?= route_to('register') ?>" method="post" class="user">
                              <?= csrf_field() ?>
                     
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username"
                                        placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                        placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                        
                                </div>
                                <div class="form-group row ">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            name="password" id="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                             <span toggle="#password" class= "fa fa-fw fa-eye field-icon toggle-password" style="position:absolute; cursor: pointer;"></span>
                                    </div>
                                    <div class="col-sm-6">
                                           
                                        <input type="password" name="pass_confirm" id="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                             placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                           <span toggle="#pass_confirm" class= "fa fa-fw fa-eye field-icon toggle-password" style="position:absolute; cursor: pointer;"></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-user btn-block">
                                    <?=lang('Auth.register')?>
                                </button>
                          
                            </form>
                            <hr>
                          
                            <div class="text-center">
                                <a class="small" href="<?= url_to('login') ?>"><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a>
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
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
  <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
     <script src="<?= base_url('js/sb-admin-2.min.js');?>"></script>

</body>

</html>