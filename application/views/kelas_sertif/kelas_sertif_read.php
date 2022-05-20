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
<?php
$attributes = array(
    'class'     =>  'btn',
    'width'     =>  '800',
    'height'    =>  '650',
    'screenx'   =>  '\'+((parseInt(screen.width) - 800)/2)+\'',
    'screeny'   =>  '\'+((parseInt(screen.height) - 600)/2)+\'',
);
?>
            <!-- <main class="main"> -->
                <!-- Breadcrumb-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><b><?php echo $judul; ?></b></li>
                    <!-- Breadcrumb Menu-->
                    <li class="breadcrumb-menu d-md-down-none">
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn" href="<?=base_url('regis/sertif/'.$slug)?>" target="blank_">
                                <i class="fa fa-link"></i> Link Registrasi
                            </a>
                            <?=anchor_popup(base_url('kelas_sertif/soal_ujian/'.$id), '<i class="fa fa-check-square"></i> Soal Ujian', $attributes)?>
                            <a class="btn" href="<?=$link?>" target="blank_">
                                <i class="fa fa-file-pdf-o"></i> Link Sertifikat
                            </a>
                            <a class="btn" onclick="reload_table();" href="javascript:void(0)">
                                <i class="fa fa-refresh"></i> Reload Data</a>
                        </div>
                    </li>
                </ol>
                <!-- <div style="margin-bottom: 1.5rem;"></div> -->
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
                                                        <th>Nilai</th>
                                                        <!-- <th>Create Date</th> -->
                                                        <!-- <th>Update Date</th> -->
                                                        <th width="90px">Action</th>
                                                    </tr>
                                                </thead>
        
                                        </table>
                                        <script type="text/javascript">
                                            var table;

                                            $(document).ready(function() {
                                                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                                                {
                                                    return {
                                                        "iStart": oSettings._iDisplayStart,
                                                        "iEnd": oSettings.fnDisplayEnd(),
                                                        "iLength": oSettings._iDisplayLength,
                                                        "iTotal": oSettings.fnRecordsTotal(),
                                                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                                    };
                                                };

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
                                                    ajax: {"url": "regis_sertif/json_kelas/<?=$id?>", "type": "POST"},
                                                    columns: [
                                                        {
                                                            "data": "id_regis",
                                                            "orderable": false
                                                        },
                                                        {"data": "nama_lengkap"},
                                                        {"data": "id_kelas_sertif"},
                                                        {"data": "no_hp"},
                                                        {"data": "email"},
                                                        {"data": "instansi"},
                                                        {
                                                            "data": "skor",
                                                            "className" : "text-right",
                                                        },
                                                        // {"data": "create_date"},
                                                        // {"data": "update_date"},
                                                        {
                                                            "data" : "all",
                                                            "orderable": false,
                                                            "className" : "text-center",
                                                            "orderable": false
                                                        }
                                                    ],
                                                    order: [[6, 'desc']],
                                                    rowCallback: function(row, data, iDisplayIndex) {
                                                        var info = this.fnPagingInfo();
                                                        var page = info.iPage;
                                                        var length = info.iLength;
                                                        var index = page * length + (iDisplayIndex + 1);
                                                        $('td:eq(0)', row).html(index);
                                                        if ( data['skor'] == null ) { 
                                                            $('td', row).eq(6).html('')
                                                        }else if( data['skor'] < 167 ){
                                                            $('td', row).eq(6).html('<h5><span class="badge badge-danger">'+data['skor']+'</span></h5>')
                                                        }else{
                                                            $('td', row).eq(6).html('<h5><span class="badge badge-success">'+data['skor']+'</span></h5>')
                                                        }
                                                        /*
                                                        if ( data['nilai'] < 167 && data['nilai'] >= 0 ) {
                                                            $('td', row).eq(6).html('<span class="badge badge-danger">'+data['nilai']+'</span>')
                                                        }else if( data['nilai'] == null ) {
                                                            $('td', row).eq(6).html('<span class="badge badge-warning">-</span>')
                                                        }else{
                                                            $('td', row).eq(6).html('<span class="badge badge-success">'+data['nilai']+'</span>')
                                                        }
                                                        */
                                                        
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