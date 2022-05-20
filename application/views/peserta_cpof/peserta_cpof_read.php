<!doctype html>

            <!-- <main class="main"> -->
                <!-- Breadcrumb-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><button type="button" class="btn btn-success btn-sm" onclick="load_controler('peserta_cpof');"><i class="fa fa-arrow-left"></i> Back</button></li>
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
                            <!--
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="margin-top:0px">Peserta Cpof Detail</h4><br>
                                        <table class="table">
                                            <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
                                            <tr><td>Username</td><td><?php echo $username; ?></td></tr>
                                            <tr><td>Password</td><td><?php echo $password; ?></td></tr>
                                            <tr><td>View Password</td><td><?php echo $view_password; ?></td></tr>
                                            <tr><td>Status</td><td><?php echo $status; ?></td></tr>
                                            <tr><td></td><td><button type="button" class="btn btn-default" onclick="load_controler('peserta_cpof');">Cancel</button></td></tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            -->
                            <!--/.col-->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="margin-top:0px">Rangkuman Jawaban</h4><br>
                                        <table class="table">
                                            <tr class="h5">
                                                <td width="300px">Nama Lengkap</td>
                                                <td><?php echo $nama_lengkap; ?></td>
                                            </tr>
                                            <tr class="h5">
                                                <td width="300px">Nilai Ujian Pilihan Ganda</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr class="h5">
                                                <td width="300px">Jawaban Esay 1</td>
                                                <td>Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel, and export to word. This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.

                                                * generate textarea and text input only
                                                Please visit and like harviacode.com for more info and PHP tutorials.</td>
                                            </tr>
                                            <tr class="h5">
                                                <td width="300px">Jawaban Esay 1</td>
                                                <td>Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel, and export to word. This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.

                                                * generate textarea and text input only
                                                Please visit and like harviacode.com for more info and PHP tutorials.</td>
                                            </tr>
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