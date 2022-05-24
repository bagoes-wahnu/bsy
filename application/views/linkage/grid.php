<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Linkage Profile</h1>
                            <p>Berikut ini adalah beberapa informasi data linkage terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Company Profile</a></li>
                                <li class="active">Linkage Profile</li>
                            </ol>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="container-fluid">
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-data-tables product-table-wrapper">
                            <header class="card-heading">
                                <button type="button" onclick="add_linkage()" class="btn btn-default oke">Tambah Data</button>      
                                <!-- <button data-toggle="modal" data-target="#tambah" class="btn btn-default oke">Tambah Data</button>		 -->
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
                                <div class="table-responsive">
                                    <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Nama Linkage</th>
                                                <th class="col-xs-1 tengah">Tipe</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($linkage as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['NAMA_BANK']; ?></td>
                                                    <td style="text-align: center;"><?php echo ($value['TYPE'] == 1)? 'Bank' : 'Non-Bank'; ?></td>
                                                    <td style="text-align: center;">

                                                        <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                        <!-- <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li> --> 
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_linkage(<?php echo $value['ID_LINKAGE']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                                    </span>
                                                                <!-- </li>
                                                                <li> -->
                                                                    <span data-toggle="tooltip" data-placement="top" title="Detail Linkage">
                                                                        <a href="<?php echo site_url('detail_linkage/grid/'.$value['ID_LINKAGE']);?>">
                                                                            <button type="button" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-file-text"></i></button>
                                                                        </a>
                                                                    </span>
                                                                <!-- </li> 
                                                                <li> -->
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_linkage(<?php echo $value['ID_LINKAGE']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                <!-- </li>                                                            
                                                            </ul>
                                                        </nav>  -->
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

<!-- start: modal linkage -->
<div class="modal fade" id="modal_linkage" tabindex="-1" role="dialog" aria-labelledby="modal_linkage">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Data Linkage</h4>
                <p>Isilah data dibawah ini untuk menambahkan data linkage !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_linkage" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label lbl">Nama  : </label>
                    <input id="nama_bank" type="text" name="nama_bank" placeholder="Masukan Nama" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Tipe  : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="tipe" id="tipe">
                        <option value="">Pilih Tipe </option>
                        <option value="1">Bank</option>
                        <option value="0">Non Bank</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label class="control-label lbl">Upload Logo : </label>
                    <div class="form-group is-empty">
                        <div class="input-group" style="width: 100%;">
                            <input type="file" onchange="readURL(this);" class="form-control" accept=".jpg,.jpeg,.png" placeholder="Upload Gambar" name="file">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control input" placeholder="Upload Gambar Terkait">
                                <span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;">
                                    <button type="button" class="btn btn-info btn-fab btn-fab-sm">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group hide" id="logo">
                    <label class="control-label lbl">Logo sekarang : </label><br>
                    <a href="javascript:;" target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" title="Lihat Logo"><i class="zmdi zmdi-search"></i> Lihat</a>
                </div>
                <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                <label class="lbl">Status</label>
                            </td>
                            <td> : </td>
                            <td> 
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" class="toggle-primary" id="status" name="status" value="1" checked>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save_linkage">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal linkage -->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset_form_linkage() {
        $('#modal_linkage #nama_bank').val('');
        $('#modal_linkage #linkage').val('');
        $('#modal_linkage #tipe').val('');
        $('#modal_linkage #tipe').change();
        $('#modal_linkage #logo').addClass('hide');
        $('#modal_linkage #status').prop('checked', true);
        $('#btn_save_linkage').removeAttr('onclick');
    }

    function add_linkage() {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Tambah Data Linkage');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data linkage !');
        $('#btn_save_linkage').attr('onclick', 'simpan_linkage()');
        $('#btn_save_linkage').html('Tambah');

    }

    function edit_linkage(id_linkage) {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Ubah Data Linkage');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data linkage !');
        $('#btn_save_linkage').attr('onclick', 'simpan_linkage('+id_linkage+')');
        $('#btn_save_linkage').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("linkage/get"); ?>/"+id_linkage,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_linkage #nama_bank').val(obj.data.NAMA_BANK);
                    $('#modal_linkage #tipe').val(obj.data['TYPE']);
                    $('#modal_linkage #tipe').change();

                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }

                    if(!$.isEmptyObject(obj.data.LOGO)){
                        $('#modal_linkage #logo').removeClass('hide');
                        $('#modal_linkage #logo a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/logo?src='+obj.data.LOGO+'&id='+obj.data.ID_LINKAGE);
                    }else{
                        $('#modal_linkage #logo').addClass('hide');
                        $('#modal_linkage #logo a').attr('href', 'javascript:;');
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_linkage(id_linkage = '') {
        var file = new FormData($("#form_linkage")[0]);
        var data = $("#form_linkage").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("linkage/save"); ?>/"+id_linkage,
            data:file,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function() {
                $("#btn_save_linkage").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_linkage').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_linkage").removeAttr('disabled').attr('onclick', 'simpan_linkage('+id_linkage+')');
                if(id_linkage == ''){
                    $('#btn_save_linkage').html('Tambah');
                }else{
                    $('#btn_save_linkage').html('Simpan');
                }
            }

        });
    }

    function hapus_linkage(id_linkage = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("linkage/delete_linkage"); ?>/"+id_linkage,
                beforeSend:function() {
                    preventLeaving();
                },
                success:function(msg){
                    window.onbeforeunload = false;
                    var obj = jQuery.parseJSON(msg);
                    if(obj.status != "OK"){
                        swal("Peringatan!", obj.msg, "warning");
                    } else {
                        alertify.success(obj.msg);
                        setTimeout
                        window.setTimeout(function(){
                            location.reload();
                        }, 1500);
                    }
                }
            });
        }else{
            alertify.error('Proses berhasil dibatalkan');
        }
    }

    $('#modal_linkage').on('hidden.bs.modal', function () {
        reset_form_linkage();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }


</script>

<style type="text/css">
    .slider_gambar{margin-top: 15px;}

    .slider_gambar .fiks{
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
        background-color: #f5f5f5;
    }

    .slider_gambar .fiks img{
        position: absolute;
        top: -9999px;
        left: -9999px;
        right: -9999px;
        bottom: -9999px;
        margin: auto;
    }
</style>