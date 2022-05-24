<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Wilayah</h1>
                            <p>Berikut ini adalah beberapa informasi data wilayah terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li class="active">Master Wilayah</li>
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
                                <button onclick="add_wilayah()" class="btn btn-default oke">Tambah Data</button>
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
                                                <th class="col-xs-1 tengah">Nama Wilayah</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no=0;
                                            foreach ($wilayah as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['KOTA']; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['WILAYAH']; ?></td>
                                                    <td style="text-align: center;">

                                                        <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                        <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab custom-fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li> 
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_wilayah(<?php echo $value['ID_WILAYAH']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_wilayah(<?php echo $value['ID_WILAYAH']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
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

<div class="modal fade" id="modal_wilayah" tabindex="-1" role="dialog" aria-labelledby="modal_wilayah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Wilayah</h4>
                <p>Isilah data dibawah ini untuk menambahkan data wilayah !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_wilayah" method="post" action="" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Nama Wilayah : </label>
                    <input id="wilayah" type="text" name="wilayah" placeholder="Masukan Nama Wilayah" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Nama Kota : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="kota" id="kota">
                        <option value="">Pilih Kota</option>
                        <?php
                        foreach ($kota as $value2) {
                            ?>
                            <option value="<?php echo $value2['ID_KOTA']; ?>"><?php echo $value2['KOTA']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
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
                <button type="submit" class="btn btn-default oke" id="btn_save_wilayah">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<script src="<?php echo base_url('assets/js/custom.js'); ?>" ></script>
<script type="text/javascript">
    function reset_form_wilayah() {
        $('#modal_wilayah #wilayah').val('');
        $('#modal_wilayah #kota').val('');
        $('#modal_wilayah #kota').change();
        $('#modal_wilayah #status').prop('checked', true);
        $('#btn_save_wilayah').removeAttr('onclick');
    }

    function add_wilayah() {
        $('#modal_wilayah').modal('show');
        $('#modal_wilayah .modal-header .modal-title').html('Tambah Data Wilayah');
        $('#modal_wilayah .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data wilayah !');
        $('#btn_save_wilayah').attr('onclick', 'simpan_wilayah()');
        $('#btn_save_wilayah').html('Tambah');

    }

    function edit_wilayah(id_wilayah) {
        $('#modal_wilayah').modal('show');
        $('#modal_wilayah .modal-header .modal-title').html('Ubah Data Wilayah');
        $('#modal_wilayah .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data wilayah !');
        $('#btn_save_wilayah').attr('onclick', 'simpan_wilayah('+id_wilayah+')');
        $('#btn_save_wilayah').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("wilayah/get"); ?>/"+id_wilayah,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_wilayah #wilayah').val(obj.data.WILAYAH);
                    $('#modal_wilayah #kota').val(obj.data.ID_KOTA);
                    $('#modal_wilayah #kota').change();

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

    function simpan_wilayah(id_wilayah = '') {
        var data = $("#form_wilayah").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("wilayah/save"); ?>/"+id_wilayah,
            data:data,
            beforeSend:function() {
                $("#btn_save_wilayah").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_wilayah').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_wilayah").removeAttr('disabled').attr('onclick', 'simpan_wilayah('+id_wilayah+')');
                if(id_wilayah == ''){
                    $('#btn_save_wilayah').html('Tambah');
                }else{
                    $('#btn_save_wilayah').html('Simpan');
                }
            }

        });
    }

    function hapus_wilayah(id_wilayah = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("wilayah/delete_wilayah"); ?>/"+id_wilayah,
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

    $('#modal_wilayah').on('hidden.bs.modal', function () {
        reset_form_wilayah();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>