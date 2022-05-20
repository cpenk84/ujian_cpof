<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LSPPI | Soal Ujian</title>
  <link rel="shortcut icon" href="<?=base_url()?>form_assets/ico/favicon.ico">
  <!-- <link rel="shortcut icon" href="https://lpkn.id/front_assets/logo-utama.png"> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/dist/css/adminlte.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body class="hold-transition layout-top-nav" onload="load_nosoal(<?=$peserta->id?>)">
<div class="wrapper">
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
    finish();
     // alert('GAGAL PENYIMPAN NILAI');
    /*
    $.ajax({
        type: "POST",
        url: "<?=site_url('ujian/finish_ujian')?>",
        dataType: "json",
    })
    .done(function(res) {
      if(res.success) {
        alert('WAKTU HABIS... Terima Kasih');
        window.location = "<?=base_url()?>ujian/";
      }else{
        alert('GAGAL PENYIMPAN NILAI');
      }
    })
    */
  }
}, 100);

  function finish(){
    $.ajax({
        type: "POST",
        url: "<?=site_url('ujian/finish_ujian')?>",
        dataType: "json",
    })
    .done(function(res) {
      if(res.success) {
        alert('=<[{ TERIMA KASIH }]>=');
        window.location = "<?=base_url()?>ujian/";
      }else{
        alert('GAGAL PENYIMPAN NILAI');
      }
    })
  }
</script>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?=base_url()?>ujian_assets/index3.html" class="navbar-brand">
        <img src="<?=base_url()?>form_assets/logo-lsp.jpg" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <!-- <div id="demo">qwer</div> -->
        <span class="brand-text font-weight-light"></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="h4 mt-1">Sisa Waktu : </li>
        <li class="h4 mt-1 ml-2" id="demo"></li>
        <!-- <li><a href="<?=base_url()?>ujian/logout" class="btn btn-sm btn-primary ml-3">Keluar</a></li> -->
        <li><button class="btn btn-sm btn-primary ml-3" onclick="if(confirm('Apakah Anda Yakin ?')) finish();">Selesai</button></li>
        <!-- Messages Dropdown Menu -->
        
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
<script>
  function load_nosoal(idPeserta){
    var url = "<?=site_url('ujian/get_nosoal/"+idPeserta+"')?>";
    $('#no_soal').load(url);
  }
  function load_soal(link){
          var url = "<?=site_url('ujian/get_soal/"+link+"')?>";
          $('#view_soal').load(url);
          // var element = document.getElementById("main_menu");
      }
  function load_esay(link){
          var url = "<?=site_url('ujian/get_esay/"+link+"')?>";
          $('#view_soal').load(url);
          // var element = document.getElementById("main_menu");
      }
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <!-- <h5 class="m-0"> <small>Soal No.</small>30</h5> -->
          </div><!-- /.col -->
          
          
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            
            <div class="card card-primary card-outline" id="view_soal">
              <!-- isi -->
              <div class="text-center">
                <h2 class="mt-3"><?=$peserta->nama_lengkap?></h2>
                <p class="h1">-=<[ Selamat Mengerjakan ]>=-</p>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4" id="no_soal">

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="<?=base_url()?>ujian_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>ujian_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>ujian_assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>ujian_assets/dist/js/demo.js"></script>
</body>
</html>
