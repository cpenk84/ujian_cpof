<!doctype html>
      <script>
        $(document).ready(function() {
            $('form.jsform').on('submit', function(form){
                form.preventDefault();
                $.post('<?php echo $action;?>', $('form.jsform').serialize(), function(data){
                    $('main.main').html(data);
                });
            });
        });
      </script>
            <!-- <main class="main"> -->
                <!-- Breadcrumb-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">SISTEM INFORMASI USER & MENU</li>
                </ol>
                <div class="container-fluid">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="margin-top:0px">Regis Sertif <?php echo $button ?></h4><br>
                                        <form action="<?php echo $action; ?>" method="post" class="jsform">
                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
	                                    <div class="form-group">
                                            <label for="int">Id Kelas Sertif <?php echo form_error('id_kelas_sertif') ?></label>
                                            <input type="text" class="form-control" name="id_kelas_sertif" id="id_kelas_sertif" placeholder="Id Kelas Sertif" value="<?php echo $id_kelas_sertif; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">No Hp <?php echo form_error('no_hp') ?></label>
                                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Email <?php echo form_error('email') ?></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Instansi <?php echo form_error('instansi') ?></label>
                                            <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Instansi" value="<?php echo $instansi; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="tinyint">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
                                            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="datetime">Create Date <?php echo form_error('create_date') ?></label>
                                            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="datetime">Update Date <?php echo form_error('update_date') ?></label>
                                            <input type="text" class="form-control" name="update_date" id="update_date" placeholder="Update Date" value="<?php echo $update_date; ?>" />
                                        </div>
	                                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                                    <button type="button" class="btn btn-default" onclick="load_controler('regis_sertif');">Cancel</button>
	                                </form>
                                    </div>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->
                    </div>

                </div>
            <!-- </main> -->
        <script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>