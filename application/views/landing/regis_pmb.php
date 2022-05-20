<!doctype html>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <!-- <meta name="author" content="Łukasz Holeczek"> -->
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>PMB | UMBanten</title>
  <!-- Icons-->
  <link href="<?php echo base_url();?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">

  </head>

  <body class="bg-light">
    <div class="container">
      
      <div class="py-2 text-center">
        <h2>Welcome To</h2>
        <h1>UNIVERSITAS MUHAMMADIYAH BANTEN</h1>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
      
      <!-- <p></p> -->
      <hr class="mt-0">
      <div class="row">
        <?php if($user_regis->affiliasi == 1){ ?>
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Bonus Kamu</span>
            <span class="badge badge-secondary badge-pill">4</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Total Pendaftar</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted"><?=$register?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Belum Membayar</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted"><?=$register-$bayar?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Total Membayar</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success"><?=$bayar?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Rp.)</span>
              <strong><?=number_format(($bayar*150000))?></strong>
            </li>
          </ul>
          <div class="card">
            <div class="card-header">Bahan Promosi</div>
            <div class="card-body">
              <textarea class="form-control" rows="10" id="text_promo">
Regestrasi PMB 
*UNIVERSITAS MUHAMMADIYAH BANTEN* 
Telah dibuka

*PROGRAM STUDI :*
*FAKULTAS TEKNIK*
- S-1 Sistem Informasi
- S-1 Informatika
- S-1 Teknik Industri
- D-3 Manajemen Informatika
*FAKULTAS BAHASA*
- S-1 Bahasa Inggris
- S-1 Bahasa Arab
- S-1 Bahasa Indonesia

*Link Registrasi* 
<?=base_url()?>?ref=<?=$user_regis->ref?> 

*Info :*
WhatsApp Panitia
https://wa.me/6285946237704
Kontak Panitia
0859-4623-7704
</textarea>
            </div>
            <div class="card-footer text-right">
              <a href="<?=base_url()?>pmb/brosur" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download Brosur</a>
              <button class="btn btn-success btn-sm" onClick="copy_text_promo()"><i class="fa fa-copy"></i> Copy Text</button>
            </div>
          </div>
          <script>
            function copy_text_promo() {
              var copyText = document.getElementById("text_promo");
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand("copy");
              alert("Berhasil Menyalin Text");
            }
          </script>

        </div>
        <?php }else{ ?>
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
        <?php } ?>

        <div class="col-md-8 order-md-1 pb-4">
          <h4 class="mb-3 text-center">FORM ADMINISTRASI PMB</h4>

            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      PEMBAYARAN PMB
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">

                    <div class="text-center">
                      <!-- <h3>Selamat Datang</h3> -->
                      <h2><?=$user_regis->nama_lengkap?></h2>
                      <h5>Untuk melakukan pembayaran PMB Silahkan transfer sejumlah Rp. 150.000,- </h5>
                      <h4>ke rekening berikut :</h4>
                    </div>
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <img src="<?=base_url()?>assets/img/logo-bri.png">
                      </div>
                      <div class="col-md-8">
                        <table class="table table-bordered">
                          <tr>
                            <td width="30%">No.Rek</td>
                            <td>12948798719487</td>
                          </tr>
                          <tr>
                            <td>Nama Pemilik</td>
                            <td>UNIVERSITAS MUHAMMADIYAH BANTEN</td>
                          </tr>
                          <tr>
                            <td>Upload Bukti</td>
                            <td>
                              <input type="file" class="form-control mb-1" name="bukti">
                              <p class="text-center"><button class="btn btn-primary">Upload Bukti</button></p>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12 text-center">
                        <p class="h4">Atau melalui pembayaran Online</p>

                    <!-- <body> -->
                      <script type="text/javascript"
                        src="https://app.sandbox.midtrans.com/snap/snap.js"
                        data-client-key="Mid-server-q0vUyzedOC8ua6NtWhi_sOaU"></script>

                      <button class="btn btn-success" id="pay-button">Pembayaran Online</button>
                      <script type="text/javascript">
                        var payButton = document.getElementById('pay-button');
                        // For example trigger on button clicked, or any time you need
                        payButton.addEventListener('click', function () {
                          window.snap.pay('<?=$snapToken?>'); // Replace it with your transaction token
                        });
                      </script>
                    <!-- </body> -->
                        <!-- <button class="btn btn-success">Pembayaran Online</button> -->
                        <!-- <img src="<?=base_url()?>assets/img/logo-bri.png"> -->
                      </div>

                    </div>
                    
                    
                  </div>
                </div>
              </div>
              <?php if($user_regis->affiliasi == 1){ ?>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      AFFILIASI MARKETING
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="text-center">
                      <h5>Ingin Mendapatkan Penghasilan tambahan ?<br/>Hanya dengan Share Informasi ini ke Rekan rekan Anda..</h5>
                    </div>
                    <div>
                      <p>Affiliate adalah sebuah strategi marketing yang memungkinkan kita mendapatkan komisi atas kegiatan pemasaran yang kita lakukan. Kemudahan yang ditawarkan melalui Program Affiliate Marketing ini adalah kamu sebagai affiliate partner tidak memerlukan modal apa pun untuk menjalankan bisnis internet ini.</p>

                      <p>Bisnis ini juga bisa dilakukan pada waktu senggang di sela-sela kesibukan kamu. Mendapatkan penghasilan yang mudah saat ini adalah dengan bergabung di Affiliate Program, dan lakukan bisnis tanpa modal dengan komisi yang besar</p>
                    </div>
                    <div>
                      <h5>Cara Kerja Affiliate :</h5>
                      <ul>
                        <li>Mendaftar sebagai Affiliate Kegiatan</li>
                        <li>Mendapatkan Bahan Promosi</li>
                        <li>Share bahan Promosi</li>
                        <li>Setiap orang yang mendaftarkan diri melalui Link Promosi Anda, akan otomatis tercatat dan anda dapat pantau</li>
                        <li>Penghitungan Bonus : Peserta Anda yang telah melakukan Pembayaran x Bonus</li>
                        <li>Ilustrasi : Peserta yang mendaftar melalui Link Affilitae anda sebanyak 250 orang, dan 200 orang telah menyelesaikan Pembayaran, maka Bonus Anda adalah 200 x Rp. 150.000 = Rp. 30.000.000,-</li>
                      </ul>
                    </div>
                    


                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      DATA PEROLEHAN AFFILIASI
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    <link href="<?=base_url()?>assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />

                    <div class="table-responsive">
                      <table class="table table-striped datatable">
                        <thead>
                          <tr>
                            <th width="5px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>HP</th>
                            <th>Status Pembayaran</th>
                            <!-- <th width="90px">Action</th> -->
                          </tr>
                        </thead>
                        <?php $no = 1; foreach ($user_affiliasi as $row) { ?>
                          <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$row->nama_lengkap?></td>
                            <td><?=$row->email?></td>
                            <td><?=$row->no_hp?></td>
                            <td><?=$row->status_pembayaran==0 ? "Belum" : "Lunas" ?></td>
                            <!-- <td>test</td> -->
                          </tr>
                        <?php } ?>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>

        </div>
      </div>
      <br/>
      <br/>
      <br/>

      <footer class="my-5 pt-10 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
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
<script src="<?php echo base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<link href="<?php echo base_url();?>assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
<!-- Plugins and scripts required by this view-->
<script src="<?php echo base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables.js"></script>

  </body>
</html>
