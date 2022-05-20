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

    <script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
  </head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">


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
<!--           <img src="<?=base_url()?>assets/brosur_umb.jpeg" style="width: 100%"><p></p>
          <div class="text-center">
            <a href="<?=base_url()?>pmb/brosur" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download Brosur</a>
          </div> -->
        </div>

        <div class="col-md-8 order-md-1 pb-4">
          <h4 class="mb-3 text-center">PREVIEW TRY OUT SYSTEM</h4>

            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      KEPADA YANG TERHORMAT
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">

                    <div>
                      <!-- <h3>Selamat Datang</h3> -->
                      <h2 class="text-center"><?=$user_regis->nama_lengkap?></h2>
                      <?php if($user_regis->status_pembayaran == 0){ ?>
                          <p class="text-center"><b>Try Out ini adalah simuliasi ujian berbasis komputer PBJP Tingkat Dasar dan tidak ada passing grade untuk mendapatkan keterangan. Link Sertifikat akan muncul ketika Peserta telah mengerjakan Try Out dengan nilai melebihi passing grade, dan peserta dapat mengulang kembali Try Out apabila nilai tidak melebihi passing grade</b></p>
                          <h5 class="text-center">Hasil Try Out</h5>
                          <!-- <h4>dengan  berikut :</h4> --><br/>
                        <table class="table table-bordered" style="width: 100%;">
                          <tr>
                            <td align="center" width="15%"><b>No. Soal</b></td>
                            <td align="center"><b>Bentuk Soal</b></td>
                            <td align="center"><b>Jumlah Soal</b></td>
                            <td align="center"><b>Jumlah Benar</b></td>
                            <td align="center"><b>Bobot Nilai</b></td>
                          </tr>
                          <tr>
                            <td align="center">1 - 25</td>
                            <td>Benar / Salah (B/S)</td>
                            <td align="center">25</td>
                            <td align="center"><?=$nilai_sb?></td>
                            <td align="center"><?=$nilai_sb?> * 2 = <?=$nilai_sb*2?></td>
                          </tr>
                          <tr>
                            <td align="center">26 - 80</td>
                            <td>Pilihan Ganda</td>
                            <td align="center">55</td>
                            <td align="center"><?=$nilai_pg?></td>
                            <td align="center"><?=$nilai_pg?> * 3 = <?=$nilai_pg*3?></td>
                          </tr>
                          <tr>
                            <td align="center">81 - 90</td>
                            <td>Pilihan Ganda (Studi Kasus)</td>
                            <td align="center">10</td>
                            <td align="center"><?=$nilai_pgsk?></td>
                            <td align="center"><?=$nilai_pgsk?> * 4 = <?=$nilai_pgsk*4?></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center"><b>Jumlah</b></td>
                            <td align="center"><b>90</b></td>
                            <td align="center"><b><?=$nilai_sb+$nilai_pg+$nilai_pgsk?></b></td>
                            <td align="center"><b><?=($nilai_sb*2)+($nilai_pg*3)+($nilai_pgsk*4)?></b></td>
                          </tr>
                          <tr>
                            <td colspan="5" align="center"><i>*Passing grade untuk lulus Ujian sesungguhnya 167</i></td>
                          </tr>
                        </table>
                        <!--
                        <div>
                          <ul>
                            <li><i>Waktu yang diberikan untuk menjawab soal ini yaitu 120 menit (2 jam)</i></li>
                            <li><i>Dapat Dilakukan Bersambung (berlanjut selama waktu masih terisisa)</i></li>
                            <li><i>Jawaban soal tersimpan ketika klik "Selanjutnya"</i></li>
                            <li><i>Jika waktu habis, Try Out otomatis berakhir dan jawaban yang masih kosong tidak mendapatkan nilai</i></li>
                            <li><i>Selamat pengerjakan</i></li>
                          </ul>
                        </div>
                        -->
                        <?php
                          $nilai_total = ($nilai_sb*2)+($nilai_pg*3)+($nilai_pgsk*4);
                          if($nilai_total >= 167){
                        ?>
                          <br/>
                          <div class="text-center">
                            <h5>"Tips"</h5>
                            <p><b>Kerjakan dengan menggunakan komputer dan membuka Hardcopy/lembar Perpres No.16 Tahun 2018, simulasi untuk melatih kecepatan dan ketepatan saat mengerjakan ujian berbasis komputer sesungguhnya.</b></p>
                          </div>
                          <br/>
                          <div class="text-center">
                            <a class="btn btn-success btn-lg text-white" onclick="start();" id="pay-button">MULAI TRY OUT</a>
                          </div>
                          
                          <br/>
                        <?php
                          }else{
                        ?>
                          <br/>
                          <div class="text-center">
                            <h5>"Maaf"</h5>
                            <p><b>Anda belum lulus Passing grade</b></p>
                          </div>
                          <br/>

                        <?php
                          }
                        ?>
                      <?php }else{ ?>
                          <h5>Pembayaran Anda telah dikonfirmasi <br/>Silahkan download sertifikasi melalui link dibawah ini</h5>
                          <a href="<?=$kelas->link?>" class="btn btn-primary btn-lg text-white mt-2 mb-3" target="blank_">Link Download Sertifikat</a>
                          <h5>Gunakan email <b><?=$user_regis->email?></b></h5>
                      <?php } ?>
                          <div class="text-center">
                            <h5>--==<<|| TERIMA KASIH ||>>==--</h5>
                          </div>
                          <div class="text-center">
                            <a class="btn btn-secondary text-dark" onclick="logout();" id="pay-button">Keluar</a>
                          </div>

                    </div>

                    
                  </div>
                </div>
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

    <script>
        function logout(){
          $.ajax({
              type: "POST",
              url: "<?=site_url('regis/logout/'.$slug)?>",
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
                   window.setTimeout( function(){
                       window.location = "<?=base_url()?>preview/tryout/<?=$slug?>";
                   }, 2000 );
            }

          })
        }

    </script>

  </body>
</html>
