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
                                        <h4 style="margin-top:0px">Register Pmb <?php echo $button ?></h4><br>
                                        <form action="<?php echo $action; ?>" method="post" class="jsform">
                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>">
	                                    <div class="form-group">
                                            <label for="char">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Email <?php echo form_error('email') ?></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">No Hp <?php echo form_error('no_hp') ?></label>
                                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="int">Lokasi <?php echo form_error('lokasi') ?></label>
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="int">Affiliasi <?php echo form_error('affiliasi') ?></label>
                                            <input type="text" class="form-control" name="affiliasi" id="affiliasi" placeholder="Affiliasi" value="<?php echo $affiliasi; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Nama Bank <?php echo form_error('nama_bank') ?></label>
                                            <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="<?php echo $nama_bank; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="int">No Rek <?php echo form_error('no_rek') ?></label>
                                            <input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="No Rek" value="<?php echo $no_rek; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Ref <?php echo form_error('ref') ?></label>
                                            <input type="text" class="form-control" name="ref" id="ref" placeholder="Ref" value="<?php echo $ref; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="char">Ref By <?php echo form_error('ref_by') ?></label>
                                            <input type="text" class="form-control" name="ref_by" id="ref_by" placeholder="Ref By" value="<?php echo $ref_by; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="int">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
                                            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
                                            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
                                        </div>
	                                    <div class="form-group">
                                            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
                                            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
                                        </div>
	                                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	                                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                                    <button type="button" class="btn btn-default" onclick="load_controler('register_pmb');">Cancel</button>
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