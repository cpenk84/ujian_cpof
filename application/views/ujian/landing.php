<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LPKN | Tata Tertib</title>
  <link rel="shortcut icon" href="https://lpkn.id/front_assets/logo-utama.png">
  <script language="JavaScript">
    window.moveTo(0, 0);
    window.resizeTo(screen.width, screen.height)
  </script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0"> <small>Ujian CPOF</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item active">Tanggal : <?=date_indo(date('Y-m-d'))?></li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content mt-5">
      <div class="container">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-7 mx-auto">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <h3>TATA TERTIB UJIAN SERTIFIKASI KOMPETENSI PELAKSANAAN DASAR  PENGADAAN BARANG/JASA (CPOF)</h3>
                </div>
                <div>
                  <ol class="h5 text-justify">
                    <li>eserta harus datang ketempat ujian tepat waktu</li>
                    <li>Bagi Peserta yang membawa Handphone, Selama ujian berlangsung Handphone harus dimatikan/dalam mode silent.</li>
                    <li>Peserta ujian dilarang bekerjasama/bertanya dalam mengerjakan soal ujian dengan peserta lain.</li>
                    <li>Peserta Ujian yang sudah melakukan login ke halaman soal kemudian keluar ruangan dan tidak kembali sampai dengan waktu ujian berakhir, dianggap telah mengikuti ujian dan tidak mengulang kembali.</li>
                    <li>Peserta yang sudah selesai mengerjakan soal ujian sebelum waktu ujian habis, dapat meninggalkan ruangan ujian dengan tertib.</li>
                  </ol>
                </div>
                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                <div class="text-center mt-4">
                  <a href="<?=base_url()?>ujian/login" class="btn btn-primary">Ya, Saya Setuju</a>
                </div>
              </div>
            </div>

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

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

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
