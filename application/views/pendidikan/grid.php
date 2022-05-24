<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Master Pendidikan</h1>
                            <p>Berikut ini adalah beberapa informasi data Master Pendidikan aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li class="active">Master Pendidikan</li>
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
                                <button type="button" onclick="add_pendidikan()" class="btn btn-default oke">Tambah Data</button>      
                                <!-- <button data-toggle="modal" data-target="#tambah" class="btn btn-default oke">Tambah Data</button>    -->
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
                                                <th class="col-xs-1 tengah">Nama Pendidikan</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($pendidikan as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['PENDIDIKAN']; ?></td>
                                                    <td style="text-align: center;">

                                                        <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                        <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                               
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_pendidikan(<?php echo $value['ID_PENDIDIKAN']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
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

<!-- start: modal pendidikan -->
<div class="modal fade" id="modal_pendidikan" tabindex="-1" role="dialog" aria-labelledby="modal_pendidikan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Data Pendidikan</h4>
                <p>Isilah data dibawah ini untuk menambahkan data pendidikan !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_pendidikan" method="post" action="" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Nama Pendidikan : </label>
                    <input id="pendidikan" type="text" name="pendidikan" placeholder="Masukan Nama Pendidikan" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
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
                <button type="button" class="btn btn-default oke" id="btn_save_pendidikan">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal pendidikan -->




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

    function reset_form_pendidikan() {
        $('#modal_pendidikan #pendidikan').val('');
        $('#modal_pendidikan #status').prop('checked', true);
        $('#btn_save_pendidikan').removeAttr('onclick');
    }

    function add_pendidikan() {
        $('#modal_pendidikan').modal('show');
        $('#modal_pendidikan .modal-header .modal-title').html('Tambah Data Pendidikan');
        $('#modal_pendidikan .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data pendidikan !');
        $('#btn_save_pendidikan').attr('onclick', 'simpan_pendidikan()');
        $('#btn_save_pendidikan').html('Tambah');
        
    }

    function edit_pendidikan(id_pendidikan) {
        $('#modal_pendidikan').modal('show');
        $('#modal_pendidikan .modal-header .modal-title').html('Ubah Data Pendidikan');
        $('#modal_pendidikan .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data pendidikan !');
        $('#btn_save_pendidikan').attr('onclick', 'simpan_pendidikan('+id_pendidikan+')');
        $('#btn_save_pendidikan').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("pendidikan/get"); ?>/"+id_pendidikan,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_pendidikan #pendidikan').val(obj.data['PENDIDIKAN']);

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

    function simpan_pendidikan(id_pendidikan = '') {
        var data = $("#form_pendidikan").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("pendidikan/save"); ?>/"+id_pendidikan,
            data:data,
            beforeSend:function() {
                $("#btn_save_pendidikan").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_pendidikan').modal('hide');
                    alertify.success(obj.msg);
                    setTimeout
                    window.setTimeout(function(){
                       location.reload();
                   }, 700);
                }
            },
            complete:function() {
                $("#btn_save_pendidikan").removeAttr('disabled').attr('onclick', 'simpan_pendidikan('+id_pendidikan+')');
                if(id_pendidikan == ''){
                    $('#btn_save_pendidikan').html('Tambah');
                }else{
                    $('#btn_save_pendidikan').html('Simpan');
                }
            }

        });
    }

    // function hapus_pendidikan(id_pendidikan = '') {
    //     var c = confirm('Apakah Anda yakin akan menghapus data ini?');

    //     if(c == true){
    //         $.ajax({
    //             type:"POST",
    //             url:"<?php echo base_url("pendidikan/delete_pendidikan"); ?>/"+id_pendidikan,
    //             beforeSend:function() {
    //                 preventLeaving();
    //             },
    //             success:function(msg){
    //                 window.onbeforeunload = false;
    //                 var obj = jQuery.parseJSON(msg);
    //                 if(obj.status != "OK"){
    //                     swal("Peringatan!", obj.msg, "warning");
    //                 } else {
    //                     alertify.success(obj.msg);
    //                     window.setTimeout(function(){
    //                        location.reload();
    //                    }, 1500);
    //                 }
    //             }
    //         });
    //     }else{
    //         alertify.error('Proses berhasil dibatalkan');
    //     }
    // }

    $('#modal_pendidikan').on('hidden.bs.modal', function () {
        reset_form_pendidikan();
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