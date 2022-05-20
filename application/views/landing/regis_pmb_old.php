<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>PMB | UMBanten</title>

    <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="<?=base_url()?>assets/bootstrap/css/form-validation.css" rel="stylesheet"> -->


    <script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
  </head>

  <body class="bg-light" onload="document.getElementById('myDIV').style.display = 'none';">
    <link href="<?php echo base_url();?>assets/vendors/toastr/css/toastr.min.css" rel="stylesheet" />
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url();?>assets/vendors/toastr/js/toastr.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.js"></script>

  <script type="text/javascript">
    function myFunction(val){
      if(val == 0){
        document.getElementById('myDIV').style.display = 'none';
      }else{
        document.getElementById('myDIV').style.display = 'block';
      }
    }
  </script>


    <div class="container">
      
      <div class="py-3 text-center">
        <h2>Segera Daftar!</h2>
        <h1>QUOTA TERBATAS</h1>
      </div>
      
      <hr class="mt-0">
      <!-- <p></p> -->
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Welcome...</span>
            <!-- <span class="badge badge-secondary badge-pill">4</span> -->
          </h4>
          <img src="<?=base_url()?>assets/brosur_umb.jpeg" style="width: 100%"><p></p>
          <div class="text-center">
            <a href="<?=base_url()?>pmb/brosur" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download Brosur</a>
          </div>
        </div>

        <div class="col-md-8 order-md-1 pb-4">
          <h4 class="mb-3 text-center">FORM REGESTRASI PMB</h4>
          <div class="card">
            <div class="card-body">
              <?php 
              if(get_cookie('affiliasi')){ ?>
              <p class="lead text-center">Terimakasih telah melakukan resitrasi PMB atau Affiliasi Marketing, Silahkan cek status pendaftaran atau Affiliasi Anda</p>
                <div class=" text-center">
                  <a class="btn btn-success btn-lg" onclick="test();">Cek Status</a>
                </div>
              <?php }else{ ?>
              <form method="post" action="" class="test" id="test_form">
                <input type="hidden" name="ref_by" value="<?=get_cookie('ref_by')?>">
              <!-- <form class="needs-validation" method="POST" id="register" action="#" novalidate> -->
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="" value="" required>
                    <div class="invalid-feedback text-muted">
                      Valid name is required.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName">No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="0812....." required="">
                    <div class="invalid-feedback text-muted" style="width: 100%;">
                      Your phone is required.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="email">Email <span class="text-muted">(Unik)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback text-muted">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="state">Lokasi</label>
                    <select class="form-control custom-select d-block w-100" id="lokasi" name="lokasi" required>
                      <option value="">Pilih...</option>
                      <?php 
                        $lokasi = $this->db->get('lokasi_kampus')->result();
                        foreach ($lokasi as $row) {
                      ?>
                        <option value="<?=$row->id?>"><?=$row->nama_kampus?></option>
                      <?php } ?>
                    </select>
                    <div class="invalid-feedback text-muted">
                      Please provide a valid state.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="state">Registrasi</label>
                    <select onchange="myFunction(this.value)" class="form-control custom-select d-block w-100" id="affiliasi" name="affiliasi" required>
                      <option value="0">PMB</option>
                      <option value="1">PMB & Affiliasi Marketing</option>
                    </select>
                    <div class="invalid-feedback text-muted">
                      Please provide a valid state.
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                <div id="myDIV">
                <!-- <h4 class="mb-3">Payment</h4> -->

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="cc-name">Nama BANK</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="" >
                    <!-- <small class="text-muted">Full name as displayed on card</small> -->
                    <div class="invalid-feedback text-muted">
                      Name Of BANK is required
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="cc-number">Nomor Rekening</label>
                    <input type="number" class="form-control" id="no_rek" name="no_rek" placeholder="" >
                    <div class="invalid-feedback text-muted">
                      Rekening number is required
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="cc-number">Nama Pemilik Rekening</label>
                    <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="" >
                    <div class="invalid-feedback text-muted">
                      Name Of rekening number is required
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                </div>
                <div class="mb-3 text-center">
                  <button class="btn btn-primary btn-lg" type="submit">Daftar Sekarang</button>
                </div>
                <!-- <br/> -->
              </form>
              <?php } ?>
                <div class=" text-center">
                  <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">Cek Status</button>
                </div>
              </div>
          </div>
        </div>
      </div>

      <footer class="my-5 pt-10 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cek Status Pendaftaran Kamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" class="test" id="cek_form">
          <label for="email">Email <span class="text-muted">(Unik)</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
          <div class="invalid-feedback text-muted">
            Please enter a valid email address for shipping updates.
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="cek_form" class="btn btn-primary">Cek Sekarang</button>
      </div>
    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=base_url()?>assets/bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="<?=base_url()?>assets/bootstrap/js/vendor/popper.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/vendor/holder.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/popper.js/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/@coreui/coreui/js/coreui.min.js"></script>
  <script>
    $('#test_form').on('submit', function(e){
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url: "<?=base_url()?>pmb/register",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "json",
        })
        .done(function(res) {
            if(res.success) {
                toastr.success(res.msg, 'Success', 
                    {
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    })
                   window.setTimeout( function(){
                       window.location = "<?=base_url()?>pmb/status";
                   }, 2000 );
            } else {
                toastr.error(res.msg, 'Failed', 
                    {
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    })
                // alert('gagal');
            }
        })
            
      });

    $('#cek_form').on('submit', function(e){
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url: "<?=base_url()?>pmb/cek_status",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: "json",
        })
        .done(function(res) {
            if(res.success) {
                toastr.success(res.msg, 'Success', 
                    {
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    })
                   window.setTimeout( function(){
                       window.location = "<?=base_url()?>pmb/status";
                   }, 2000 );
            } else {
                toastr.error(res.msg, 'Failed', 
                    {
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    })
                // alert('gagal');
            }
        })
            
      });


  </script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
