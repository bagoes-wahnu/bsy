<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Kas</h1>
                            <p>Berikut ini adalah beberapa informasi data cabang terkait aplikasi.</p>
                            <!-- <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li class="active">Master Kas</li>
                            </ol> -->
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
                                <a href="<?php echo site_url('cabang/grid_baru/'.$cabang['ID_WILAYAH']) ?>" class="btn btn-warning oke">Kembali</a>
                                <button onclick="add_kas()" class="btn btn-default oke">Tambah Data</button>
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
                            <div id="loading_hapus" class="cssload-loader cssload-blue hide" style="top: 50% !important;z-index: 999;">loading</div> 
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Nama Cabang</th>
                                                <th class="col-xs-1 tengah">Nama Kas</th>
                                                <th class="col-xs-1 tengah">Kategori</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($kas as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $cabang['CABANG']; ?></td> 
                                                    <td style="text-align: center;"><?php echo $value['KAS']; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['KATEGORI']; ?></td>
                                                    <td style="text-align: center;">

                                                        <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                       <!--  <span data-toggle="tooltip" data-placement="bottom" title="Kas"> 
                                                                        <a type="button" href="<?php echo site_url('kas/grid_baru/'.$value['ID_CABANG']) ?>" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-search"></i></a>
                                                                    </span> -->
                                                        <!-- <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab custom-fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                        -->
                                                            <!-- <ul class="nav-sub">
                                                            <li>  -->

                                                                <!-- </li>
                                                                <li> -->
                                                                    <?php
                                                                    if(!empty($value['FOTO'])){
                                                                        ?>
                                                                        <span data-toggle="tooltip" data-placement="top" title="Lihat Foto"> 
                                                                            <button type="button" onclick="window.open('<?php echo base_url('watch').'/kas?src='.$value['FOTO'].'&id='.$value['ID_KAS'];?>')" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-image"></i></button>
                                                                        </span>
                                                                        <?php 
                                                                    }
                                                                    ?>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_kas(<?php echo $value['ID_KAS']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                                    </span>
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_kas(<?php echo $value['ID_KAS']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                <!-- </li>                                                            
                                                            </ul> -->
                                                            <!-- </nav>   -->
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

    <div class="modal fade" id="modal_kas" tabindex="-1" role="dialog" aria-labelledby="modal_kas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel-2">Tambah Data Kas.</h4>
                    <p>Isilah data dibawah ini untuk menambahkan data kas !</p>
                    <ul class="card-actions icons right-top">
                        <li>  
                            <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                                <i class="zmdi zmdi-close"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <form id="form_kas" method="post" action="" enctype="multipart/form-data"  onsubmit="return false;">
                <div class="modal-body">     
                 <div class="form-group">
                    <label class="control-label lbl">Kategori : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="kategori" id="kategori">
                        <option value="">Pilih Kategori </option>
                        <option value="Kantor Kas">Kantor Kas </option>
                        <option value="Kas Keliling">Kas Keliling </option>
                        <option value="Payment Point">Payment Point </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Nama Kas : </label>
                    <input id="kas" type="text" name="kas" placeholder="Masukan Nama Kas" data-rule-required="true" data-rule-rangelength="[3,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Alamat : </label>
                    <input id="alamat" type="text" name="alamat" placeholder="Masukan Alamat" data-rule-required="true" data-rule-rangelength="[3,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Kecamatan : </label>
                    <input id="kecamatan" type="text" name="kecamatan" placeholder="Masukan Kecamatan" data-rule-required="true" data-rule-rangelength="[3,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">No Telp : </label>
                    <input id="no_telp" type="text" name="no_telp" placeholder="Masukan No Telp" data-rule-required="true" data-rule-rangelength="[5,30]" class="form-control input" aria-required="true" autocomplete="off">
                    <input type="hidden" value="<?php echo $cabang['ID_CABANG'] ?>" name="id_cabang" id="id_cabang">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Upload Photo : </label>
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
                <div class="form-group hide" id="image_kas">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-default oke" id="btn_save_kas">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<script src="<?php echo base_url('assets/js/custom.js'); ?>" ></script>
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
    function reset_form_kas() {
        $('#modal_kas #kas').val('');
        $('#modal_kas #alamat').val('');
        $('#modal_kas #kecamatan').val('');
        $('#modal_kas #no_telp').val('');
        $('#modal_kas #id_cabang').val('');
        $('#modal_kas #status').prop('checked', true);
        $('#btn_save_kas').removeAttr('onclick');
    }

    function add_kas() {
        $('#modal_kas').modal('show');
        $('#modal_kas .modal-header .modal-title').html('Tambah Data Kas');
        $('#modal_kas .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data kas !');
        $('#btn_save_kas').attr('onclick', 'simpan_kas()');
        $('#btn_save_kas').html('Tambah');

    }

    function edit_kas(id_kas) {
        $('#modal_kas').modal('show');
        $('#modal_kas .modal-header .modal-title').html('Ubah Data Kas');
        $('#modal_kas .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data kas !');
        $('#btn_save_kas').attr('onclick', 'simpan_kas('+id_kas+')');
        $('#btn_save_kas').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kas/get"); ?>/"+id_kas,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    //console.log(obj.data.KATEGORI);
                    $('#modal_kas #kategori').val(obj.data.KATEGORI);
                    $('#modal_kas #kategori').change();
                    $('#modal_kas #kas').val(obj.data.KAS);
                    $('#modal_kas #alamat').val(obj.data.ALAMAT);
                    $('#modal_kas #kecamatan').val(obj.data.KECAMATAN);
                    $('#modal_kas #no_telp').val(obj.data.NO_TELP);
                    $('#modal_kas #id_cabang').val(obj.data.ID_CABANG);

                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }
                    if(!$.isEmptyObject(obj.data.FOTO)){
                        $('#modal_kas #image_kas').removeClass('hide');
                        $('#modal_kas #image_kas a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/kas?src='+obj.data.FOTO+'&id='+obj.data.ID_KAS);
                    }else{
                        $('#modal_kas #image_kas').addClass('hide');
                        $('#modal_kas #image_kas a').attr('href', 'javascript:;');
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_kas(id_kas = '') {
        var file = new FormData($("#form_kas")[0]);
        var data = $("#form_kas").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kas/save"); ?>/"+id_kas,
            data:file,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function() {
                $("#btn_save_kas").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_kas').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_kas").removeAttr('disabled').attr('onclick', 'simpan_kas('+id_kas+')');
                if(id_kas == ''){
                    $('#btn_save_kas').html('Tambah');
                }else{
                    $('#btn_save_kas').html('Simpan');
                }
            }

        });
    }

    function hapus_kas(id_kas = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("kas/delete_kas"); ?>/"+id_kas,
                beforeSend:function() {
                    preventLeaving();
                    $('#loading_hapus').html('Menghapus');
                    $('#loading_hapus').removeClass('hide');
                },
                success:function(msg){
                    window.onbeforeunload = false;
                    $('#loading_hapus').addClass('hide');
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

    $('#modal_kas').on('hidden.bs.modal', function () {
        reset_form_kas();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>