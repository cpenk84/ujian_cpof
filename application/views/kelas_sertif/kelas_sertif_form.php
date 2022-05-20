<!doctype html>
<link href="<?php echo base_url();?>assets/vendors/select2/css/select2.min.css" rel="stylesheet" />
<!-- Plugins and scripts required by this view-->
<script src="<?php echo base_url();?>assets/vendors/jquery.maskedinput/js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url();?>assets/vendors/select2/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/advanced-forms.js"></script>
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
                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="margin-top:0px">Kelas Sertif <?php echo $button ?></h4><br>
                                        <form action="<?php echo $action; ?>" method="post" class="jsform">
                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
	                                    <div class="form-group">
                                            <label for="char">Judul <?php echo form_error('judul') ?></label>
                                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="int">Id Kelas Sertif <?php echo form_error('id_kelas_sertif') ?></label>
                                            <!-- <input type="text" class="form-control" name="id_kelas_sertif" id="id_kelas_sertif" placeholder="Id Kelas Sertif" value="<?php echo $id_kelas_sertif; ?>" /> -->
                                            <select name="id_kelas_sertif" class="form-control select2-single" id="select2-1">
                                              <option value>Pilih Event</option>
                                              <?php foreach ($getkelas as $list) {
                                                echo '<option value="'.$list->id.'" '.(($id_kelas_sertif==$list->id)?'selected="selected"':"").'>'.$list->judul.'</option>';
                                              } ?>
                                            </select>
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Slug <?php echo form_error('slug') ?></label>
                                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="<?php echo $slug; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Brosur <?php echo form_error('brosur') ?></label>
                                            <input type="text" class="form-control" name="brosur" id="brosur" placeholder="Brosur" value="<?php echo $brosur; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Link <?php echo form_error('link') ?></label>
                                            <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="tinyint">Status <?php echo form_error('status') ?></label>
                                            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
                                        </div>
	                                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                                    <button type="button" class="btn btn-default" onclick="load_controler('kelas_sertif');">Cancel</button>
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