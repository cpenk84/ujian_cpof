<!doctype html>

            <!-- <main class="main"> -->
                <!-- Breadcrumb-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">SISTEM INFORMASI USER & MENU</li>
                    <!-- Breadcrumb Menu-->
                    <li class="breadcrumb-menu d-md-down-none">
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn" href="#">
                                <i class="icon-speech"></i>
                            </a>
                            <a class="btn" href="./">
                                <i class="icon-graph"></i>  Dashboard</a>
                            <a class="btn" href="#">
                                <i class="icon-settings"></i>  Settings</a>
                        </div>
                    </li>
                </ol>
                <div class="container-fluid">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="margin-top:0px">Register Pmb Detail</h4><br>
                                        <table class="table">
	                                        <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	                                        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	                                        <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	                                        <tr><td>Lokasi</td><td><?php echo $lokasi; ?></td></tr>
	                                        <tr><td>Affiliasi</td><td><?php echo $affiliasi; ?></td></tr>
	                                        <tr><td>Nama Bank</td><td><?php echo $nama_bank; ?></td></tr>
	                                        <tr><td>No Rek</td><td><?php echo $no_rek; ?></td></tr>
	                                        <tr><td>Ref</td><td><?php echo $ref; ?></td></tr>
	                                        <tr><td>Ref By</td><td><?php echo $ref_by; ?></td></tr>
	                                        <tr><td>Status Pembayaran</td><td><?php echo $status_pembayaran; ?></td></tr>
	                                        <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	                                        <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	                                        <tr><td></td><td><button type="button" class="btn btn-default" onclick="load_controler('register_pmb');">Cancel</button></td></tr>
	                                    </table>
                                    </div>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->
                    </div>

                </div>
        <script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>