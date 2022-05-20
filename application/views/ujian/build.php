<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br/>
    <!-- /.content-header -->


    <!-- Main content -->
    <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">File Materi</a></li> -->
                  <li class="nav-item"><a class="nav-link <?=($tab == 1) ? 'active' : ''?>" href="#sb" data-toggle="tab">BENAR / SALAH</a></li>
                  <li class="nav-item"><a class="nav-link <?=($tab == 2) ? 'active' : ''?>" href="#pg" data-toggle="tab">PILIHAN GANDA</a></li>
                  <li class="nav-item"><a class="nav-link <?=($tab == 3) ? 'active' : ''?>" href="#pgsk" data-toggle="tab">PILIHAN GANDA STUDI KASUS</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">



                  <div class="<?=($tab == 1) ? 'active' : ''?> tab-pane" id="sb">
                    <!-- <div class="timeline timeline-inverse" style="margin-bottom: 15px"> -->
                      <!-- timeline time label -->
                    <!-- </div> -->
                    <!-- Post -->
                    <?php 
                    $no = 1;
                    foreach($soal_sb as $soal){ ?>
                    <div class="post pl-5">
                      <!-- /.user-block -->
                      <div class="float-right">
                        <a href="javascript:void(0)" onclick="editSB(<?=$soal->id?>);" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> </a>
                        <a href="javascript:void(0)" onclick="if(confirm('Are you sure?'))load_delete_sb(<?=$soal->id?>, <?=$id?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> </div>
                      <div class="row ">
                        <div><?=$no++?>. </div>
                        <div class="col-11">
                          <?=$soal->soal_ujian?>  
                        </div>
                      </div>
                      <div class="col-md-12 pl-4">
                        <div class="row">
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'b') ? 'checked' : ''?> id="<?=$soal->id?>_sb_b" name="soal_sb_<?=$soal->id?>" value="b" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_sb_b">Benar</label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 's') ? 'checked' : ''?> id="<?=$soal->id?>_sb_s" name="soal_sb_<?=$soal->id?>" value="s" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_sb_s">Salah</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }?>
                      <div>
                        <div class="row">
                          <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary" onclick="clearFormSB()" data-toggle="modal" data-target="#Modal_Soal_Sb">
                              Tambah Soal
                            </button>
                          </div>
                        </div>
                      </div>
                    <!-- /.post -->
                    <!-- Post -->
                    <div class="post text-right">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="<?=($tab == 2) ? 'active' : ''?> tab-pane" id="pg">
                    <!-- <div class="timeline timeline-inverse" style="margin-bottom: 15px"> -->
                      <!-- timeline time label -->
                    <!-- </div> -->
                    <!-- Post -->
                    <?php 
                    $no = 1;
                    foreach($soal_pg as $soal){ ?>
                    <div class="post pl-5">
                      <!-- /.user-block -->
                      <div class="float-right">
                        <a href="javascript:void(0)" onclick="editPG(<?=$soal->id?>);" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> </a>
                        <a href="javascript:void(0)" onclick="if(confirm('Are you sure?'))load_delete(<?=$soal->id?>, <?=$id?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> </div>
                      <div class="row ">
                        <div><?=$no++?>. </div>
                        <div class="col-11">
                          <?=$soal->soal_ujian?>  
                        </div>
                      </div>
                      <div class="col-md-12 pl-4">
                        <div class="row">
                        <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'a') ? 'checked' : ''?> id="<?=$soal->id?>_a" name="soal_pg_<?=$soal->id?>" value="a" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_a">a. <?=$soal->jawaban_a?></label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'b') ? 'checked' : ''?> id="<?=$soal->id?>_b" name="soal_pg_<?=$soal->id?>" value="b" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_b">b. <?=$soal->jawaban_b?></label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'c') ? 'checked' : ''?> id="<?=$soal->id?>_c" name="soal_pg_<?=$soal->id?>" value="c" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_c">c. <?=$soal->jawaban_c?></label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'd') ? 'checked' : ''?> id="<?=$soal->id?>_d" name="soal_pg_<?=$soal->id?>" value="d" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_d">d. <?=$soal->jawaban_d?></label>
                          </div>
                          <!-- <div><?=$soal->jawaban_benar?></div> -->
                        </div>
                      </div>
                    </div>
                    <?php }?>
                      <div>
                        <div class="row">
                          <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary" onclick="clearFormPG()" data-toggle="modal" data-target="#Modal_Soal">
                              Tambah Soal
                            </button>
                          </div>
                        </div>
                      </div>
                    <!-- /.post -->
                    <!-- Post -->
                    <div class="post text-right">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->    

                  <div class="<?=($tab == 3) ? 'active' : ''?> tab-pane" id="pgsk">
                    <!-- <div class="timeline timeline-inverse" style="margin-bottom: 15px"> -->
                      <!-- timeline time label -->
                    <!-- </div> -->
                    <!-- Post -->
                    <?php 
                    $no = 1;
                    foreach($soal_pgsk as $soal){ ?>
                    <div class="post pl-5">
                      <!-- /.user-block -->
                      <div class="float-right">
                        <a href="javascript:void(0)" onclick="editPGSK(<?=$soal->id?>);" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> </a>
                        <a href="javascript:void(0)" onclick="if(confirm('Are you sure?'))load_delete_pgsk(<?=$soal->id?>, <?=$id?>);" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> </div>
                      <div class="row ">
                        <div><?=$no++?>. </div>
                        <div class="col-11">
                          <?=$soal->soal_ujian?>  
                        </div>
                      </div>
                      <div class="col-md-12 pl-4">
                        <div class="row">
                        <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'a') ? 'checked' : ''?> id="<?=$soal->id?>_a" name="soal_pgsk_<?=$soal->id?>" value="a" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_a">a. <?=$soal->jawaban_a?></label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'b') ? 'checked' : ''?> id="<?=$soal->id?>_b" name="soal_pgsk_<?=$soal->id?>" value="b" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_b">b. <?=$soal->jawaban_b?></label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'c') ? 'checked' : ''?> id="<?=$soal->id?>_c" name="soal_pgsk_<?=$soal->id?>" value="c" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_c">c. <?=$soal->jawaban_c?></label>
                          </div>
                          <div class="icheck-success d-inline col-md-6">
                            <input type="radio" <?=($soal->jawaban_benar == 'd') ? 'checked' : ''?> id="<?=$soal->id?>_d" name="soal_pgsk_<?=$soal->id?>" value="d" required>
                            <label style="font-weight: 500;" for="<?=$soal->id?>_d">d. <?=$soal->jawaban_d?></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }?>
                      <div>
                        <div class="row">
                          <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary" onclick="clearFormPGSK()" data-toggle="modal" data-target="#Modal_Soal_pgsk">
                              Tambah Soal
                            </button>
                          </div>
                        </div>
                      </div>
                    <!-- /.post -->
                    <!-- Post -->
                    <div class="post text-right">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

      <script>
        function clearFormSB()
        {
          $("#soal_sb").val("");
          document.getElementById("jawaban_benar_sb_b").checked = false;
          document.getElementById("jawaban_benar_sb_s").checked = false;
        }
        function clearFormPG()
        {
          $("#soal_pg").val("");
          $("textarea.jawaban_pg").val("");
          document.getElementById("jawaban_benar_a").checked = false;
          document.getElementById("jawaban_benar_b").checked = false;
          document.getElementById("jawaban_benar_c").checked = false;
          document.getElementById("jawaban_benar_d").checked = false;
        }
        function clearFormPGSK()
        {
          $("#metode").val("add");
          $("#soal_pgsk").val("");
          $("textarea.jawaban_pgsk").val("");
          document.getElementById("jawaban_benar_pgsk_a").checked = false;
          document.getElementById("jawaban_benar_pgsk_b").checked = false;
          document.getElementById("jawaban_benar_pgsk_c").checked = false;
          document.getElementById("jawaban_benar_pgsk_d").checked = false;
        }

        function editSB(id){
          clearFormSB();
          $.ajax({
              type: "POST",
              url: "<?=site_url('kelas_sertif/get_soal_sb/')?>"+id,
              dataType: "json",
          })
          .done(function(res) {
            if(res.success) {
              $('#Modal_Soal_Sb').modal('show');
              $("#metode_sb").val("edit");
              $("#id_soal").val(res.soal['id']);
              $("#soal_sb").val(res.soal['soal']);
              if(res.soal['jawaban_benar'] == 'b'){
                document.getElementById("jawaban_benar_sb_b").checked = true;
              }else{
                document.getElementById("jawaban_benar_sb_s").checked = true;
              }
            }else{
              alert('Data Tidak Ditemukan');
            }
          })
        }
        function editPG(id){
          clearFormPG();
          $.ajax({
              type: "POST",
              url: "<?=site_url('kelas_sertif/get_soal_pg/')?>"+id,
              dataType: "json",
          })
          .done(function(res) {
            if(res.success) {
              $('#Modal_Soal').modal('show');
              $("#metode_pg").val("edit");
              $("#id_soal_pg").val(res.soal['id']);
              $("#soal_pg").val(res.soal['soal']);
              $("#jawaban_a").val(res.soal['jawaban_a']);
              $("#jawaban_b").val(res.soal['jawaban_b']);
              $("#jawaban_c").val(res.soal['jawaban_c']);
              $("#jawaban_d").val(res.soal['jawaban_d']);
              if(res.soal['jawaban_benar'] == 'a'){
                document.getElementById("jawaban_benar_a").checked = true;
              }else if(res.soal['jawaban_benar'] == 'b'){
                document.getElementById("jawaban_benar_b").checked = true;
              }else if(res.soal['jawaban_benar'] == 'c'){
                document.getElementById("jawaban_benar_c").checked = true;
              }else if(res.soal['jawaban_benar'] == 'd'){
                document.getElementById("jawaban_benar_d").checked = true;
              }else{
                document.getElementById("jawaban_benar_a").checked = false;
                document.getElementById("jawaban_benar_b").checked = false;
                document.getElementById("jawaban_benar_c").checked = false;
                document.getElementById("jawaban_benar_d").checked = false;
              }
            }else{
              alert('Data Tidak Ditemukan');
            }
          })
        }
        function editPGSK(id){
          clearFormPGSK();
          $.ajax({
              type: "POST",
              url: "<?=site_url('kelas_sertif/get_soal_pgsk/')?>"+id,
              dataType: "json",
          })
          .done(function(res) {
            if(res.success) {
              $('#Modal_Soal_pgsk').modal('show');
              $("#metode_pgsk").val("edit");
              $("#id_soal_pgsk").val(res.soal['id']);
              $("#soal_pgsk").val(res.soal['soal']);
              $("#jawaban_pgsk_a").val(res.soal['jawaban_a']);
              $("#jawaban_pgsk_b").val(res.soal['jawaban_b']);
              $("#jawaban_pgsk_c").val(res.soal['jawaban_c']);
              $("#jawaban_pgsk_d").val(res.soal['jawaban_d']);
              if(res.soal['jawaban_benar'] == 'a'){
                document.getElementById("jawaban_benar_pgsk_a").checked = true;
              }else if(res.soal['jawaban_benar'] == 'b'){
                document.getElementById("jawaban_benar_pgsk_b").checked = true;
              }else if(res.soal['jawaban_benar'] == 'c'){
                document.getElementById("jawaban_benar_pgsk_c").checked = true;
              }else if(res.soal['jawaban_benar'] == 'd'){
                document.getElementById("jawaban_benar_pgsk_d").checked = true;
              }else{
                document.getElementById("jawaban_benar_pgsk_a").checked = false;
                document.getElementById("jawaban_benar_pgsk_b").checked = false;
                document.getElementById("jawaban_benar_pgsk_c").checked = false;
                document.getElementById("jawaban_benar_pgsk_d").checked = false;
              }
            }else{
              alert('Data Tidak Ditemukan');
            }
          })
        }

        $(document).ready(function() {
            $('form.jsform').on('submit', function(form){
                form.preventDefault();
                $.post('<?php echo base_url() ?>kelas_sertif/create_soal/', $('form.jsform').serialize(), function(data){
                  var response = jQuery.parseJSON(data);
                  if(response.status == 'error'){
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: 'Email Anda Telah Terdaftar',
                    })
                  }else{
                    Swal.fire({
                      icon: response.status,
                      title: 'Sukses',
                      text: 'Berhasil Menyimpan Soal',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function() {
                        var url = "<?=base_url()?>kelas_sertif/build_page/<?=$id?>/2";
                        $('#Modal_Soal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('div.main').load(url);
                        $('body.layout-top-nav').removeAttribute("style");
                    })
                  }
                });
            });
            $('form.jsformsb').on('submit', function(form){
                form.preventDefault();
                $.post('<?php echo base_url() ?>kelas_sertif/create_soal_sb/', $('form.jsformsb').serialize(), function(data){
                  var response = jQuery.parseJSON(data);
                  if(response.status == 'error'){
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: 'Email Anda Telah Terdaftar',
                    })
                  }else{
                    Swal.fire({
                      icon: response.status,
                      title: 'Sukses',
                      text: 'Berhasil Menyimpan Soal',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function() {
                        var url = "<?=base_url()?>kelas_sertif/build_page/<?=$id?>/1";
                        $('#Modal_Soal_Sb').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('div.main').load(url);
                    })
                  }
                });
            });
            $('form.jsformpgsk').on('submit', function(form){
                form.preventDefault();
                $.post('<?php echo base_url() ?>kelas_sertif/create_soal_pgsk/', $('form.jsformpgsk').serialize(), function(data){
                  var response = jQuery.parseJSON(data);
                  if(response.status == 'error'){
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: 'Email Anda Telah Terdaftar',
                    })
                  }else{
                    Swal.fire({
                      icon: response.status,
                      title: 'Sukses',
                      text: 'Berhasil Menyimpan Soal',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function() {
                        var url = "<?=base_url()?>kelas_sertif/build_page/<?=$id?>/3";
                        $('#Modal_Soal_pgsk').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('div.main').load(url);
                    })
                  }
                });
            });
        });
      </script>

<div class="modal fade" id="Modal_Soal_Sb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Soal Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="jsformsb">
        <!-- load_perpage(<?=$sertifikasi->id?>, <?=$unit_list->id?>) -->
      <input type="hidden" name="id_kelas" value="<?=$id?>">
      <input type="hidden" name="metode" id="metode_sb" value="add">
      <input type="hidden" name="id_soal" id="id_soal" value>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Soal</label>
            <textarea  class="form-control soal" id="soal_sb" rows="5" name="soal_ujian"></textarea>
            <!-- <input type="text" name="sial_ujian" class="form-control" id="recipient-name" required> -->
          </div>
          <div class="form-group">
            <label>Jawaban : </label><br/>
            <div class="icheck-success d-inline col-md-6">
              <input class="form-control" type="radio" id="jawaban_benar_sb_b" name="jawaban_benar" value="b" required>
              <label style="font-weight: 500;" for="jawaban_benar_sb_b">BENAR</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input class="form-control" type="radio" id="jawaban_benar_sb_s" name="jawaban_benar" value="s" required>
              <label style="font-weight: 500;" for="jawaban_benar_sb_s">SALAH</label>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="Modal_Soal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="jsform">
        <!-- load_perpage(<?=$sertifikasi->id?>, <?=$unit_list->id?>) -->
      <input type="hidden" name="id_kelas" value="<?=$id?>">
      <input type="hidden" name="metode" id="metode_pg" value="add">
      <input type="hidden" name="id_soal" id="id_soal_pg" value>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Soal</label>
            <textarea  class="form-control soal" id="soal_pg" name="soal_ujian"></textarea>
            <!-- <input type="text" name="sial_ujian" class="form-control" id="recipient-name" required> -->
          </div>
          <div class="row"> 
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban a</label>
                  <textarea  class="form-control jawaban_pg" id="jawaban_a" name="jawaban_a"></textarea>
                </div>
              </div>
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban b</label>
                  <textarea  class="form-control jawaban_pg" id="jawaban_b" name="jawaban_b"></textarea>
                </div>
              </div>
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban c</label>
                  <textarea  class="form-control jawaban_pg" id="jawaban_c" name="jawaban_c"></textarea>
                </div>
              </div>
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban d</label>
                  <textarea  class="form-control jawaban_pg" id="jawaban_d" name="jawaban_d"></textarea>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label>Jawaban Benar : </label><br/>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_a" name="jawaban_benar" value="a" required>
              <label style="font-weight: 500;" for="jawaban_benar_a">a</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_b" name="jawaban_benar" value="b" required>
              <label style="font-weight: 500;" for="jawaban_benar_b">b</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_c" name="jawaban_benar" value="c" required>
              <label style="font-weight: 500;" for="jawaban_benar_c">c</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_d" name="jawaban_benar" value="d" required>
              <label style="font-weight: 500;" for="jawaban_benar_d">d</label>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="Modal_Soal_pgsk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="jsformpgsk">
        <!-- load_perpage(<?=$sertifikasi->id?>, <?=$unit_list->id?>) -->
      <input type="hidden" name="id_kelas" value="<?=$id?>">
      <input type="hidden" name="metode" id="metode_pgsk" value="add">
      <input type="hidden" name="id_soal" id="id_soal_pgsk" value>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Soal</label>
            <textarea  class="form-control soal" id="soal_pgsk" name="soal_ujian"></textarea>
            <!-- <input type="text" name="sial_ujian" class="form-control" id="recipient-name" required> -->
          </div>
          <div class="row"> 
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban a</label>
                  <textarea  class="form-control jawaban_pgsk" id="jawaban_pgsk_a" name="jawaban_a"></textarea>
                </div>
              </div>
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban b</label>
                  <textarea  class="form-control jawaban_pgsk" id="jawaban_pgsk_b" name="jawaban_b"></textarea>
                </div>
              </div>
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban c</label>
                  <textarea  class="form-control jawaban_pgsk" id="jawaban_pgsk_c" name="jawaban_c"></textarea>
                </div>
              </div>
              <div class="col-6">       
                <div class="form-group">
                  <label>Jawaban d</label>
                  <textarea  class="form-control jawaban_pgsk" id="jawaban_pgsk_d" name="jawaban_d"></textarea>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label>Jawaban Benar : </label><br/>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_pgsk_a" name="jawaban_benar" value="a" required>
              <label style="font-weight: 500;" for="jawaban_benar_pgsk_a">a</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_pgsk_b" name="jawaban_benar" value="b" required>
              <label style="font-weight: 500;" for="jawaban_benar_pgsk_b">b</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_pgsk_c" name="jawaban_benar" value="c" required>
              <label style="font-weight: 500;" for="jawaban_benar_pgsk_c">c</label>
            </div>
            <div class="icheck-success d-inline col-md-6">
              <input type="radio" id="jawaban_benar_pgsk_d" name="jawaban_benar" value="d" required>
              <label style="font-weight: 500;" for="jawaban_benar_pgsk_d">d</label>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
      
    </div>
  </div>
</div>


  </div>
