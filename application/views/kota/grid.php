<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Kota</h1>
                            <p>Berikut ini adalah beberapa informasi data kota terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li class="active">Master Kota</li>
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
                                <!-- <button type="button" onclick="add_kota()" class="btn btn-default oke">Tambah Data</button>       -->
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
                                                <th class="col-xs-1 tengah">Nama Kota</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($kota as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['KOTA']; ?></td>
                                                    <td style="text-align: center;">

                                                        <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                        <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <!-- <li> 
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_kota(<?php //echo $value['ID_KOTA']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                </li> -->
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_kota(<?php echo $value['ID_KOTA']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                                    </span>
                                                                </li>
                                                                <li> 
                                                                    <a href="<?php echo site_url('kota/linkage/'.$value['ID_KOTA']);?>" data-toggle="tooltip" data-placement="top" title="Linkage Program" class="btn btn-primary btn-fab btn-fab-sm"><i class="zmdi zmdi-link"></i></a>
                                                                </li>
                                                                <li> 
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Struktur Organisasi">
                                                                        <a href="javascript:;" onclick="get_struk_org(<?php echo $value['ID_KOTA']; ?>)" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-accounts-add"></i></a>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="top" title="Struktur Modal">
                                                                        <button type="button" onclick="get_struk_modal(<?php echo $value['ID_KOTA']; ?>)" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></button>
                                                                    </span>
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

<!-- start: modal kota -->
<div class="modal fade" id="modal_kota" tabindex="-1" role="dialog" aria-labelledby="modal_kota">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Data Kota</h4>
                <p>Isilah data dibawah ini untuk menambahkan data kota !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_kota" method="post" action="" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Nama Kota : </label>
                    <input id="kota" type="text" name="kota" placeholder="Masukan Nama Kota" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
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
                <button type="button" class="btn btn-default oke" id="btn_save_kota">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal kota -->


<div class="modal fade" id="struk_modal" tabindex="-1" role="dialog" aria-labelledby="struk_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Form Struktur Modal</h4>
                <p>Isilah data dibawah ini untuk menambah data Struktur Modal !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_modal" action="<?php echo site_url('kota/save_modal') ?>" method="post" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Modal Inti : </label>
                    <input id="modal_inti" type="text" name="modal_inti" class="form-control input-mask currency_format" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Rp: 000.000.000.000.000,00" value="" onchange="sum_modal()" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Modal Pelengkap : </label>
                    <input id="modal_pelengkap" type="text" name="modal_pelengkap" class="form-control input-mask currency_format" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Rp: 000.000.000.000.000,00" value="" onchange="sum_modal()" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Total Modal Inti : </label>
                    <input id="total_modal" type="text" name="total_modal" class="form-control input-mask currency_format" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Rp: 000.000.000.000.000,00" aria-required="true" autocomplete="off" readonly="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-default oke" id="btn_save_modal">Simpan</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade" id="struk_org" tabindex="-1" role="dialog" aria-labelledby="struk_org">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Form Struktur Organisasi</h4>
                <p>Silahkan upload data terkait Struktur Organisasi !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_org" action="<?php echo site_url('kota/save_struktur') ?>" method="post" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">
                <label class="control-label lbl">Upload Gambar : </label>     
                <div class="slider_gambar">
                    <div class="fiks"><img id="blah" src="#"/></div>
                </div>
                <div class="form-group is-empty" style="margin-top: 15px;">
                    <div class="input-group" style="width: 100%;">
                        <input type="file" onchange="readURL(this);" class="form-control" accept=".jpg,.jpeg,.png,.pdf" placeholder="Upload Gambar" id="file" name="file">
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
                <div class="form-group hide" id="field-old-file">
                    <label for="existed_file" class="control-label lbl">Existing File</label>
                    <a id="existed_file" name="existed_file" target="_blank" type="text" class="form-control input" href="javascript:;">Hahaha.jpg</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save_org">Simpan</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

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

    function reset_form_kota() {
        $('#modal_kota #kota').val('');
        $('#modal_kota #status').prop('checked', true);
        $('#btn_save_kota').removeAttr('onclick');
    }

    function add_kota() {
        $('#modal_kota').modal('show');
        $('#modal_kota .modal-header .modal-title').html('Tambah Data Kota');
        $('#modal_kota .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data kota !');
        $('#btn_save_kota').attr('onclick', 'simpan_kota()');
        $('#btn_save_kota').html('Tambah');
        
    }

    function edit_kota(id_kota) {
        $('#modal_kota').modal('show');
        $('#modal_kota .modal-header .modal-title').html('Ubah Data Kota');
        $('#modal_kota .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data kota !');
        $('#btn_save_kota').attr('onclick', 'simpan_kota('+id_kota+')');
        $('#btn_save_kota').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/get"); ?>/"+id_kota,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_kota #kota').val(obj.data['KOTA']);

                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_kota(id_kota = '') {
        var data = $("#form_kota").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/save"); ?>/"+id_kota,
            data:data,
            beforeSend:function() {
                $("#btn_save_kota").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_kota').modal('hide');
                    alertify.success(obj.msg);
                    setTimeout
                    window.setTimeout(function(){
                     location.reload();
                 }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_kota").removeAttr('disabled').attr('onclick', 'simpan_kota('+id_kota+')');
                if(id_kota == ''){
                    $('#btn_save_kota').html('Tambah');
                }else{
                    $('#btn_save_kota').html('Simpan');
                }
            }

        });
    }

    function hapus_kota(id_kota = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("kota/delete_kota"); ?>/"+id_kota,
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

    $('#modal_kota').on('hidden.bs.modal', function () {
        reset_form_kota();
    });

    function get_struk_modal(id_kota) {
        $('#struk_modal').modal('show');
        $('#struk_modal .modal-header .modal-title').html('Form Struktur Modal');
        $('#struk_modal .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambah data Struktur Modal !');
        $('#btn_save_modal').attr('onclick', 'simpan_modal('+id_kota+')');
        $('#btn_save_modal').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/get"); ?>/"+id_kota,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#struk_modal #modal_inti').val(obj.data.MODAL_INTI);
                    $('#struk_modal #modal_pelengkap').val(obj.data.MODAL_PELENGKAP);
                    $('#struk_modal #total_modal').val(obj.data.TOTAL_MODAL);
                    currency_format('#struk_modal #modal_inti',true);
                    currency_format('#struk_modal #modal_pelengkap',true);
                    currency_format('#struk_modal #total_modal',true);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function get_struk_org(id_kota) {
        $('#struk_org').modal('show');
        $('#btn_save_org').attr('onclick', 'simpan_struktur('+id_kota+')');
        $('#btn_save_org').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/get"); ?>/"+id_kota,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    if(!$.isEmptyObject(obj.data.STRUKTUR_ORGANISASI)){
                        $('#existed_file').removeAttr('href').attr('href', '<?php echo site_url('watch'); ?>/struktur_organisasi?source='+obj.data.STRUKTUR_ORGANISASI+'&id='+obj.data.ID_KOTA);
                        $('#existed_file').html(obj.data.STRUKTUR_ORGANISASI);
                        $('#field-old-file').removeClass('hide');
                    }else{                        
                        $('#existed_file').html("");
                        $('#existed_file').removeAttr('href').attr('href', 'javascript:;');
                        $('#field-old-file').addClass('hide');
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_struktur(id_kota = '') {
        var file = new FormData($("#form_org")[0]);
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/save_struktur"); ?>/"+id_kota,
            data:file,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function() {
                $("#btn_save_org").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#struk_org').modal('hide');
                    alertify.success(obj.msg);
                }
            },
            complete:function() {
                $("#btn_save_org").removeAttr('disabled').attr('onclick', 'simpan_struktur('+id_kota+')');
                $('#btn_save_org').html('Simpan');
            }

        });
    }

    function sum_modal() {
        var modal_inti = $('#struk_modal #modal_inti').val(),
        modal_pelengkap = $('#struk_modal #modal_pelengkap').val(),
        total_modal = 0;

        modal_inti = modal_inti.replace(/\./g, '');
        modal_pelengkap = modal_pelengkap.replace(/\./g, '');

        total_modal = parseInt(modal_inti) + parseInt(modal_pelengkap);

        $('#struk_modal #total_modal').val(total_modal);
        currency_format('#struk_modal #total_modal', true);
    }

    function simpan_modal(id_kota = '') {
        var data = $("#form_modal").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/save_modal"); ?>/"+id_kota,
            data:data,
            beforeSend:function() {
                $("#btn_save_modal").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    alertify.success(obj.msg);
                }
            },
            complete:function() {
                $("#btn_save_modal").removeAttr('disabled').attr('onclick', 'simpan_modal('+id_kota+')');                
                $('#btn_save_modal').html('Simpan');
            }

        });
    }

    $('#struk_modal').on('hidden.bs.modal', function () {
        $('#struk_modal #modal_inti').val('');
        $('#struk_modal #modal_pelengkap').val('');
        $('#struk_modal #total_modal').val('');
    });

    $('#struk_org').on('hidden.bs.modal', function () {
        $('#struk_org #file').val('');
        $('#struk_org #file').change();
        $('#struk_org #blah').removeAttr('src').attr('src', '#');

        $('#existed_file').html("");
        $('#existed_file').removeAttr('href').attr('href', 'javascript:;');
        $('#field-old-file').addClass('hide');
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }

    function number_format(attribute) {
        $(attribute).keydown(function (e) {
            /* Allow: backspace, delete, tab, escape, enter and . */
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                /* Allow: Ctrl+A, Command+A */
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                /* Allow: home, end, left, right, down, up */
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                /* let it happen, don't do anything */
            return;
        }
        /* Ensure that it is a number and stop the keypress */
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    }

    function currency_format(attribute, load=false) {
        $(attribute).keyup(function(event){
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                ;
            });
        });

        if(load == true){
            $(attribute).change(function(event){
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                    return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                    ;
                });
            });

            $(attribute).change();
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