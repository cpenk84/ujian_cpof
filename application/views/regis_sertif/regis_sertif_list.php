<!doctype html>
    <link href="<?php echo base_url();?>assets/vendors/toastr/css/toastr.min.css" rel="stylesheet" />
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url();?>assets/vendors/toastr/js/toastr.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.js"></script>


    <script type="text/javascript">
        function konfirmasi(id){
                $.ajax({
                    type: "POST",
                    url: "<?=site_url('regis_sertif/konfirmasi/')?>"+id,
                    dataType: "json",
                })
                .done(function(res) {
                    if(res.success) {
                        toastr.success('Berhasil', 'Success', 
                            {
                              "closeButton": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            })
                        reload_table();
                        // $("#"+id).prop('checked',false);
                    } else {
                        toastr.error('Gagal', 'Failed', 
                            {
                              "closeButton": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            })
                    }
                })
            }

        function batal_konfirmasi(id){
                $.ajax({
                    type: "POST",
                    url: "<?=site_url('regis_sertif/batal_konfirmasi/')?>"+id,
                    dataType: "json",
                })
                .done(function(res) {
                    if(res.success) {
                        toastr.success('Berhasil', 'Success', 
                            {
                              "closeButton": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            })
                        reload_table();
                        // $("#"+id).prop('checked',false);
                    } else {
                        toastr.error('Gagal', 'Failed', 
                            {
                              "closeButton": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            })
                    }
                })
            }


</script>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4">
                                            <h4 style="margin-top:0px">Regis Sertif List</h4>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 4px"  id="message">
                                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        <?php if($this->ion_auth_acl->has_permission('access_admin') OR $this->ion_auth_acl->has_permission('create_regis_sertif')) : ?>
                                            <button class="btn btn-primary btn-sm" onclick="load_controler('regis_sertif/create');">Create</button>
                                        <?php endif; ?>
	                                      </div>
                                            </div>
                                            <div class="table-responsive">
                                            <table class="table table-striped table-sm" cellspacing="0" width="100%" id="mytable">
                                                <thead>
                                                    <tr>
                                                        <th width="80px">No</th>
		                                                <th>Nama Lengkap</th>
                                                        <th>Kelas Sertif</th>
		                                                <th>No Hp</th>
		                                                <th>Email</th>
		                                                <th>Instansi</th>
		                                                <th>Status Pembayaran</th>
		                                                <!-- <th>Create Date</th> -->
		                                                <!-- <th>Update Date</th> -->
		                                                <th width="90px">Action</th>
                                                    </tr>
                                                </thead>
	    
                                        </table>
                                        <script type="text/javascript">
                                            var table;

                                            $(document).ready(function() {

                                                //datatables
                                                table = $('#mytable').DataTable({ 
                                                    initComplete: function() {
                                                        var api = this.api();
                                                        $('#mytable_filter input')
                                                                .off('.DT')
                                                                .on('keyup.DT', function(e) {
                                                                    if (e.keyCode == 13) {
                                                                        api.search(this.value).draw();
                                                            }
                                                        });
                                                    },
                                                    oLanguage: {
                                                        sProcessing: "loading..."
                                                    },
                                                    processing: true,
                                                    serverSide: true,
                                                    ajax: {"url": "regis_sertif/json", "type": "POST"},
                                                    columns: [
                                                        {
                                                            "data": "id",
                                                            "orderable": false
                                                        },
                                                        {"data": "nama_lengkap"},
                                                        {"data": "id_kelas_sertif"},
                                                        {"data": "no_hp"},
                                                        {"data": "email"},
                                                        {"data": "instansi"},
                                                        {"data": "status_pembayaran"},
                                                        // {"data": "create_date"},
                                                        // {"data": "update_date"},
                                                        {
                                                            "data" : "all",
                                                            "orderable": false,
                                                            "className" : "text-center"
                                                        }
                                                    ],
                                                    order: [[1, 'desc']],
                                                    rowCallback: function(row, data, iDisplayIndex) {
                                                        if ( data['status_pembayaran'] == 0 ) {
                                                            $('td', row).eq(6).html('<button onclick="if(confirm(\'Are you sure?\')) konfirmasi(\''+data['id']+'\');" class="btn btn-primary btn-sm" type="button"><i class="fa fa-check"></i> Konfirmasi</button>')
                                                        }else{
                                                            $('td', row).eq(6).html('<button onclick="if(confirm(\'Are you sure?\')) batal_konfirmasi(\''+data['id']+'\');" class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i> Batal</button>')
                                                        }
                                                    }
                                                });
                                                table.on( 'order.dt search.dt', function () {
                                                    table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                                        cell.innerHTML = i+1;
                                                    } );
                                                } ).draw();
                                            });
                                            function reload_table()
                                            {
                                                table.ajax.reload(null,false); //reload datatable ajax 
                                            }
                                        </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->
                    </div>

                </div>
        <script src="<?php echo base_url('assets/vendors/datatables/js/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/vendors/datatables/js/dataTables.bootstrap4.js') ?>"></script>
        <script src="<?php echo base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>