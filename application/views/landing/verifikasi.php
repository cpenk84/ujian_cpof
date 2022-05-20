<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LPKN | Verifikasi Try Out</title>

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

  <body class="bg-light">
    <link href="<?php echo base_url();?>assets/vendors/toastr/css/toastr.min.css" rel="stylesheet" />
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url();?>assets/vendors/toastr/js/toastr.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.js"></script>

    <div class="container">
      
      <div class="py-3 text-center">
        <!-- <h2>Welcome</h2> -->
        <div class="col-md-8 mx-auto">
          <img class="mb-2" width="100%" src="<?=base_url()?>assets/header.jpeg">
        </div>
        <h1>Halaman Verifikasi</h1>
      </div>
      
      <hr class="mt-0">
      <!-- <p></p> -->
      <div class="row">
        <div class="col-md-12 order-md-1 pb-4">
        <?php if($success > 0){?>
          <h4 class="mb-3 text-center"><?=$msg?></h4>
          <div class=" text-center">
            <!-- <a href="<?=base_url()?>regis/tryout/<?=$slug?>" class="btn btn-success btn-lg">Masuk</a> -->
            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">Masuk</button>
          </div>
        <?php }else{ ?>
          <h4 class="mb-3 text-center"><?=$msg?></h4>
          <p class="text-center">Periksa kembali link yang anda peroleh, kemungkinan link tidak sesuai</p>
        <?php } ?>
        </div>
      </div>

      <footer class="my-5 pt-10 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020-2021 LPKN</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" class="test" id="cek_form">
          <input type="hidden" name="slug" value="<?=$slug?>">
          <label for="email">Email <span class="text-muted">(Unik)</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
          <div class="invalid-feedback text-muted">
            Please enter a valid email address for shipping updates.
          </div>
          <label for="email">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="invalid-feedback text-muted">
            Please enter a valid email address for shipping updates.
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="cek_form" class="btn btn-primary">Masuk Sekarang</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vkode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form method="post" action="" class="test" id="kode_form">
          <label for="kode"><h5>Kode Verifikasi</h5></label>
          <input type="number" class="form-control form-control-lg" id="kode" name="kode" required>
        </form>
        <br/>
        <div class="text-center">
          <h5>Untuk mengaktifkan regestrasi</h5>
          Masukan <b>6 kode verifikasi</b> yang telah dikirim ke WhatsApp & Email yang telah anda daftarkan<br/>
          Atau Klik <b>link verifikasi</b> yang ada pada pesan tersebut
        </div>
      </div>
      <div class="modal-footer text-center">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" form="kode_form" class="btn btn-primary btn-block">Konfirmasi</button>
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
    $('#cek_form').on('submit', function(e){
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            url: "<?=base_url()?>regis/login",
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
                       window.location = "<?=base_url()?>regis/tryout/<?=$slug?>";
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

  </body>
</html>
