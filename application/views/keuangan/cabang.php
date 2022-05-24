<!-- Ngeload Select 2 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.min.css">
<script src="<?php echo base_url();?>assets/select2/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
</script>

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Jaringan Kantor</h1>
                            <p>Berikut ini adalah beberapa informasi data jaringan kantor terkait aplikasi.</p>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="container-fluid">
            <div class="content-body" style="margin-top: -25px;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-data-tables product-table-wrapper">
                           <!--  <div class="shortcuts">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url('keuangan/kota');?>">Data Kota</a></li>
                                    <li><a href="<?php echo site_url('keuangan/wilayah');?>">Data Wilayah</a></li>
                                    <li class="active">Data Cabang</li>
                                    <li><a href="<?php echo site_url('keuangan/kas');?>">Data Kas</a></li>
                                </ol>
                            </div> -->
                            <header class="card-heading">
                                <button type="button" onclick="import_cabang()" class="btn btn-default oke">Import Data</button> 
                                <div class="card-search">
                                    <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                                        <i class="zmdi zmdi-search search-icon-left"></i>
                                        <input type="text" class="form-control filter-input" placeholder="Filter Data" autocomplete="off">
                                        <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close"><i class="zmdi zmdi-close"></i></a>
                                    </div>
                                </div>
                                <ul class="card-actions icons right-top">
                                    <li id="deleteItems" style="display: none;">
                                        <span class="label label-info pull-left m-t-5 m-r-10 text-white"></span>
                                        <a href="javascript:void(0)" id="confirmDelete" data-toggle="tooltip" data-placement="top" data-original-title="Delete Product(s)">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-card-search="open" data-toggle="tooltip" data-placement="top" data-original-title="Filter Products">
                                            <i class="zmdi zmdi-filter-list"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown" data-toggle="tooltip" data-placement="top" data-original-title="Tampilkan Data">
                                        <a href="javascript:void(0)" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <div id="dataTablesLength">
                                        </div>
                                    </li>
                                </ul>
                            </header>
                            <div class="card-body p-0">
                                <div style="padding: 0px 20px;">
                                    <div class="form-group">
                                        <label class="control-label lbl">Pilih Wilayah : </label>
                                        <select class="js-example-basic-single select-dua" name="state">
                                            <option>Silahkan Pilih Wilayah</option>
                                            <option value="wil1">Wilayah I</option>
                                            <option value="wil2">Wilayah II</option>
                                            <option value="wil3">Wilayah III</option>
                                            <option value="wil4">Wilayah IV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="margin-top: 20px;">
                                    <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Cabang</th>
                                                <th class="col-xs-1 tengah">Bulan</th>
                                                <th class="col-xs-1 tengah">Tahun</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">1</td>
                                                <td style="text-align: center;">Wanadadi</td>
                                                <td style="text-align: center;">Januari</td>
                                                <td style="text-align: center;">2014</td>
                                                <td style="text-align: center;">
                                                    <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                        <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                            <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                        <ul class="nav-sub">
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo site_url('Keuangan');?>/kas" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">2</td>
                                                <td style="text-align: center;">Punggelan</td>
                                                <td style="text-align: center;">Februari</td>
                                                <td style="text-align: center;">2015</td>
                                                <td style="text-align: center;">
                                                    <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                        <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                            <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                        <ul class="nav-sub">
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo site_url('Keuangan');?>/kas" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">3</td>
                                                <td style="text-align: center;">Mandiraja</td>
                                                <td style="text-align: center;">Maret</td>
                                                <td style="text-align: center;">2015</td>
                                                <td style="text-align: center;">
                                                    <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                        <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                            <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                        <ul class="nav-sub">
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo site_url('Keuangan');?>/kas" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">4</td>
                                                <td style="text-align: center;">Purbalingga</td>
                                                <td style="text-align: center;">April</td>
                                                <td style="text-align: center;">2014</td>
                                                <td style="text-align: center;">
                                                    <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                        <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                            <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                        <ul class="nav-sub">
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo site_url('Keuangan');?>/kas" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">5</td>
                                                <td style="text-align: center;">Banyumas</td>
                                                <td style="text-align: center;">Mei</td>
                                                <td style="text-align: center;">2015</td>
                                                <td style="text-align: center;">
                                                    <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                        <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                            <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                        <ul class="nav-sub">
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo site_url('Keuangan');?>/kas" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">6</td>
                                                <td style="text-align: center;">Dieng</td>
                                                <td style="text-align: center;">Juni</td>
                                                <td style="text-align: center;">2013</td>
                                                <td style="text-align: center;">
                                                    <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                        <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                            <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                        <ul class="nav-sub">
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo site_url('Keuangan');?>/kas" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal_import_cabang" tabindex="-1" role="dialog" aria-labelledby="modal_import_cabang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Import Keuangan Wilayah.</h4>
                <p>Isilah data dibawah ini untuk mengimport data keuangan wilayah !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white btn_batal_import_cabang" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_import_cabang" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label lbl">Kota : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="kota" id="kota" onchange="get_wilayah(this.value)">
                        <option value="">Pilih Kota</option>
                        <?php                        
                        foreach ($kota as $value) {
                            ?>
                            <option value="<?php echo $value['ID_KOTA']; ?>"><?php echo $value['KOTA']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Nama Wilayah : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="wilayah" id="wilayah" disabled="" onchange="get_cabang(this.value)">
                        <option value="">Silahkan Pilih Kota Terlebih Dahulu</option>

                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Nama Cabang : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="cabang" id="cabang" disabled="">
                        <option value="">Silahkan Pilih Wilayah Terlebih Dahulu</option>

                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">File Excel : </label>
                    <div class="form-group is-empty">
                        <div class="input-group" style="width: 100%;">
                            <input type="file" onchange="cekFile(this.value)" accept=".xlsx" class="form-control" placeholder="Upload File" name="file">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control input" placeholder="Upload File Terkait">
                                <span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;">
                                    <button type="button" class="btn btn-info btn-fab btn-fab-sm">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn_batal_import_cabang" data-dismiss="modal" id="btn_batal_import_cabang">Batal</button>
                <button type="submit" class="btn btn-default oke" id="btn_import_cabang" onclick="import_cabang(true)">Import</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<style type="text/css">
    /* Shortcut */
    .breadcrumb li a,
    .breadcrumb>li+li:before, 
    .mega.breadcrumb>li+li:before{
        color: #2c3e50;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: -0.2px;
    }

    .breadcrumb li a:hover,
    .breadcrumb li.active{
        color: #e74c3c;
        font-weight: 600;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: -0.2px;
    }

    .shortcuts{
        width: 100%;
        background-color: #f5f5f5;
        padding: 15px 20px 10px 20px;
    }

    .shortcuts .breadcrumb{margin-bottom: 0px;}
    /* Shortcut */
</style>
<script type="text/javascript">
    function cekFile(fileName) {
        var ext = fileName.split(".")[fileName.split(".").length - 1];
        if ((ext.toUpperCase() == "XLS") || (ext.toUpperCase() == "XLSX")){
            return true;
        }else {
            swal('Peringatan!', 'File yang diterima adalah .xlsx<br>Silahkan pilih file lagi atau file tidak akan disimpan.', 'warning');
            $("[name=file]").val('');
            return false;
        }
        return true;
    }

    function import_cabang(save=false) {
        if(save == false){
            $('#modal_import_cabang').modal({backdrop: 'static',keyboard: false}, 'show');
        }else{
            var file = new FormData($("#form_import_cabang")[0]);
            var data = $("#form_import_cabang").serializeArray();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("keuangan/import_cabang"); ?>",
                data:file,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend:function() {
                    $("#btn_import_cabang").attr('disabled', '').removeAttr('onclick').html('Importing...');
                    $('.btn_batal_import_cabang').hide();
                    preventLeaving();
                },
                success:function(msg){
                    window.onbeforeunload = false;
                    $('.btn_batal_import_cabang').show();
                    var obj = jQuery.parseJSON(msg);
                    if(obj.status != "OK"){
                        swal("Peringatan!", obj.msg, "warning");
                    } else {
                        $('#modal_import_cabang').modal('hide');                        
                        swal("Berhasil!", obj.msg, "success");
                    }
                },
                complete:function() {
                    $('.btn_batal_import_cabang').show();
                    $("#btn_import_cabang").removeAttr('disabled').attr('onclick', 'import_cabang(true)');
                    $('#btn_import_cabang').html('Import');
                }

            });
        }
    }

    function get_wilayah(id_kota='') {
        $('#cabang').prop('disabled', true);
        $('#cabang').html('<option value="">Silahkan Pilih Wilayah Terlebih Dahulu</option>');
        if(id_kota == ''){
            $('#wilayah').prop('disabled', true);
            $('#wilayah').html('<option value="">Silahkan Pilih Kota Terlebih Dahulu</option>');
        }else{
            $('#wilayah').prop('disabled', false);
            $('#wilayah').html('<option value="">Pilih Wilayah</option>');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("wilayah/get_by_kota"); ?>",
                data:{id_kota:id_kota},
                success:function(msg){
                    window.onbeforeunload = false;
                    var obj = jQuery.parseJSON(msg);
                    if(obj.status == "OK"){
                        if(obj.counter == 0){
                            $('#wilayah').prop('disabled', true);
                            alertify.error('Tidak ada data wilayah');
                        }else{
                            $('#wilayah').prop('disabled', false);
                        }

                        $('#wilayah').html(obj.data);
                    } else {                        
                        swal("Peringatan!", obj.msg, "warning");
                    }
                }

            });
        }
    }

    function get_cabang(id_wilayah='') {
        if(id_wilayah == ''){
            $('#cabang').prop('disabled', true);
            $('#cabang').html('<option value="">Silahkan Pilih Wilayah Terlebih Dahulu</option>');
        }else{
            $('#cabang').prop('disabled', false);
            $('#cabang').html('<option value="">Pilih Cabang</option>');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("cabang/get_by_wilayah"); ?>",
                data:{id_wilayah:id_wilayah},
                success:function(msg){
                    window.onbeforeunload = false;
                    var obj = jQuery.parseJSON(msg);
                    if(obj.status == "OK"){
                        if(obj.counter == 0){
                            $('#cabang').prop('disabled', true);
                            alertify.error('Tidak ada data cabang');
                        }else{
                            $('#cabang').prop('disabled', false);
                        }

                        $('#cabang').html(obj.data);
                    } else {                        
                        swal("Peringatan!", obj.msg, "warning");
                    }
                }

            });
        }
    }

    // $('#modal_import_cabang').on('hidden.bs.modal', function () {
    //     $('#modal_import_cabang #file').val('');
    // });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>