<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Cabang</h1>
                            <p>Berikut ini adalah beberapa informasi data cabang terkait aplikasi.</p>
                           <!--  <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li class="active">Master Cabang</li>
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
                             <a href="<?php echo site_url('wilayah/grid_baru/'.$wilayah[0]['ID_KOTA']) ?>" class="btn btn-warning oke">Kembali</a>
                             <button onclick="add_cabang()" class="btn btn-default oke">Tambah Data</button>
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
                                            <th class="col-xs-1 tengah">Nama Wilayah</th>
                                            <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                            <th class="col-xs-1 tengah" data-orderable="false"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        foreach ($cabang as $value) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $no; ?></td>
                                                <td style="text-align: center;"><?php echo $value['CABANG']; ?></td>
                                                <td style="text-align: center;"><?php echo $wilayah[0]['WILAYAH']; ?></td> 
                                                <td style="text-align: center;">

                                                    <?php echo ($value['STATUS'] == 1)? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>':'<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                </td>
                                                <td class="oys">
                                                    <?php
                                                    if(!empty($value['FOTO'])){
                                                        ?>
                                                        <span data-toggle="tooltip" data-placement="bottom" title="Lihat Foto">
                                                        <button type="button" onclick="window.open('<?php echo base_url('watch').'/cabang?src='.$value['FOTO'].'&id='.$value['ID_CABANG'];?>')" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-image"></i></button>
                                                        </span>
                                                        <?php 
                                                    }
                                                    ?>
                                                    <span data-toggle="tooltip" data-placement="top" title="Ubah"> 
                                                        <button type="button" onclick="edit_cabang(<?php echo $value['ID_CABANG']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                    </span>


                                                    <span data-toggle="tooltip" data-placement="bottom" title="Detail Cabang"> 
                                                        <a type="button" href="<?php echo site_url('kas/grid_baru/'.$value['ID_CABANG']) ?>" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-search"></i></a>
                                                    </span>
                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_cabang(<?php echo $value['ID_CABANG']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                        <!-- <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab custom-fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>

                                                            <ul class="nav-sub">
                                                                <li> 
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_cabang(<?php echo $value['ID_CABANG']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_cabang(<?php echo $value['ID_CABANG']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                                    </span>
                                                                </li>                                                            
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

<div class="modal fade" id="modal_cabang" tabindex="-1" role="dialog" aria-labelledby="modal_cabang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Cabang.</h4>
                <p>Isilah data dibawah ini untuk menambahkan data cabang !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_cabang" method="post" action=""  enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">     
                <div class="form-group">
                    <label class="control-label lbl">Nama Cabang : </label>
                    <input id="cabang" type="text" name="cabang" placeholder="Masukan Nama Cabang" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Alamat : </label>
                    <input id="alamat" type="text" name="alamat" placeholder="Masukan Nama Kas" data-rule-required="true" data-rule-rangelength="[3,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Kecamatan : </label>
                    <input id="kecamatan" type="text" name="kecamatan" placeholder="Masukan Nama Kas" data-rule-required="true" data-rule-rangelength="[3,30]" class="form-control input" aria-required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label lbl">No Telp : </label>
                    <input id="no_telp" type="text" name="no_telp" placeholder="Masukan Nama Kas" data-rule-required="true" data-rule-rangelength="[5,30]" class="form-control input" aria-required="true" autocomplete="off">
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
                <div class="form-group hide" id="foto_cabang">
                    <label class="control-label lbl">Photo sekarang : </label><br>
                    <a href="javascript:;" target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" title="Lihat Photo"><i class="zmdi zmdi-search"></i> Lihat</a>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Nama Wilayah : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="wilayah" id="wilayah">
                        <option value="">Pilih Wilayah</option>
                        <?php                        
                        foreach ($wilayah as $value) {
                            ?>
                            <option value="<?php echo $value['ID_WILAYAH']; ?>"><?php echo $value['WILAYAH']; ?></option>
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
                <button type="submit" class="btn btn-default oke" id="btn_save_cabang">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<style type="text/css">
    .oys .bottom{top: 50px !important;}

    .oys .top{top: -20px !important;}

    .oys{text-align: center !important;}

    .oys span{margin: 0px 2px;}

    article, aside, figure, footer, header, hgroup, menu, nav, section { display: block; }

    .slider_gambar{margin-bottom: 20px;}

    .slider_gambar .fiks{
        position: relative;
        width: 100%;
        height: 270px;
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

  .radio{margin: 15px 0px;}
</style>

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
    function reset_form_cabang() {
        $('#modal_cabang #cabang').val('');
        $('#modal_cabang #alamat').val('');
        $('#modal_cabang #kecamatan').val('');
        $('#modal_cabang #no_telp').val('');
        $('#modal_cabang #wilayah').val('');
        $('#modal_cabang #wilayah').change();
        $('#modal_cabang #status').prop('checked', true);
        $('#btn_save_cabang').removeAttr('onclick');
    }

    function add_cabang() {
        $('#modal_cabang').modal('show');
        $('#modal_cabang .modal-header .modal-title').html('Tambah Data Cabang');
        $('#modal_cabang .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data cabang !');
        $('#btn_save_cabang').attr('onclick', 'simpan_cabang()');
        $('#btn_save_cabang').html('Tambah');

    }

    function edit_cabang(id_cabang) {
        $('#modal_cabang').modal('show');
        $('#modal_cabang .modal-header .modal-title').html('Ubah Data Cabang');
        $('#modal_cabang .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data cabang !');
        $('#btn_save_cabang').attr('onclick', 'simpan_cabang('+id_cabang+')');
        $('#btn_save_cabang').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("cabang/get"); ?>/"+id_cabang,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_cabang #cabang').val(obj.data.CABANG);
                    $('#modal_cabang #alamat').val(obj.data.ALAMAT);
                    $('#modal_cabang #kecamatan').val(obj.data.KECAMATAN);
                    $('#modal_cabang #no_telp').val(obj.data.NO_TELP);
                    $('#modal_cabang #wilayah').val(obj.data.ID_WILAYAH);
                    $('#modal_cabang #wilayah').change();
                    //alert(obj.data.FOTO);
                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }
                    if(!$.isEmptyObject(obj.data.FOTO)){
                        $('#modal_cabang #foto_cabang').removeClass('hide');
                        $('#modal_cabang #foto_cabang a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/cabang?src='+obj.data.FOTO+'&id='+obj.data.ID_CABANG);
                    }else{
                        $('#modal_cabang #foto_cabang').addClass('hide');
                        $('#modal_cabang #foto_cabang a').attr('href', 'javascript:;');
                    }
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_cabang(id_cabang = '') {
        var file = new FormData($("#form_cabang")[0]);
        var data = $("#form_cabang").serializeArray();
        // var data = $("#form_cabang").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("cabang/save"); ?>/"+id_cabang,
            data:file,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function() {
                $("#btn_save_cabang").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_cabang').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_cabang").removeAttr('disabled').attr('onclick', 'simpan_cabang('+id_cabang+')');
                if(id_cabang == ''){
                    $('#btn_save_cabang').html('Tambah');
                }else{
                    $('#btn_save_cabang').html('Simpan');
                }
            }

        });
    }

    function hapus_cabang(id_cabang = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("cabang/delete_cabang"); ?>/"+id_cabang,
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

    $('#modal_cabang').on('hidden.bs.modal', function () {
        reset_form_cabang();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>

<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="ubah">
  <div class="modal-dialog" role="document" style="width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel-2">Ubah Data Award</h4>
        <p>Isilah data dibawah ini untuk mengubah data award !</p>
        <ul class="card-actions icons right-top">
          <li>  
            <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
              <i class="zmdi zmdi-close"></i>
          </a>
      </li>
  </ul>
</div>
</div>
<form method="">
  <div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="slider_gambar">
                <div class="fiks"><img id="blah" src="#"/></div>
            </div>
            <div class="form-group is-empty">
                <div class="input-group" style="width: 100%;">
                  <input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="gambar_staff">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Upload Gambar">
                    <span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;">
                      <button type="button" class="btn btn-info btn-fab btn-fab-sm">
                        <i class="zmdi zmdi-attachment-alt"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">     
    <div class="form-group">
      <label class="control-label lbl">Nama Cabang : </label>
      <input id="nacab" type="text" name="nacab" placeholder="Masukan Nama Cabang" data-rule-required="true" class="form-control input" autocomplete="off">
  </div>
  <div class="form-group">
      <label class="control-label lbl">Alamat : </label>
      <input id="alamat" type="text" name="alamat" placeholder="Masukan Alamat" data-rule-required="true" class="form-control input" autocomplete="off">
  </div>
  <div class="form-group">
      <label class="control-label lbl">Kecamatan : </label>
      <input id="kecamatan" type="text" name="kecamatan" placeholder="Masukan Kecamatan" data-rule-required="true" class="form-control input" autocomplete="off">
  </div>
  <div class="form-group">
      <label class="control-label lbl">No Telp : </label>
      <input id="notelp" type="number" name="notelp" placeholder="Masukan Kecamatan" data-rule-required="true" class="form-control input" autocomplete="off">
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
                <input type="checkbox" class="toggle-primary" checked>
            </label>
        </div>
    </td>
</tr>
</table>
</div>
</div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-default oke">Simpan</button>
</div>
</form>
<!-- modal-content -->
</div>
<!-- modal-dialog -->
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah">
  <div class="modal-dialog" role="document" style="width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel-2">Tambah Data Award</h4>
        <p>Isilah data dibawah ini untuk menambah data award !</p>
        <ul class="card-actions icons right-top">
          <li>  
            <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
              <i class="zmdi zmdi-close"></i>
          </a>
      </li>
  </ul>
</div>
</div>
<form method="">
  <div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="slider_gambar">
                <div class="fiks"><img id="blah" src="#"/></div>
            </div>
            <div class="form-group is-empty">
                <div class="input-group" style="width: 100%;">
                  <input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="gambar_staff">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Upload Gambar">
                    <span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;">
                      <button type="button" class="btn btn-info btn-fab btn-fab-sm">
                        <i class="zmdi zmdi-attachment-alt"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">     
    <div class="form-group">
      <label class="control-label lbl">Nama Cabang : </label>
      <input id="nacab" type="text" name="nacab" placeholder="Masukan Nama Cabang" data-rule-required="true" class="form-control input" autocomplete="off">
  </div>
  <div class="form-group">
      <label class="control-label lbl">Alamat : </label>
      <input id="alamat" type="text" name="alamat" placeholder="Masukan Alamat" data-rule-required="true" class="form-control input" autocomplete="off">
  </div>
  <div class="form-group">
      <label class="control-label lbl">Kecamatan : </label>
      <input id="kecamatan" type="text" name="kecamatan" placeholder="Masukan Kecamatan" data-rule-required="true" class="form-control input" autocomplete="off">
  </div>
  <div class="form-group">
      <label class="control-label lbl">No Telp : </label>
      <input id="notelp" type="number" name="notelp" placeholder="Masukan Kecamatan" data-rule-required="true" class="form-control input" autocomplete="off">
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
                <input type="checkbox" class="toggle-primary" checked>
            </label>
        </div>
    </td>
</tr>
</table>
</div>
</div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-default oke">Tambah</button>
</div>
</form>
<!-- modal-content -->
</div>
<!-- modal-dialog -->
</div>