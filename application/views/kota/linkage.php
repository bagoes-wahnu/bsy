<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Linkage</h1>
                            <p>Berikut ini adalah beberapa informasi data linkage Kota <?php echo $kota['KOTA']; ?> terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li><a href="<?php echo site_url('kota');?>/grid">Master Kota</a></li>
                                <li class="active">Linkage Program</li>
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
                                <a href="<?php echo site_url('kota');?>/grid" class="btn btn-default">Kembali</a>
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
                                                <th class="col-xs-1 tengah">Tipe</th>
                                                <th class="col-xs-1">Nama Bank</th>
                                                <th class="col-xs-1">Nominal</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            function format_rupiah($rp) {
                                                $hasil = "Rp. " . number_format($rp, 0, "", ".") . ",-";
                                                return $hasil;
                                            }
                                            foreach ($linkage_kota as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo ($value['TYPE'] == 1)? 'Bank' : 'Non-Bank'; ?></td>
                                                    <td><?php echo $value['NAMA_BANK']; ?></td>
                                                    <td><?php echo 'Rp. '.$value['NOMINAL'].',-'; ?></td>
                                                    <td style="text-align: center;">
                                                        <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li> 
                                                                    <a href="javascript:;" onclick="hapus_linkage(<?php echo $value['ID_LINKAGE']; ?>)" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <a href="javascript:;" onclick="edit_linkage(<?php echo $value['ID_LINKAGE']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></a>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Detail History"> 
                                                                        <a href="<?php echo site_url('kota/detail_linkage/'.$id_kota.'/'.$value['ID_LINKAGE']); ?>" class="btn btn-primary btn-fab btn-fab-sm"><i class="zmdi zmdi-search"></i></a>
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

<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modal_form">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Lingkage Program</h4>
                <p>Isilah data dibawah ini untuk menambahkan data linkage program !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form1" action="<?php echo site_url('kota/save_linkage') ?>" method="post" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Bank : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="linkage" id="linkage">
                        <option value="">-- Pilih Bank --</option>
                        <?php
                        foreach ($linkage as $value) {
                            ?>
                            <option value="<?php echo $value['ID_LINKAGE']; ?>"><?php echo $value['NAMA_BANK']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Jumlah Nominal : </label>
                    <input id="nominal" type="text" name="nominal" class="form-control input currency_format" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Masukan Total Nominal" aria-required="true" autocomplete="off">
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-default oke" id="btn_save">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        currency_format('.currency_format');
    });

    function reset_form() {
        $('#modal_form #linkage').val('');
        $('#modal_form #linkage').change();
        $('#modal_form #nominal').val('');
        $('#btn_save').removeAttr('onclick');
    }

    function add_linkage() {
        $('#modal_form').modal('show');
        $('#modal_form .modal-header .modal-title').html('Tambah Data Linkage');
        $('#modal_form .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data linkage !');
        $('#btn_save').attr('onclick', 'simpan_linkage()');
        $('#btn_save').html('Tambah');
        
    }

    function edit_linkage(id_linkage) {
        $('#modal_form').modal('show');
        $('#modal_form .modal-header .modal-title').html('Ubah Data Linkage');
        $('#modal_form .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data linkage !');
        $('#btn_save').attr('onclick', 'simpan_linkage('+id_linkage+')');
        $('#btn_save').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/get_linkage_kota/".$id_kota); ?>/"+id_linkage,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_form #linkage').val(obj.data.ID_LINKAGE);
                    $('#modal_form #linkage').change();
                    $('#modal_form #nominal').val(obj.data.NOMINAL);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_linkage(id_linkage = '') {
        var data = $("#form1").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/save_linkage_kota/".$id_kota); ?>/"+id_linkage,
            data:data,
            beforeSend:function() {
                $("#btn_save").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_form').modal('hide');
                    alertify.success(obj.msg);
                    setTimeout
                    window.setTimeout(function(){
                       location.reload();
                   }, 1500);
                }
            },
            complete:function() {
                $("#btn_save").removeAttr('disabled').attr('onclick', 'simpan_linkage('+id_linkage+')');
                if(id_linkage == ''){
                    $('#btn_save').html('Tambah');
                }else{
                    $('#btn_save').html('Simpan');
                }
            }

        });
    }

    function hapus_linkage(id_linkage = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("kota/delete_linkage_kota/".$id_kota); ?>/"+id_linkage,
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

    $('#modal_form').on('hidden.bs.modal', function () {
        reset_form();
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