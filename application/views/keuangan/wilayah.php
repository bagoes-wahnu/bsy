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
                       <!--      <div class="shortcuts">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url('keuangan/kota');?>">Data Kota</a></li>
                                    <li class="active">Data Wilayah</li>
                                    <li><a href="<?php echo site_url('keuangan/cabang');?>">Data Cabang</a></li>
                                    <li><a href="<?php echo site_url('keuangan/kas');?>">Data Kas</a></li>
                                </ol>
                            </div> -->
                            <header class="card-heading">
                                <button type="button" onclick="import_wilayah()" class="btn btn-default oke">Import Data</button>
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
                                        <label class="control-label lbl">Pilih Kota : </label>
                                        <select class="js-example-basic-single select-dua" name="state" onchange="window.location = '<?php 
                                        echo site_url('keuangan/wilayah') ?>/'+this.value;">
                                            <option value="">Silahkan Pilih Kota</option>
                                            <option value="1" <?php if(!empty($id_kota) and $id_kota == 1){echo "selected";} ?>>Banjarnegara</option>
                                            <option value="2" <?php if(!empty($id_kota) and $id_kota == 2){echo "selected";} ?>>Wonosobo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="margin-top: 15px;">
                                    <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Wilayah</th>
                                                <th class="col-xs-1 tengah">Bulan</th>
                                                <th class="col-xs-1 tengah">Tahun</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $arr_bulan = array('1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
                                            $no=0;
                                            foreach ($keuangan as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['WILAYAH'] .' ('.$value['KOTA'].')'; ?></td>
                                                    <td style="text-align: center;"><?php echo $arr_bulan[$value['BULAN']]; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['TAHUN']; ?></td>
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
                                                                    <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Cabang" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                                </li>
                                                                <li> 
                                                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
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

<div class="modal fade" id="modal_import_wilayah" tabindex="-1" role="dialog" aria-labelledby="modal_import_wilayah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Import Keuangan Wilayah.</h4>
                <p>Isilah data dibawah ini untuk mengimport data keuangan wilayah !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white btn_batal_import_wilayah" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_import_wilayah" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
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
                    <select class="select form-control input" style="margin-top: 7px;" name="wilayah" id="wilayah" disabled="">
                        <option value="">Silahkan Pilih Kota Terlebih Dahulu</option>

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
                <button type="button" class="btn btn-default btn_batal_import_wilayah" data-dismiss="modal" id="btn_batal_import_wilayah">Batal</button>
                <button type="submit" class="btn btn-default oke" id="btn_import_wilayah" onclick="import_wilayah(true)">Import</button>
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

    function import_wilayah(save=false) {
        if(save == false){
            $('#modal_import_wilayah').modal({backdrop: 'static',keyboard: false}, 'show');
        }else{
            var file = new FormData($("#form_import_wilayah")[0]);
            var data = $("#form_import_wilayah").serializeArray();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("keuangan/import_wilayah"); ?>",
                data:file,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend:function() {
                    $("#btn_import_wilayah").attr('disabled', '').removeAttr('onclick').html('Importing...');
                    $('.btn_batal_import_wilayah').hide();
                    preventLeaving();
                },
                success:function(msg){
                    window.onbeforeunload = false;
                    $('.btn_batal_import_wilayah').show();
                    var obj = jQuery.parseJSON(msg);
                    if(obj.status != "OK"){
                        swal("Peringatan!", obj.msg, "warning");
                    } else {
                        $('#modal_import_wilayah').modal('hide');
                        swal("Berhasil!", obj.msg, "success");
                    }
                },
                complete:function() {
                    $('.btn_batal_import_wilayah').show();
                    $("#btn_import_wilayah").removeAttr('disabled').attr('onclick', 'import_wilayah(true)');
                    $('#btn_import_wilayah').html('Import');
                }

            });
        }
    }

    function get_wilayah(id_kota='') {
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

    // $('#modal_import_wilayah').on('hidden.bs.modal', function () {
    //     $('#modal_import_wilayah #file').val('');
    // });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>