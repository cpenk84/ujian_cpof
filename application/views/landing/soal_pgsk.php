<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
  <title>LPKN | Status Regestrasi</title>
  <!-- Icons-->
  <link href="<?php echo base_url();?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>form_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
  </head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">


<script>
// Set the date we're counting down to
var countDownDate = new Date("<?=$batas_waktu?>").getTime();

function pad(number, length) {
   
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
   
    return str;

}
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = pad(hours,2)+":"+pad(minutes,2)+":"+pad(seconds, 2);
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "WAKTU HABIS";
    $.ajax({
        type: "POST",
        url: "<?=site_url('regis/finish/'.$kelas->id.'/'.$user_regis->id)?>",
        dataType: "json",
    })
    .done(function(res) {
      if(res.success) {
        alert('WAKTU HABIS... Terima Kasih');
        window.location = "<?=base_url()?>preview/tryout/<?=$slug?>";
      }else{
        alert('GAGAL PENYIMPAN NILAI');
      }
    })
  }
}, 100);
</script>

<script>
    function auto_send(val){
      if(navigator.onLine){
        id_soal = '<?=$detail_soal_pgsk->id?>';
        // jawaban = this.value();
        $.get("<?=base_url()?>regis/auto_save_jawaban/pgsk/"+id_soal+"/"+val, function(data){
          var response = jQuery.parseJSON(data);
          if(response.status == 'success'){
            Swal.fire({
              icon: response.status,
              title: 'Terimakasih',
              text: 'Berhasil Menyimpan Nilai',
              showConfirmButton: false,
              timer: 3500
            })
              // 
              setTimeout(function(){ window.close(); }, 3500);
              window.opener.location.reload();
          }else{
            Swal.fire({
              icon: response.status,
              title: 'Gagal',
              text: 'Maaf Terjadi Error',
              showConfirmButton: false,
              timer: 1500
            })
          }
        })
      }else{
        alert('Koneksi Terputus');
      }
    }
</script>


  </head>

  <body class="bg-light">
    <link href="<?php echo base_url();?>assets/vendors/toastr/css/toastr.min.css" rel="stylesheet" />
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url();?>assets/vendors/toastr/js/toastr.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.js"></script>
    <div class="container">
      
      <div class="py-2 text-center">
        <!-- <h2>Welcome To</h2> -->
        <div class="col-md-8 mx-auto">
          <img class="mb-2" width="100%" src="<?=base_url()?>assets/header.jpeg">
        </div>
        <h1><?=$kelas->judul?></h1>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
      
      <!-- <p></p> -->
      <hr class="mt-0">
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">No. Soal</span>
            <!-- <span class="badge badge-secondary badge-pill">4</span> -->
          </h4>
          <div class="card">
            <div class="card-body">
              <div class="row col-md-12">
                <?php $no = 1; foreach ($soal_sb as $row) { $no_soal = $no++ ?>
                <div class="col-md-2 mb-2">
                  <a href="<?=base_url()?>regis/soal_sb/<?=$slug?>/<?=$row->id?>/<?=$no_soal?>" class="btn btn-sm <?=($row->jawaban == '0') ? "btn-secondary" : "btn-dark"?> text-white">
                    <h5><?=$no_soal?></h5>
                    <i class="fa fa-check-circle fa-2x"></i>
                  </a>
                </div>
                <?php } ?>
                <?php $no = 26; foreach ($soal_pg as $row) { $no_soal = $no++ ?>
                <div class="col-md-2 mb-2">
                  <a href="<?=base_url()?>regis/soal_pg/<?=$slug?>/<?=$row->id?>/<?=$no_soal?>" class="btn btn-sm <?=($row->jawaban == '0') ? "btn-secondary" : "btn-dark"?> text-white">
                    <h5><?=$no_soal?></h5>
                    <i class="fa fa-check-circle fa-2x"></i>
                  </a>
                </div>
                <?php } ?>
                <?php $no = 81; foreach ($soal_pgsk as $row) { $no_soal = $no++ ?>
                <div class="col-md-2 mb-2">
                  <a href="<?=base_url()?>regis/soal_pgsk/<?=$slug?>/<?=$row->id?>/<?=$no_soal?>" class="btn btn-sm <?=($row->jawaban == '0') ? "btn-secondary" : "btn-dark"?> text-white <?=($row->id == $detail_soal_pgsk->id) ? "active" : ""?>">
                    <h5><?=$no_soal?></h5>
                    <i class="fa fa-check-circle fa-2x"></i>
                  </a>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- <img src="<?=base_url()?>assets/brosur_umb.jpeg" style="width: 100%"><p></p> -->
          <div class="text-center">
            <a href="<?=base_url()?>pmb/brosur" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download Brosur</a>
          </div>
        </div>

        <div class="col-md-8 order-md-1 pb-4">
          <div class="row col-md-12">
            <div class="col-md-6 text-left">
              <h4 class="mb-3">TRY OUT SYSTEM</h4>
            </div>
            <div class="col-md-6 text-right">
              <h4 class="mb-3" id="demo"></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card h-100 h5">
                <div class="card-header">Soal</div>
                <div class="card-body">
                  <ol start="<?=$start_no?>">
                    <li class="text-justify"><?=$detail_soal_pgsk->soal_ujian?></li>
                  </ol>

                  <div class="col-md-12 pl-5">
                    <div class="row">
                      <div class="icheck-success d-inline col-md-6">
                        <input type="radio" <?=($jawaban['jawaban'] == 'a') ? 'checked' : ''?> id="<?=$detail_soal_pgsk->id?>_pg_a" name="soal_pg_<?=$detail_soal_pgsk->id?>" onclick="auto_send('a');" value="a" required>
                        <label style="font-weight: 500;" for="<?=$detail_soal_pgsk->id?>_pg_a">a. <?=$detail_soal_pgsk->jawaban_a?></label>
                      </div>
                      <div class="icheck-success d-inline col-md-6">
                        <input type="radio" <?=($jawaban['jawaban'] == 'b') ? 'checked' : ''?> id="<?=$detail_soal_pgsk->id?>_pg_b" name="soal_pg_<?=$detail_soal_pgsk->id?>" onclick="auto_send('b');" value="b" required>
                        <label style="font-weight: 500;" for="<?=$detail_soal_pgsk->id?>_pg_b">b. <?=$detail_soal_pgsk->jawaban_b?></label>
                      </div>
                      <div class="icheck-success d-inline col-md-6">
                        <input type="radio" <?=($jawaban['jawaban'] == 'c') ? 'checked' : ''?> id="<?=$detail_soal_pgsk->id?>_pg_c" name="soal_pg_<?=$detail_soal_pgsk->id?>" onclick="auto_send('c');" value="c" required>
                        <label style="font-weight: 500;" for="<?=$detail_soal_pgsk->id?>_pg_c">c. <?=$detail_soal_pgsk->jawaban_c?></label>
                      </div>
                      <div class="icheck-success d-inline col-md-6">
                        <input type="radio" <?=($jawaban['jawaban'] == 'd') ? 'checked' : ''?> id="<?=$detail_soal_pgsk->id?>_pg_d" name="soal_pg_<?=$detail_soal_pgsk->id?>" onclick="auto_send('d');" value="d" required>
                        <label style="font-weight: 500;" for="<?=$detail_soal_pgsk->id?>_pg_d">d. <?=$detail_soal_pgsk->jawaban_d?></label>
                      </div>
                    </div>
                  </div>
                </div>
                <!--
                <div class="card-footer">
                  <div class="row">
                    <?=$link?>
                  </div>
                </div>
                -->
              </div>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>

        </div>
      </div>
      <br/>
      <br/>
      <br/>

      <footer class="my-5 pt-10 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020-2021 LPKN</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
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

  </body>
</html>
