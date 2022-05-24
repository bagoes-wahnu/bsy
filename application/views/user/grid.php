<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Master User</h1>
                            <p>Berikut ini adalah beberapa informasi data master user terkait aplikasi.</p>
                            <!-- <ol class="breadcrumb"> -->
                                <!-- <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li><a href="<?php echo site_url();?>user/halaman">Master User</a></li> -->
                                <?php

                                ?>
                                <?php if ($id==1){
                                    // echo '<li class="active">Banjarnegara</li>';
                                }else{
                                    // echo '<li class="active">Wonosobo</li>';
                                } ?>
                            <!-- </ol> -->
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
                                <a onclick="add_user()"  class="btn btn-default oke">Tambah Data</a>
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
                                                <th class="col-xs-1" data-orderable="false">Nama</th>
                                                <th class="col-xs-1" data-orderable="false">Username</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Hak Akses</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 0;
                                            foreach ($data as $key ):
                                                $no++;
                                                if ($key['STATUS']==1) {
                                                    $status = '<span class="label label-success font-size-12"><i class="zmdi zmdi-check"></i></span> ';
                                                }else{
                                                    $status = '<span class="label label-danger font-size-12"><i class="zmdi zmdi-close"></i></span> ';
                                                }
                                                if($key['ROLE']==1){
                                                    $status_user = 'Admin';
                                                }elseif($key['ROLE']==2){
                                                    $status_user = 'Kinerja Keuangan';
                                                }elseif($key['ROLE']==3){
                                                    $status_user = 'Pembukuan';
                                                }elseif($key['ROLE']==4){
                                                    $status_user = 'Personalia';
                                                }elseif($key['ROLE']==5){
                                                    $status_user = 'Sekertaris';
                                                }elseif($key['ROLE']==6){
                                                    $status_user = 'Android';
                                                }else{
                                                    $status_user = '-';
                                                }
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no ?></td>
                                                    <td><?php echo $key['NAMA_LENGKAP']; ?></td>
                                                    <td><?php echo $key['USERNAME']; ?></td>
                                                    <td style="text-align: center;"><?php echo $status_user ?></td>
                                                    <td style="text-align: center;"><?php echo $status ?></td>
                                                    <td class="oys">
                                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                                            <a href="#" onclick="edit_user(<?php echo $key['ID_USER']; ?>)" data-toggle="modal" data-target="#ubah">
                                                                <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                            </a>
                                                        </span>
                                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah Password">
                                                            <a href="#" onclick="edit_pass(<?php echo $key['ID_USER']; ?>)" data-toggle="modal" data-target="#ubah">
                                                                <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-key"></i></button>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>



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

<style type="text/css">
.oys .bottom{top: 50px !important;}

.oys .top{top: -20px !important;}

.oys{text-align: center !important;}
</style>

<script type="text/javascript">
    $(function() {
        $('#android').hide();
        $('#hak').change(function(){
            if($('#hak').val() == '6') {
                $('#android').show();
                $('#bukan_android').hide();
            }else if($('#hak').val() != '6') {
                $('#bukan_android').show();
                $('#android').hide();
            }
        });
    });

</script>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Master User</h4>
                <p>Isilah data dibawah ini untuk menambahkan data master user !</p>
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form method="" id="form_user" onsubmit="return false;" style="overflow-y: hidden;">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label lbl">Pilih Hak Akses  : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="hak" id="hak">
                        <option >Pilih Hak Akses </option>
                        <option value="1">Admin</option>
                        <option value="2">Kinerja Keuangan</option>
                        <option value="3">Pembukuan</option>
                        <option value="4">Personalia</option>
                        <option value="5">Sekertaris</option>
                        <option value="6">Android</option>
                    </select>
                </div>
                <div id="android">
                    <div class="form-group">
                        <label class="control-label lbl">Nama Lengkap : </label>
                        <input id="namalengkap" type="text" name="namalengkap" placeholder="Masukan Nama Lengkap" data-rule-required="true" class="form-control input" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label lbl">Nama Panggilan : </label>
                        <input id="namaPanggilan" type="text" name="namaPanggilan" placeholder="Masukan Nama Panggilan" data-rule-required="true" class="form-control input" autocomplete="off">
                    </div>
                </div>
                <div id="bukan_android">


                </div>

                <div class="form-group">
                    <label class="control-label lbl">Nama User : </label>
                    <input id="namauser" type="text" name="namauser" placeholder="Masukan Nama User" data-rule-required="true" class="form-control input" autocomplete="off">
                </div>
                <div class="form-group" id="password_div">
                    <label class="control-label lbl">Password : </label>
                    <input id="password" type="password" name="password" placeholder="Masukan Password" data-rule-required="true" class="form-control input" autocomplete="off">
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
                                        <input type="checkbox" name="status" id="status" value="1" class="toggle-primary" checked>
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


<!-- ubah password -->
<div class="modal fade" id="ubah_pass" tabindex="-1" role="dialog" aria-labelledby="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Master User</h4>
                <p>Isilah data dibawah ini untuk menambahkan data master user !</p>
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form method="" id="form_pass" onsubmit="return false;" >
            <div class="modal-body">

                <div class="form-group" >
                    <label class="control-label lbl">Password Lama : </label>
                    <input id="password_lama" type="password" name="password_lama" placeholder="Masukan Password" data-rule-required="true" class="form-control input" autocomplete="off">
                </div>
                <div class="form-group" >
                    <label class="control-label lbl">Password Baru : </label>
                    <input id="password_baru" type="password" name="password_baru" placeholder="Masukan Password" data-rule-required="true" class="form-control input" autocomplete="off">
                </div>
                <div class="form-group" >
                    <label class="control-label lbl">Password Baru : </label>
                    <input id="password_baru2" type="password" name="password_baru2" placeholder="Masukan Password" data-rule-required="true" class="form-control input" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save_pass">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end ubah password -->
<script type="text/javascript">

    function reset_form_user() {
        $('#tambah #status').val('');
        $('#tambah #hak').val('');
        $('#tambah #namauser').val('');
        $('#tambah #password').val('');
        $('#tambah #namalengkap').val('');
        $('#tambah #namaPanggilan').val('');


        $('#btn_save_linkage').removeAttr('onclick');
    }
    function reset_form_pass() {
        $('#ubah_pass #password_lama').val('');
        $('#ubah_pass #password_baru').val('');
        $('#ubah_pass #password_baru2').val('');
    }
    function add_user() {
        $('#tambah').modal('show');
        $('#tambah .modal-header .modal-title').html('Tambah Data User');
        $('#tambah .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data linkage !');
        $('#btn_save_linkage').attr('onclick', 'simpan_linkage()');
        $('#btn_save_linkage').html('Tambah');
        $( "#password_div" ).show();
    }

    function edit_user(id_user) {
        $('#tambah').modal('show');
        $('#tambah .modal-header .modal-title').html('Ubah Data User');
        $('#tambah .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data linkage !');
        $('#btn_save_linkage').attr('onclick', 'simpan_linkage('+id_user+')');
        $('#btn_save_linkage').html('Simpan');
        $( "#password_div" ).hide();
        $('#namauser').prop('readonly', false);
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("user/get"); ?>/"+id_user,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    if (obj.data.ROLE=='6') {
                        /*alert('a');*/
                        $('#android').show();
                    }
                    $('#tambah #hak').val(obj.data.ROLE);
                    $('#tambah #hak').change();

                    $('#tambah #namauser').val(obj.data.USERNAME);
                    /*$('#tambah #password').val(obj.data.PASSWORD);*/
                    $('#tambah #namalengkap').val(obj.data.NAMA_LENGKAP);
                    $('#tambah #namaPanggilan').val(obj.data.NAMA_PANGGILAN);
                    if(obj.data.STATUS == 1){
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
    function edit_pass(id_user) {

        $('#ubah_pass').modal('show');
        $('#ubah_pass .modal-header .modal-title').html('Ubah Pass');
        $('#ubah_pass .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data !');
        $('#btn_save_pass').attr('onclick', 'simpan_pass('+id_user+')');
        $('#btn_save_pass').html('Simpan');
        $('#ubah_pass #password_lama').val('');
        $('#ubah_pass #password_baru').val('');
        $('#ubah_pass #password_baru2').val('');
        $( "#password_div" ).hide();
        $('#namauser').prop('readonly', true);
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("user/get"); ?>/"+id_user,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {


                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_linkage(id_user = '') {
        var file = new FormData($("#form_user")[0]);
        var data = $("#form_user").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("user/save/".$id); ?>/"+id_user,
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
                    $('#tambah').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_linkage").removeAttr('disabled').attr('onclick', 'simpan_linkage('+id_user+')');
                if(id_user == ''){
                    $('#btn_save_linkage').html('Tambah');
                }else{
                    $('#btn_save_linkage').html('Simpan');
                }
            }

        });
    }
    function simpan_pass(id_user = '') {
        var file = new FormData($("#form_pass")[0]);
        var data = $("#form_pass").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("user/save_pass/".$id); ?>/"+id_user,
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
                    $('#ubah_pass').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_linkage").removeAttr('disabled').attr('onclick', 'simpan_linkage('+id_user+')');
                if(id_user == ''){
                    $('#btn_save_linkage').html('Tambah');
                }else{
                    $('#btn_save_linkage').html('Simpan');
                }
            }

        });
    }

    function hapus_linkage(id_user = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("user/delete_linkage"); ?>/"+id_user,
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

    $('#tambah').on('hidden.bs.modal', function () {
        reset_form_user();
        location.reload();
    });
    $('#ubah_pass').on('hidden.bs.modal', function () {
        reset_form_pass();
        location.reload();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>
