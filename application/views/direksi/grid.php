<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>SDM</h1>
                            <p>Berikut ini adalah beberapa informasi SDM terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="#">Master</a></li>
                                <li class="active">SDM</li>
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
                                <button type="button" onclick="add_direksi()" class="btn btn-default oke">Tambah Data</button>      
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
                                                <!-- <th class="col-xs-1 tengah">Kota</th> -->
                                                <th class="col-xs-1 tengah">Nama SDM</th>
                                                <!-- <th class="col-xs-1 tengah">Jabatan</th> -->
                                                <!-- <th class="col-xs-1 tengah">Kategori Jabatan</th> -->
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($direksi as $value) {
                                                // $jabatan2 = $this->M_jabatan->get($value['ID_JABATAN']);
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <!-- <td style="text-align: center;"><?php if($value['ID_KOTA']==1){
                                                        echo "Banjarnegara";
                                                    }elseif($value['ID_KOTA']==2){
                                                        echo "Wonosobo";
                                                    } ; ?></td> -->
                                                    <td style="text-align: center;"><?php echo $value['NAMA']; ?></td>
                                                   <!--  <td style="text-align: center;">Pemegang Saham</td>
                                                   <td style="text-align: center;"><?php echo ($value['ID_JABATAN'] == null)? '-' : $jabatan2['JABATAN']; ?></td> -->
                                                   <td style="text-align: center;">

                                                    <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                </td>
                                                <td style="text-align: center;" class="oys">
                                                        <!--   
                                                        <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li> 
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_direksi(<?php echo $value['ID_DIREKSI']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                </li>
                                                                <li>
                                                                    
                                                                </li>                                                            
                                                            </ul>
                                                        </nav>
                                                    -->
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <button type="button" onclick="edit_direksi(<?php echo $value['ID_DIREKSI']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Timeline">
                                                        <a href="<?php echo site_url('direksi/timeline/'.$value['ID_DIREKSI']);?>"> 
                                                            <button type="button" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-calendar-note"></i></button>
                                                        </a>
                                                    </span> 
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

<!-- start: modal direksi -->
<div class="modal fade" id="modal_direksi" tabindex="-1" role="dialog" aria-labelledby="modal_direksi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Data SDM</h4>
                <p>Isilah data dibawah ini untuk menambahkan data SDM !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_direksi" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body p-0">
                <div class="tabpanel">
                    <ul class="nav nav-tabs p-0">
                        <li class="active" role="presentation"><a href="#tab-1" data-toggle="tab" aria-expanded="true">Data Umum</a></li>
                        <li role="presentation"><a href="#tab-2" data-toggle="tab" aria-expanded="true">Narasi</a></li>
                    </ul>
                </div>
                <div class="tab-content  p-20">
                    <div class="tab-pane fadeIn active" id="tab-1">
                        <div class="form-group">
                            <label class="control-label lbl">Nama SDM : </label>
                            <input id="nama" type="text" name="nama" placeholder="Masukan Nama Bank" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
                        </div>
                     <!--      <div class="form-group">
                            <label class="control-label lbl">Kota  : </label>
                            <select class="select form-control input" style="margin-top: 7px;" name="kota" id="kota">
                                <option value="">Pilih Kota </option>
                                <option value="1">Banjarnegara</option>
                                <option value="2">Wonosobo </option>
                            </select>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label lbl">Kategori Jabatan  : </label>
                            <select class="select form-control input" style="margin-top: 7px;" name="jabatan" id="jabatan">
                                <option value="">Pilih Jabatan </option>
                                <?php  foreach ($jabatan as $key ) {
                                  echo " <option value='".$key['ID_JABATAN']."'>".$key['JABATAN']."</option>";
                                }
                                ?>
                            </select>
                        </div> -->
                       <!--  <div class="form-group">
                            <label class="control-label lbl">Jabatan : </label>
                            <input type="text" placeholder="Masukan Jabatan" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
                        </div>   -->              
                        <div class="form-group">
                            <label class="control-label lbl">Upload Photo : </label>
                            <div class="form-group is-empty">
                                <div class="input-group" style="width: 100%;">
                                <div id="field_upload">
                                        <input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="file">
                                        <div class="input-group">
                                            <input type="text" id="file_text" readonly="" class="form-control input" placeholder="Upload Gambar Terkait">
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
                        <div class="form-group hide" id="direksi">
                            <label class="control-label lbl">Photo sekarang : </label><br>
                            <a href="javascript:;" target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" title="Lihat Photo"><i class="zmdi zmdi-search"></i> Lihat</a>
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
                    <div class="tab-pane fadeIn" id="tab-2">
                        <div class="form-group">
                            <label class="control-label lbl" style="margin-bottom: 15px;">Isilah keterangan untuk menambah data narasi yang akan dimasukan !</label>
                            <textarea class="form-group" name="narasi1" id="narasi1">

                            </textarea>
                            <textarea class="hide" name="narasi" id="narasi">

                            </textarea>
                            <script>
                                // Replace the <textarea id="narasi1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'narasi1' );
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_save_direksi">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal direksi -->

<script type="text/javascript">
    $(document).ready(function () {
        $('.pilihan_selek').hide();
        $('#selectMe').change(function () {
            $('.pilihan_selek').hide();
            $('#'+$(this).val()).show();
        })
    });

    function readURL(input='') {
        if(input != ''){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                    .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    function reset_form_direksi() {
        $('#modal_direksi #direksi').val('');
        $('#modal_direksi #nama').val('');
        $('#modal_direksi #kota').val('');
        $('#modal_direksi #kota').change();
        $('#modal_direksi #jabatan').val('');
        $('#modal_direksi #jabatan').change();
        $('#modal_direksi #direksi').addClass('hide');
        $('#modal_direksi #status').prop('checked', true);
        $('#btn_save_direksi').removeAttr('onclick');
    }

    function add_direksi() {
        reset_form_direksi();
        $('#modal_direksi').modal('show');
        $('#modal_direksi .modal-header .modal-title').html('Tambah Data SDM');
        $('#modal_direksi .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data SDM !');
        $('#btn_save_direksi').attr('onclick', 'simpan_direksi()');
        $('#btn_save_direksi').html('Tambah');


    }

    function edit_direksi(id_direksi) {
        $('#modal_direksi').modal('show');
        $('#modal_direksi .modal-header .modal-title').html('Ubah Data SDM');
        $('#modal_direksi .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data SDM !');
        $('#btn_save_direksi').attr('onclick', 'simpan_direksi('+id_direksi+')');
        $('#btn_save_direksi').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("direksi/get"); ?>/"+id_direksi,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_direksi #nama').val(obj.data.NAMA);
                    $('#modal_direksi #jabatan').val(obj.data.ID_JABATAN);
                    $('#modal_direksi #jabatan').change();
                    $('#modal_direksi #kota').val(obj.data.ID_KOTA);
                    $('#modal_direksi #kota').change();
                    // $('#modal_direksi #narasi').html(obj.data.DESKRIPSI);
                    // CKEDITOR.instance.editor1.setData(obj.data.DESKRIPSI);
                    // CKEDITOR.instances.editor1.updateElement();
                    CKEDITOR.instances.narasi1.setData(obj.data.DESKRIPSI);
                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }

                    if(!$.isEmptyObject(obj.data.FOTO)){
                        $('#modal_direksi #direksi').removeClass('hide');
                        $('#modal_direksi #direksi a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/direksi?src='+obj.data.FOTO+'&id='+obj.data.ID_DIREKSI);
                    }else{
                        $('#modal_direksi #direksi').addClass('hide');
                        $('#modal_direksi #direksi a').attr('href', 'javascript:;');
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_direksi(id_direksi = '') {
        $('#narasi').val(CKEDITOR.instances.narasi1.getData());
        var file = new FormData($("#form_direksi")[0]);
        var data = $("#form_direksi").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("direksi/save"); ?>/"+id_direksi,
            data:file,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function() {
                $("#btn_save_direksi").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_direksi').modal('hide');
                    alertify.success(obj.msg);
                    $('#file_text').val('');
                    $('#field_upload').html('<input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="file"><div class="input-group"><input type="text" id="file_text" readonly="" class="form-control input" placeholder="Upload Gambar Terkait"><span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;"><button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-attachment-alt"></i></button></span></div>');
                    // setTimeout
                    window.setTimeout(function(){
                        location.reload();
                    }, 700);
                }
            },
            complete:function() {
                $("#btn_save_direksi").removeAttr('disabled').attr('onclick', 'simpan_direksi('+id_direksi+')');
                if(id_direksi == ''){
                    $('#btn_save_direksi').html('Tambah');
                }else{
                    $('#btn_save_direksi').html('Simpan');
                }
            }

        });
    }

    // function hapus_direksi(id_direksi = '') {
    //     var c = confirm('Apakah Anda yakin akan menghapus data ini?');

    //     if(c == true){
    //         $.ajax({
    //             type:"POST",
    //             url:"<?php echo base_url("direksi/delete_direksi"); ?>/"+id_direksi,
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
    //                     setTimeout
    //                     window.setTimeout(function(){
    //                         location.reload();
    //                     }, 1500);
    //                 }
    //             }
    //         });
    //     }else{
    //         alertify.error('Proses berhasil dibatalkan');
    //     }
    // }

    $('#modal_direksi').on('hidden.bs.modal', function () {
        reset_form_direksi();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>

<style type="text/css">
    .oys .bottom{top: 50px !important;}

    .oys .top{top: -20px !important;}

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