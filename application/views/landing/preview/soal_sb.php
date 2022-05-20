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
                <?php $no = 1; foreach ($soal_sb as $row) { 
                  $no_soal = $no++;
                  if($row->jawaban == $row->jawaban_benar){
                    $warna = 'btn-success';
                    $icon = 'fa-check-circle';
                  }elseif($row->jawaban == '0'){
                    $warna = 'btn-secondary';
                    $icon = 'fa-info-circle';
                  }else{
                    $warna = 'btn-danger';
                    $icon = 'fa-times-circle';
                  }
                ?>
                <div class="col-md-2 mb-2">
                  <a href="<?=base_url()?>preview/soal_sb/<?=$slug?>/<?=$row->id?>/<?=$no_soal?>" class="btn btn-sm <?=$warna?> text-white">
                    <h5><?=$no_soal?></h5>
                    <i class="fa <?=$icon?> fa-2x"></i>
                  </a>
                </div>
                <?php } ?>
                <?php $no = 26; foreach ($soal_pg as $row) { 
                  $no_soal = $no++;
                  if($row->jawaban == $row->jawaban_benar){
                    $warna = 'btn-success';
                    $icon = 'fa-check-circle';
                  }elseif($row->jawaban == '0'){
                    $warna = 'btn-secondary';
                    $icon = 'fa-info-circle';
                  }else{
                    $warna = 'btn-danger';
                    $icon = 'fa-times-circle';
                  }
                ?>
                <div class="col-md-2 mb-2">
                  <a href="<?=base_url()?>preview/soal_pg/<?=$slug?>/<?=$row->id?>/<?=$no_soal?>" class="btn btn-sm <?=$warna?> text-white">
                    <h5><?=$no_soal?></h5>
                    <i class="fa <?=$icon?> fa-2x"></i>
                  </a>
                </div>
                <?php } ?>
                <?php $no = 81; foreach ($soal_pgsk as $row) { 
                  $no_soal = $no++;
                  if($row->jawaban == $row->jawaban_benar){
                    $warna = 'btn-success';
                    $icon = 'fa-check-circle';
                  }elseif($row->jawaban == '0'){
                    $warna = 'btn-secondary';
                    $icon = 'fa-info-circle';
                  }else{
                    $warna = 'btn-danger';
                    $icon = 'fa-times-circle';
                  }
                ?>
                <div class="col-md-2 mb-2">
                  <a href="<?=base_url()?>preview/soal_pgsk/<?=$slug?>/<?=$row->id?>/<?=$no_soal?>" class="btn btn-sm <?=$warna?> text-white">
                    <h5><?=$no_soal?></h5>
                    <i class="fa <?=$icon?> fa-2x"></i>
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
          <div class="row">
            <div class="col-md-6 text-left">
              <h4 class="mb-3">PREVIEW TRY OUT SYSTEM</h4>
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url()?>preview/tryout/<?=$slug?>" class="btn btn-primary">Rincian Nilai</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card h-100 h5">
                <div class="card-header">Soal</div>
                <div class="card-body">
                  <ol start="<?=$start_no?>">
                    <li class="text-justify"><?=$detail_soal_sb->soal_ujian?></li>
                  </ol>
                  <div class="col-md-12 pl-5">
                    <div class="row">
                      <div class="icheck-success d-inline col-md-6">
                        <input type="radio" <?=($jawaban['jawaban'] == 'b') ? 'checked' : ''?> id="<?=$detail_soal_sb->id?>_sb_b" name="soal_sb_<?=$detail_soal_sb->id?>" value="b" disabled>
                        <label style="font-weight: 500;" for="<?=$detail_soal_sb->id?>_sb_b">Benar</label>
                      </div>
                      <div class="icheck-success d-inline col-md-6">
                        <input type="radio" <?=($jawaban['jawaban'] == 's') ? 'checked' : ''?> id="<?=$detail_soal_sb->id?>_sb_s" name="soal_sb_<?=$detail_soal_sb->id?>" value="s" disabled>
                        <label style="font-weight: 500;" for="<?=$detail_soal_sb->id?>_sb_s">Salah</label>
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
