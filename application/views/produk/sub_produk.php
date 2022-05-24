<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Sub Produk</h1>
                            <p>Berikut ini adalah beberapa informasi data sub produk terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="<?php echo site_url('produk');?>">Produk</a></li>
                                <li class="active">Sub Produk</li>
                            </ol>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="container-fluid">
            <div id="loading_content" class="cssload-loader cssload-blue hide" style="top: 350px !important;z-index: 1001;">loading</div>
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-data-tables product-table-wrapper">
                            <header class="card-heading">
                                <button type="button" onclick="add_produk()" class="btn btn-default oke">Tambah Data</button>      
                                <!-- <button data-toggle="modal" data-target="#tambah" class="btn btn-default oke">Tambah Data</button>      -->
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
                                                <th class="tengah">No.</th>
                                                <th class="tengah">Nama Sub Produk</th>
                                                <th class="tengah">Urutan</th>
                                                <th class="tengah" data-orderable="false">Status</th>
                                                <th class="tengah" data-orderable="false">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($res as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['NAMA_SUB']; ?></td>
                                                    <td style="text-align: center;">
                                                        <div class="items">
                                                        <a href="<?php echo site_url("produk/urutan_sub_produk/up/".$value['ID_SUB_PRODUK']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-up"><i class="zmdi zmdi-chevron-up"></i></a>
                                                        <a href="<?php echo site_url("produk/urutan_sub_produk/down/".$value['ID_SUB_PRODUK']); ?>" onclick="return confirm('apakah Anda yakin ?')" class="move-down"><i class="zmdi zmdi-chevron-down"></i></a>
                                                        <?php echo empty($value['URUTAN'])? '-' : $value['URUTAN']; ?>
                                                        </div>
                                                        
                                                    </td>
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
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_poduk(<?php echo $value['ID_SUB_PRODUK']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_produk(<?php echo $value['ID_SUB_PRODUK']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                                    </span>
                                                                </li>
                                                                <?php
                                                                if(!empty($value['IKON'])){
                                                                    ?>
                                                                    <li> 
                                                                        <a href="<?php echo base_url('watch').'/ikon?src='.$value['IKON'].'&id='.$value['ID_PRODUK'];?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Ikon" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-image"></i></a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Lihat Detail"> 
                                                                        <button type="button" onclick="detail_produk(<?php echo $value['ID_SUB_PRODUK']; ?>)" class="btn btn-primary btn-fab btn-fab-sm"><i class="zmdi zmdi-search"></i></button>
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

<!-- start: modal linkage -->
<div class="modal fade" id="modal_linkage" tabindex="-1" role="dialog" aria-labelledby="modal_linkage">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal Sub Produk</h4>
                <p>Isilah data dibawah ini untuk menambahkan data sub produk !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="loading_modal" class="cssload-loader cssload-blue hide" style="top: 350px !important;z-index: 1001;">loading</div>
        </div>
        <form id="form_linkage" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">
                <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                <div class="form-group">
                    <label class="control-label lbl">Nama Sub Produk : </label>
                    <input id="nama_sub_produk" type="text" name="nama_sub_produk" placeholder="Masukan Nama Sub Produk" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
                </div>  
                <br>
                <div class="form-group">
                    <label class="control-label lbl">Deskripsi : </label>
                    <textarea class="hide" id="suku_bunga" name="suku_bunga"></textarea>
                    <textarea class="form-group" id="suku_bunga1" name="suku_bunga1"></textarea>
                    <!-- <table>
                        <tr>
                            <td >
                                <input id="suku_bunga" type="text" name="suku_bunga" placeholder="Masukan Deskripsi" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off" >
                            </td>
                            <td><strong>%</strong></td>
                        </tr>
                    </table> -->
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label lbl">Ketentuan : </label>
                    <textarea id="ketentuan" name="ketentuan" class="hide"></textarea>
                    <textarea id="ketentuan1" name="ketentuan1" class="form-group"></textarea>
                </div>
                <script type="text/javascript">
                    CKEDITOR.replace( 'suku_bunga1' );
                    CKEDITOR.replace( 'ketentuan1' );
                </script>
                <div class="form-group">
                    <label class="control-label lbl">Upload Ikon Produk : </label>
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
                <div class="form-group hide" id="ikon-produk">
                    <label class="control-label lbl">Ikon produk sekarang : </label><br>
                    <a href="javascript:;" target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" title="Lihat Ikon"><i class="zmdi zmdi-search"></i> Lihat</a>
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
                <button type="button" class="btn btn-default oke" id="btn_save_linkage">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal linkage -->

<!-- start: modal detail_sub_produk -->
<div class="modal fade" id="modal_detail_sub_produk" tabindex="-1" role="dialog" aria-labelledby="modal_detail_sub_produk">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Modal detail Sub Produk</h4>
                <p>Form dibawah ini merupakan data detail sub produk !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal-body">
            <table class="table table-border table-hover table-striped" id="table-detail-sub-produk">
                <tr>
                    <th>Nama Sub Produk</th>
                    <td>:</td>
                    <td id=td-nama-sub-produk></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>:</td>
                    <td id="td-deskripsi"></td>
                </tr>
                <tr>
                    <th>Ketentuan</th>
                    <td>:</td>
                    <td id="td-ketentuan"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end: modal detail_sub_produk -->

<script type="text/javascript">

    $(function() {
        $(function() {
          $('#suku_bunga').on('input', function() {
            this.value = this.value
              .replace(/[^\d.]/g, '')             // numbers and decimals only
              .replace(/(^[\d]{2})[\d]/g, '$1')   // not more than 2 digits at the beginning
              .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
              .replace(/(\.[\d]{4})./g, '$1');    // not more than 4 digits after decimal
          });
      });
    });


    $(document).ready(function(){
        // initDataTable();
    });
    function initDataTable() {
        // var table = jQuery("#productsTable");

        $("#productsTable").DataTable({
            aLengthMenu: [[10, 25, 50,100], [10, 25, 50,100]],
            bStateSave: false,
            bServerSide : true,
            bProcessing : true,
            responsive : true,
            ajax: {
                "url": "<?php echo base_url("Produk/json_sub"); ?>",
                "type": "POST"      
            },
            columns: [
            {data : 'NOMER'},
            {data : 'NAMA_SUB',defaultContent:'-'},
            {data : 'STATUS'},
            { 
                mRender: function (data, type, rowIndex) {

                    function base_url(url=''){
                        return "<?php echo base_url() ?>"+url;
                    }

                    return '';
                }
            }
            ],
            columnDefs: [ {
                "targets": 7,
                "orderable": false
            } ],
            // order: [[ 0, 'asc' ]],
            bSortable: true,
            searching: true,
            pageLength: 10,

            "fnHeaderCallback": function( nHead, aData, iStart, iEnd, aiDisplay ) {
                $(nHead).children('th').addClass('text-center');
            },
            "fnFooterCallback": function( nFoot, aData, iStart, iEnd, aiDisplay ) {
                $(nFoot).children('th').addClass('text-center');
            },
        });

        // table.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        //     minimumResultsForSearch: -1
        // });
    }


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

    function reset_form_linkage() {
        $('#modal_linkage #nama_sub_produk').val('');
        $('#modal_linkage #suku_bunga').val('');
        $('#modal_linkage #ketentuan').val('');
        CKEDITOR.instances.suku_bunga1.setData('');
        CKEDITOR.instances.ketentuan1.setData('');
        $('#modal_linkage #status').prop('checked', true);
        $('#btn_save_linkage').removeAttr('onclick');
    }

    function add_produk() {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Tambah Data Produk');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data produk !');
        $('#btn_save_linkage').attr('onclick', 'simpan_produk()');
        $('#btn_save_linkage').html('Tambah');

    }

    function edit_produk(id_sub_produk) {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Ubah Data Sub Produk');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data sub produk !');
        $('#btn_save_linkage').attr('onclick', 'simpan_produk('+id_sub_produk+')');
        $('#btn_save_linkage').html('Simpan');
        $('#loading_modal').removeClass('hide');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("produk/get_sub"); ?>/"+id_sub_produk,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                $('#loading_modal').addClass('hide');
                if(obj.status == 'OK') {
                    $('#modal_linkage #nama_sub_produk').val(obj.data.NAMA_SUB);
                    CKEDITOR.instances.suku_bunga1.setData(obj.data.SUKU_BUNGA);
                    CKEDITOR.instances.ketentuan1.setData(obj.data.KETENTUAN);
                    // $('#modal_linkage #suku_bunga').val(obj.data.SUKU_BUNGA);
                    // $('#modal_linkage #ketentuan').val(obj.data.KETENTUAN);

                    if(!$.isEmptyObject(obj.data.IKON)){
                        $('#modal_linkage #ikon-produk').removeClass('hide');
                        $('#modal_linkage #ikon-produk a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/ikon?src='+obj.data.IKON+'&id='+obj.data.ID_PRODUK);
                    }else{
                        $('#modal_linkage #ikon-produk').addClass('hide');
                        $('#modal_linkage #ikon-produk a').attr('href', 'javascript:;');
                    }

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

    function detail_produk(id_sub_produk) {
        $('#modal_detail_sub_produk').modal('show');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("produk/get_sub"); ?>/"+id_sub_produk,
            beforeSend:function() {
                $('#td-nama-sub-produk').html('Loading...');
                $('#td-deskripsi').html('Loading...');
                $('#td-ketentuan').html('Loading...');
            },
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#td-nama-sub-produk').html(obj.data.NAMA_SUB);
                    $('#td-deskripsi').html(obj.data.SUKU_BUNGA);
                    $('#td-ketentuan').html(obj.data.KETENTUAN);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_produk(id_sub_produk = '') {
        $("#suku_bunga").val(CKEDITOR.instances.suku_bunga1.getData());
        $("#ketentuan").val(CKEDITOR.instances.ketentuan1.getData());
        var file = new FormData($("#form_linkage")[0]);
        var data = $("#form_linkage").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("produk/save_sub_produk"); ?>/"+id_sub_produk,
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
                    $('#modal_linkage').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_linkage").removeAttr('disabled').attr('onclick', 'simpan_produk('+id_sub_produk+')');
                if(id_sub_produk == ''){
                    $('#btn_save_linkage').html('Tambah');
                }else{
                    $('#btn_save_linkage').html('Simpan');
                }
            }

        });
    }

    function hapus_poduk(id_sub_produk = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("produk/delete_sub_produk"); ?>/"+id_sub_produk,
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

    $('#modal_linkage').on('hidden.bs.modal', function () {
        reset_form_linkage();
    });

    $('#modal_detail_sub_produk').on('hidden.bs.modal', function () {
        $('#td-nama-sub-produk').html('-');
        $('#td-deskripsi').html('-');
        $('#td-ketentuan').html('-');
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }

    $("#productsTable").on("click", ".fab-menu", function (e) {
        e.stopPropagation();
        var $this = $(this),
            $menuGroup = $this.parent(),
            $subMenu = $this.next().children(),
            fabDir = "";
        if ($this.data("fab") == "right") {
            fabDir = "translateX(";
        } else if ($this.data("fab") == "left") {
            fabDir = "translateX(-";
        } else if ($this.data("fab") == "up") {
            fabDir = "translateY(-";
        } else {
            //fallback is down
            fabDir = "translateY(";
        }
        $this.parent().toggleClass("open");
        if ($menuGroup.hasClass("open")) {
            (function () {
            var num = 0;
            $subMenu.each(function (index, value) {
                num += 48;
                $(this).css({ transform: "" + fabDir + num + "px)" });
            });
            })();
        } else {
            $(this).removeAttr("style");
        }
        });

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

    .items div{
        background-color: #f5f5f5;
        padding: 10px 0px;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    .items a{
        padding: 10px 8px 10px 8px;
        background-color: #ecf0f1;
        color: #34495e;
    }
</style>