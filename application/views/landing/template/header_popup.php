<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sertifikasi Online | LSP</title>

  <link rel="stylesheet" href="<?=base_url()?>form_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>form_assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?=base_url()?>form_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>form_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>form_assets/plugins/toastr/toastr.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="<?=base_url()?>form_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>form_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>form_assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>form_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?=base_url()?>form_assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

</head>
      <script>
              function load_perpage(ser_id, mod_id){
                      var url = "<?=base_url('sertifikasi/build_page/"+ser_id+"/"+mod_id+"')?>";
                      $('div.main').load(url);
                  }
              function load_kompetensi(ser_id, mod_id, code){
                      var url = "<?=base_url('ujian/ujian_page/"+ser_id+"/"+mod_id+"/"+code+"')?>";
                      $('div.main').load(url);
                  }
              function load_review(ser_id, user_id, mod_id){
                      var url = "<?=base_url('ujian/ujian_review/"+ser_id+"/"+user_id+"/"+mod_id+"')?>";
                      $('div.main').load(url);
                  }
              function load_delete_sb(id_soal, id_kelas){
                      var url = "<?=base_url('kelas_sertif/build_delete_soal_sb/"+id_soal+"/"+id_kelas+"')?>";
                      $('div.main').load(url);
                  }
              function load_delete(id_soal, id_kelas){
                      var url = "<?=base_url('kelas_sertif/build_delete_soal/"+id_soal+"/"+id_kelas+"')?>";
                      $('div.main').load(url);
                  }
              function load_delete_pgsk(id_soal, id_kelas){
                      var url = "<?=base_url('kelas_sertif/build_delete_soal_pgsk/"+id_soal+"/"+id_kelas+"')?>";
                      $('div.main').load(url);
                  }
      </script>
      <script>
          window.onunload = refreshParent;
          function refreshParent(id_bag2) {
            $.get("<?=base_url()?>ujian/selesai/"+id_bag2, function(data){
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
          }
      </script>

<body class="hold-transition layout-top-nav">

<div class="wrapper">


<div class="main">

  <!-- Navbar -->
  
  <!-- /.navbar -->
