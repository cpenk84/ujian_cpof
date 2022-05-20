<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Sistem Informasi KHS | Login</title>
    <!-- Icons-->
    <link href="<?php echo base_url();?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>

    <link href="<?php echo base_url();?>assets/vendors/toastr/css/toastr.min.css" rel="stylesheet" />
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url();?>assets/vendors/toastr/js/toastr.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.js"></script>
    <script>
        function validateForm() {
          var identity = document.forms["myForm"]["identity"].value;
          var password = document.forms["myForm"]["password"].value;
          if (identity == "") {
          toastr.warning('Username Cannot Empty', 'Warning', 
            {
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": true,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            })
            return false;
          }
          if (password == "") {
          toastr.warning('Password Cannot Empty', 'Warning', 
            {
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": true,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            })
            return false;
          }
        }
    </script>

  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
  
            <?php 
            $attributes = array('name' => 'myForm', 'onsubmit' => 'return validateForm()');
            echo form_open("auth/login", $attributes);?>
              <div class="card-body">
                <h1><?php echo lang('login_heading');?></h1>
                <p class="text-muted"><?php echo lang('login_subheading');?></p>
                <div id="infoMessage"><?php echo $message;?></div>
                <!-- <span>test</span> -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <?php echo form_input($identity, $identity, ' class="form-control" placeholder="Email / Username"');?>
                  <!-- <input class="form-control" type="text" name="identity" value id="identity" placeholder="Email / Username"> -->
                </div>
                <!-- <span>test</span> -->
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <?php echo form_input($password, '', ' class="form-control" placeholder="Password"');?>
                  <!-- <input class="form-control" type="password" name="password" value id="password" placeholder="Password"> -->
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <a href="forgot_password" class="btn btn-link px-0"><?php echo lang('login_forgot_password');?></a>
                    <!-- <button class="btn btn-link px-0" type="button">Forgot password?</button> -->
                  </div>
                </div>
              </div>
            <?php echo form_close();?>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <!-- <img height="120" src="<?=base_url()?>assets/img/avatars/logo.png"> -->
                  <h2>Sistem Registrasi Sertifikat</h2>
                  <p>Halaman Administrator</p>
                  <!-- <p>Pengolahan & Pengintputan data nilai untuk di terbitkan menjadi Kartu Hasil Studi ( KHS )</p> -->
                  <a href="<?php echo base_url();?>" class="btn btn-primary active mt-3" type="button">Home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo base_url();?>assets/vendors/popper.js/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/@coreui/coreui/js/coreui.min.js"></script>
  </body>
</html>
