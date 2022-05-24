<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Linkage <?php echo $linkage['NAMA_BANK']; ?></h1>
                            <p>Berikut ini adalah beberapa informasi data linkage Kota <?php echo $kota['KOTA']; ?> terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li><a href="<?php echo site_url('kota');?>/grid">Master Kota</a></li>
                                <li><a href="<?php echo site_url('kota/linkage/'.$id_kota);?>">Linkage Program</a></li>
                                <li class="active">Detail Linkage <?php echo $linkage['NAMA_BANK']; ?></li>
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
                                <button type="button" onclick="add_detail_linkage()" class="btn btn-default oke">Tambah Data</button>      
                                <a href="<?php echo site_url('kota/linkage/'.$id_kota);?>" class="btn btn-default">Kembali</a>
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
                                    <table id="productsTable" class="table table-hover product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Tanggal Pencairan</th>
                                                <th class="col-xs-1">Tanggal Jatuh Tempo</th>
                                                <th class="col-xs-1">Suku Bunga (%)</th>
                                                <th class="col-xs-1">Platfond</th>
                                                <th class="col-xs-1">Baki Debet</th>
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
                                            foreach ($d_linkage_kota as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($value['TGL_PENCAIRAN'])); ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($value['TGL_JATUH_TEMPO'])); ?></td>
                                                    <td><?php echo $value['SUKU_BUNGA']; ?></td>
                                                    <td><?php echo 'Rp. '.$value['PLATFOND'].',-'; ?></td>
                                                    <td><?php echo 'Rp. '.$value['BAKI_DEBET'].',-'; ?></td>
                                                    <td style="text-align: center;">
                                                        <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li> 
                                                                    <a href="javascript:;" onclick="hapus_detail_linkage(<?php echo $value['ID_D_LINKAGE_KOTA']; ?>)" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <a href="javascript:;" onclick="edit_detail_linkage(<?php echo $value['ID_D_LINKAGE_KOTA']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></a>
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
            <input type="hidden" name="id_kota" id="id_kota" value="<?php echo $id_kota; ?>">
            <input type="hidden" name="id_linkage" id="id_linkage" value="<?php echo $id_linkage; ?>">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Tanggal Pencairan : </label>
                    <input type="text" name="tgl_pencairan" id="tgl_pencairan" class="form-control input" placeholder="Masukkan Tanggal Pencairan">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Tanggal Jatuh Tempo : </label>
                    <input type="text" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" class="form-control input" placeholder="Masukkan Tanggal Jatuh Tempo">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Suku Bunga : </label>
                    <input type="text" name="suku_bunga" id="suku_bunga" class="form-control input" placeholder="Masukkan Suku Bunga">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Platfond : </label>
                    <input id="platfond" type="text" name="platfond" class="form-control input currency_format" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Masukkan Total Nominal" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Baki Debet : </label>
                    <input id="baki_debet" type="text" name="baki_debet" class="form-control input currency_format" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Masukkan Total Nominal" aria-required="true" autocomplete="off">
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        currency_format('.currency_format');
        number_format('#suku_bunga');
    });

    var disable = false, picker = new Pikaday({
        field: document.getElementById('tgl_pencairan'),
        firstDay: 1,
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020],
        format: 'DD-MM-YYYY',

        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });

    var disable = false, picker = new Pikaday({
        field: document.getElementById('tgl_jatuh_tempo'),
        firstDay: 1,
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020],
        format: 'DD-MM-YYYY',

        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });

    function reset_form() {
        $('#modal_form #tgl_pencairan').val('');
        $('#modal_form #tgl_jatuh_tempo').val('');
        $('#modal_form #suku_bunga').val('');
        $('#modal_form #platfond').val('');
        $('#modal_form #baki_debet').val('');
        $('#btn_save').removeAttr('onclick');
    }

    function add_detail_linkage() {
        $('#modal_form').modal('show');
        $('#modal_form .modal-header .modal-title').html('Tambah Detail Linkage <?php echo $linkage['NAMA_BANK']; ?>');
        $('#modal_form .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan detail linkage <?php echo $linkage['NAMA_BANK']; ?> !');
        $('#btn_save').attr('onclick', 'simpan_d_linkage_kota()');
        $('#btn_save').html('Tambah');        
    }

    function edit_detail_linkage(id_d_linkage_kota) {
        $('#modal_form').modal('show');
        $('#modal_form .modal-header .modal-title').html('Ubah Detail Linkage <?php echo $linkage['NAMA_BANK']; ?>');
        $('#modal_form .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah detail linkage <?php echo $linkage['NAMA_BANK']; ?> !');
        $('#btn_save').attr('onclick', 'simpan_d_linkage_kota('+id_d_linkage_kota+')');
        $('#btn_save').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/get_detail_linkage_kota"); ?>/"+id_d_linkage_kota,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_form #tgl_pencairan').val(obj.data.TGL_PENCAIRAN);
                    $('#modal_form #tgl_jatuh_tempo').val(obj.data.TGL_JATUH_TEMPO);
                    $('#modal_form #suku_bunga').val(obj.data.SUKU_BUNGA);
                    $('#modal_form #platfond').val(obj.data.PLATFOND);
                    $('#modal_form #baki_debet').val(obj.data.BAKI_DEBET);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_d_linkage_kota(id_d_linkage_kota = '') {
        var data = $("#form1").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kota/save_detail_linkage_kota"); ?>/"+id_d_linkage_kota,
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
                $("#btn_save").removeAttr('disabled').attr('onclick', 'simpan_d_linkage_kota('+id_d_linkage_kota+')');
                if(id_d_linkage_kota == ''){
                    $('#btn_save').html('Tambah');
                }else{
                    $('#btn_save').html('Simpan');
                }
            }

        });
    }

    function hapus_detail_linkage(id_d_linkage_kota = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("kota/delete_detail_linkage_kota"); ?>/"+id_d_linkage_kota,
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