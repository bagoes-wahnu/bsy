<?php
$id_kota = $this->session->userdata('kota');
?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.min.css">
<script src="<?php echo base_url();?>assets/select2/select2.min.js"></script>
<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Struktur Organisasi</h1>
                            <p>Berikut ini adalah beberapa informasi data jabatan terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Company Profile</a></li>
                                <li><a href="#">Pengurus & Pejabat Eksekutif</a></li>

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
                        <div class="card">
                            <header class="card-heading">
                                <button type="button" onclick="add_jabatan()" class="btn btn-default oke">Tambah Data</button>   
                            </header>
                            <div class="card-body p-0">
                                <div class="tabpanel">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#all" data-toggle="tab"  aria-expanded="true">All</a>
                                        </li>
                                        <?php foreach ($jabatan as $key ) { ?>
                                            <li >
                                                <a href="#<?php echo $key['ID_JABATAN']; ?>" data-toggle="tab" aria-expanded="true"><?php echo $key['JABATAN']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content p-20" style="padding-bottom: 0px !important;">

                                <div class="tab-pane fadeIn active" id="all">
                                    <div class="card-body">
                                        <div id="items"> 
                                            <?php
                                            $sturktur_og_all = $this->M_struktur_organisasi->get_by(array('ID_KOTA' => $id_kota));
                                            if (!empty($sturktur_og_all)) {
                                                foreach ($sturktur_og_all as $key2 ) {
                                                    $direksi_all = $this->M_direksi->get($key2['ID_DIREKSI']);
                                                    if($direksi_all['STATUS'] == 1){
                                                        ?>
                                                        <div id="item1">
                                                        <!--   <a href="<?php echo site_url("struktur_organisasi/up_down/up/".$key2['ID_JABATAN_DIR']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-up"><i class="zmdi zmdi-chevron-up"></i></a>
                                                            <a href="<?php echo site_url("struktur_organisasi/up_down/down/".$key2['ID_JABATAN_DIR']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-down"><i class="zmdi zmdi-chevron-down"></i></a> -->
                                                            <span class="label label-success font-size-12"><i class="zmdi zmdi-check"></i></span> 
                                                            <a href="<?php echo site_url("direksi/timeline/".$key2['ID_DIREKSI']); ?>"><?php echo $direksi_all['NAMA']; ?></a>

                                                            <a  onclick="hapus_jabatan(<?php echo $key2['ID_JABATAN_DIR']; ?>)"  class="move-down tombol tombol_hapus samping">Hapus</a> 
                                                            <a  onclick="edit_jabatan(<?php echo $key2['ID_JABATAN_DIR']; ?>)"  class="move-down tombol samping">Ubah</a> 
                                                        </div>

                                                        <?php 
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php foreach ($jabatan as $key ) { ?>
                                    <div class="tab-pane fadeIn " id="<?php echo $key['ID_JABATAN']; ?>">
                                        <div class="card-body">
                                            <div id="items"> 
                                                <?php 
                                                $sturktur_og = $this->M_struktur_organisasi->get_by(array('ID_JABATAN'=>$key['ID_JABATAN'], 'ID_KOTA' => $id_kota));
                                                if (!empty($sturktur_og)) {
                                                    foreach ($sturktur_og as $key2 ) {
                                                        $direksi3 = $this->M_direksi->get($key2['ID_DIREKSI']);

                                                        if($direksi3['STATUS'] == 1){
                                                            ?>
                                                            <div id="item1">
                                                                <a href="<?php echo site_url("struktur_organisasi/up_down/up/".$key2['ID_JABATAN_DIR']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-up"><i class="zmdi zmdi-chevron-up"></i></a>
                                                                <a href="<?php echo site_url("struktur_organisasi/up_down/down/".$key2['ID_JABATAN_DIR']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-down"><i class="zmdi zmdi-chevron-down"></i></a>
                                                                <span class="label label-success font-size-12"><i class="zmdi zmdi-check"></i></span> 
                                                                <a href="<?php echo site_url("direksi/timeline/".$key2['ID_DIREKSI']); ?>"><?php echo $direksi3['NAMA']; ?></a>
                                                                <a  onclick="hapus_jabatan(<?php echo $key2['ID_JABATAN_DIR']; ?>)" class="move-down tombol tombol_hapus samping">Hapus</a> 
                                                                <a  onclick="edit_jabatan(<?php echo $key2['ID_JABATAN_DIR']; ?>)"  class="move-down tombol samping">Ubah</a>
                                                            </div>

                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
.tombol_hapus:hover{
    background: #e74c3c !important;
}

.tombol{
    cursor: pointer;
}
</style>

<!-- start: modal jabatan -->
<div class="modal fade" id="modal_jabatan" tabindex="-1" role="dialog" aria-labelledby="modal_jabatan" style="overflow-y: hidden;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Data Jabatan</h4>
                <p>Isilah data dibawah ini untuk menambahkan data jabatan !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_jabatan" method="post" action="" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl"> Nama : </label>
                    <select class=" select-du form-control input" style="margin-top: 7px;" name="direksi" id="direksi">
                        <option value="">Pilih Nama </option>
                        <?php  foreach ($direksi as $key ) {
                            echo " <option value='".$key['ID_DIREKSI']."'>".$key['NAMA']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl"> Jabatan : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="jabatan" id="jabatan">
                        <option value="">Pilih Jabatan </option>
                        <?php  foreach ($jabatan as $key ) {
                            echo " <option value='".$key['ID_JABATAN']."'>".$key['JABATAN']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl"> Keterangan : </label>
                    <input id="keterangan" type="text" name="keterangan" placeholder="Masukan Jabatan" data-rule-required="true"  class="form-control input" aria-required="true" autocomplete="off">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save_jabatan">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal jabatan -->


<script type="text/javascript">
// $('.move-up').click(function(e){
//     var $div = $(this).closest('div');
//     if ($div.index() > 0){
//         $div.fadeOut('slow',function(){
//             $div.insertBefore($div.prev('div')).fadeIn('slow');
//         });
//     }
// });

// $('.move-down').click(function(e){
//     var $div = $(this).closest('div');
//     if ($div.index() <= ($div.siblings('div').length - 1)){
//         $div.fadeOut('slow',function(){
//             $div.insertAfter($div.next('div')).fadeIn('slow');
//         });
//     }
// });
</script>
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

    function reset_form_jabatan() {
        $('#modal_jabatan #direksi').val('');
        $('#modal_jabatan #direksi').change();
        $('#modal_jabatan #jabatan').val('');
        $('#modal_jabatan #jabatan').change();
        $('#modal_jabatan #keterangan').val('');
        $('#btn_save_jabatan').removeAttr('onclick');
    }

    function add_jabatan() {
        reset_form_jabatan();
        $('#modal_jabatan').modal('show');
        $('#modal_jabatan .modal-header .modal-title').html('Tambah Data Jabatan');
        $('#modal_jabatan .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data jabatan !');
        $('#btn_save_jabatan').attr('onclick', 'simpan_jabatan()');
        $('#btn_save_jabatan').html('Tambah');
        $('.select-du').select2();
        $.fn.modal.Constructor.prototype.enforceFocus = function () {};

    }

    function edit_jabatan(id_jabatan) {
        $('#modal_jabatan').modal('show');
        $('#modal_jabatan .modal-header .modal-title').html('Ubah Data Jabatan');
        $('#modal_jabatan .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data jabatan !');
        $('#btn_save_jabatan').attr('onclick', 'simpan_jabatan('+id_jabatan+')');
        $('#btn_save_jabatan').html('Simpan');
        $.fn.modal.Constructor.prototype.enforceFocus = function () {};
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("struktur_organisasi/get"); ?>/"+id_jabatan,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_jabatan #direksi').val(obj.data['ID_DIREKSI']);
                    $('#modal_jabatan #direksi').change();
                    $('#modal_jabatan #jabatan').val(obj.data['ID_JABATAN']);
                    $('#modal_jabatan #jabatan').change();
                    $('#modal_jabatan #keterangan').val(obj.data['KETERANGAN']);


                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function hapus_jabatan(id_jabatan) {
        var ask = confirm('Apakah Anda yakin ingin menghapus data ini?');

        if(ask == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("struktur_organisasi/delete_struktur_organisasi"); ?>/"+id_jabatan,
                success:function(msg){
                    var obj = jQuery.parseJSON(msg);
                    if(obj.status == 'OK') {
                        swal("Selamat", 'Data berhasil dihapus', "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }else{
                        swal("OOPS!", obj.msg, "error");
                    }
                }
            });
        }
    }

    function simpan_jabatan(id_jabatan = '') {
        var data = $("#form_jabatan").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("struktur_organisasi/save"); ?>/"+id_jabatan,
            data:data,
            beforeSend:function() {
                $("#btn_save_jabatan").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_jabatan').modal('hide');
                    alertify.success(obj.msg);
                    setTimeout
                    window.setTimeout(function(){
                        location.reload();
                    }, 700);
                }
            },
            complete:function() {
                $("#btn_save_jabatan").removeAttr('disabled').attr('onclick', 'simpan_jabatan('+id_jabatan+')');
                if(id_jabatan == ''){
                    $('#btn_save_jabatan').html('Tambah');
                }else{
                    $('#btn_save_jabatan').html('Simpan');
                }
            }

        });
    }

// function hapus_jabatan(id_jabatan = '') {
//     var c = confirm('Apakah Anda yakin akan menghapus data ini?');

//     if(c == true){
//         $.ajax({
//             type:"POST",
//             url:"<?php echo base_url("jabatan/delete_jabatan"); ?>/"+id_jabatan,
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

$('#modal_jabatan').on('hidden.bs.modal', function () {
    reset_form_jabatan();
});


function preventLeaving() {
    window.onbeforeunload = function() {
        return "Are you sure you want to navigate away?";
    }
}

</script>
<style type="text/css">
#items div{
    background-color: #f5f5f5;
    padding: 10px 0px;
    margin-bottom: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}

#items div a{
    padding: 10px 8px 10px 8px;
    background-color: #ecf0f1;
    color: #34495e;
}

#items div a:hover,
#items div a:focus{
    color: #fff;
    background-color: #e74c3c;
}

#items div .samping{
    padding: 10px 16px;
    float: right;
    margin-top: -10px;
}

#items div .samping:hover,
#items div .samping:focus{
    color: #fff;
    background-color: #42a5f5;
}

#items div .label{
    margin: 0px 4px;
    font-weight: bold;
}

#items div .label-danger{padding: 3px 8px;}

#items div .label-success{padding: 3px 7px;}
</style>
