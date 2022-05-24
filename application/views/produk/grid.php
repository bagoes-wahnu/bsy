<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Produk</h1>
                            <p>Berikut ini adalah beberapa informasi data produk terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li class="active">Produk</li>
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
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Nama Produk</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
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
                                                    <td style="text-align: center;"><?php echo $value['NAMA_PRODUK']; ?></td>
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
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_poduk(<?php echo $value['ID_PRODUK']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="top" title="Sub Produk">
                                                                        <a href="<?php echo site_url('produk/sub_produk/'.$value['ID_PRODUK']);?>">
                                                                            <button type="button" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-format-list-numbered"></i></button>
                                                                        </a>
                                                                    </span>
                                                                </li> 
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_produk(<?php echo $value['ID_PRODUK']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
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
                <h4 class="modal-title" id="myModalLabel-2">Modal Data Produk</h4>
                <p>Isilah data dibawah ini untuk menambahkan data produk !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_linkage" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label lbl">Nama Produk : </label>
                    <input id="nama_produk" type="text" name="nama_produk" placeholder="Masukan Nama Produk" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control" aria-required="true" autocomplete="off">
                </div>    
                <div class="form-group">
                    <label class="control-label lbl">Upload Suku Bunga : </label>
                    <div class="form-group is-empty">
                        <div class="input-group" style="width: 100%;">
                            <input type="file" onchange="readURL(this);" class="form-control" accept=".jpg,.jpeg,.png" placeholder="Upload Gambar" name="bunga">
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
                <div class="form-group" id="suku_bunga-produk">
                    <a href="javascript:;" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Suku Bunga" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-image"></i></a>
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

<script type="text/javascript">
    var datatable;
    $(document).ready(function(){
        // initDataTable();

        if(typeof datatable !== 'undefined'){
            datatable.on('draw.dt', function () {
                // console.log('rendered');
                custom_fab('.fab-menu');
            });
        }

        $('input').on("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                $("#btn_save_linkage").click();
            }
        });
    });

    function initDataTable(){
        console.log('data');
        $('.card-data-tables table tbody .checkbox-cell .checkbox input[type=checkbox]').each(function (i) {
            $(this).attr('id', "CheckboxId_" + (i + 1));
        });

        datatable = $("#productsTable").DataTable({
            "bDestroy": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": baseUrl+"produk/json",
                "type": "POST",

            },
            "sPaginationType": "full_numbers",
            "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "aoColumns": [
            { "mData": "ID_PRODUK" },
            { "mData": "NAMA_PRODUK" },
            { "mData": "STATUS" },
            { "mData": "ID_PRODUK" }
            ],
            "aaSorting": [[1, 'asc']],
            "lengthMenu": [ 10, 25, 50, 75, 100 ],
            "pageLength": 10,
            "aoColumnDefs": [
            {
                "aTargets": [0],
                "mData":"ID_PRODUK",
                "mRender": function (data, type, full, draw) {
                    var row = draw.row;
                    var start = draw.settings._iDisplayStart;
                    var length = draw.settings._iDisplayLength;

                    var counter = (start  + 1 + row);

                    return counter;
                }
            },
            {
                "aTargets": [2],
                "mData":"STATUS",
                "mRender": function (data, type, full, draw) {
                    var status = '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>';

                    if(full.STATUS != 1){
                        status = '<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>';
                    }

                    return status;
                }
            },
            {
                "aTargets": [3],
                "mData":"ID_PRODUK",
                "mRender": function (data, type, full) {
                    var btn = '\
                    <nav class="btn-fab-group" id="fab-'+full.ID_PRODUK+'" style="display: -webkit-inline-box;">\
                    <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">\
                    <i class="zmdi zmdi-plus"></i>\
                    </button>\
                    <ul class="nav-sub">\
                    <li> \
                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_poduk('+full.ID_PRODUK+')"><i class="zmdi zmdi-delete"></i></button>\
                    </li>\
                    <li>\
                    <span data-toggle="tooltip" data-placement="top" title="Sub Produk">\
                    <a href="'+siteUrl+'/produk/sub_produk/'+full.ID_PRODUK+'">\
                    <button type="button" class="btn btn-success btn-fab btn-fab-sm"><i class="zmdi zmdi-format-list-numbered"></i></button>\
                    </a>\
                    </span>\
                    </li> \
                    <li>\
                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> \
                    <button type="button" onclick="edit_produk('+full.ID_PRODUK+')" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>\
                    </span>\
                    </li>\
                    </ul>\
                    </nav>';

                    return btn;
                }
            }
            ],
            "fnHeaderCallback": function( nHead, aData, iStart, iEnd, aiDisplay ) {
                $(nHead).children('th').addClass('text-center');
            },
            "fnFooterCallback": function( nFoot, aData, iStart, iEnd, aiDisplay ) {
                $(nFoot).children('th').addClass('text-center');
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                $(nRow).children('td:nth-child(1),td:nth-child(2),td:nth-child(3),td:nth-child(4),td:nth-child(5)').addClass('text-center');
                // custom_fab('#fab-'+aData.ID_PRODUK);
                /* console.log(aData); */
                /* var data = aData['ca']; */
            }
        });

        $('.filter-input').keyup(function () {
            datatable.search($(this).val()).draw();
        });
        var $lengthSelect = $(".card.card-data-tables select.form-control.input-sm");
        var tableLength = $lengthSelect.detach();
        $('#dataTablesLength').append(tableLength);
        $(".card.card-data-tables .card-actions select.form-control.input-sm").dropdown({
            "optionClass": "withripple"
        });
        $('#dataTablesLength .dropdownjs .fakeinput').hide();
        $('#dataTablesLength .dropdownjs .dropdown-menu').hide();
        $('#dataTablesLength .dropdownjs ul').addClass('dropdown-menu dropdown-menu-right asem');

        /* Mengecek Apakah ada class yang memiliki sub "#productsTable_wrapper .row .col-sm-6" */ 
        $("#productsTable_wrapper .row .col-sm-6").each(function(i){
            /* Jika ada maka ditambahkan class ukuran dengan nilai berbeda "i" */   
            $(this).addClass("ukuran"+i);
        });

    }

    function custom_fab(selector) {
            console.log(selector);
        $(selector).on('click', function (e) {
            console.log('b');
            e.stopPropagation();
            var $this = $(this),
            $menuGroup = $this.parent(),
            $subMenu = $this.next().children(),
            fabDir = '';
            if ($this.data("fab") == 'right') {
                fabDir = 'translateX(';
            } else if ($this.data("fab") == 'left') {
                fabDir = 'translateX(-';
            } else if ($this.data("fab") == 'up') {
                fabDir = 'translateY(-';
            } else {
                /* fallback is down */
                fabDir = 'translateY(';
            };
            $this.parent().toggleClass('open');
            if ($menuGroup.hasClass('open')) {
                (function () {
                    var num = 0;
                    $subMenu.each(function (index, value) {
                        num += 48;
                        $(this).css({ 'transform': '' + fabDir + num + 'px)' });
                    });
                })();
            } else {
                $(this).removeAttr('style');
            }
        });
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
        $('#modal_linkage #nama_produk').val('');
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

    function edit_produk(id_produk) {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Ubah Data Produk');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data produk !');
        $('#btn_save_linkage').attr('onclick', 'simpan_produk('+id_produk+')');
        $('#btn_save_linkage').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("produk/get"); ?>/"+id_produk,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_linkage #nama_produk').val(obj.data.NAMA_PRODUK);

                    if(!$.isEmptyObject(obj.data.FILE_SUKU_BUNGA)){
                        $('#modal_linkage #suku_bunga-produk').removeClass('hide');
                        $('#modal_linkage #suku_bunga-produk a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/suku_bunga?src='+obj.data.FILE_SUKU_BUNGA+'&id='+obj.data.ID_PRODUK);
                    }else{
                        $('#modal_linkage #suku_bunga-produk').addClass('hide');
                        $('#modal_linkage #suku_bunga-produk a').attr('href', 'javascript:;');
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

    function simpan_produk(id_produk = '') {
        var file = new FormData($("#form_linkage")[0]);
        var data = $("#form_linkage").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("produk/save"); ?>/"+id_produk,
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
                $("#btn_save_linkage").removeAttr('disabled').attr('onclick', 'simpan_produk('+id_produk+')');
                if(id_produk == ''){
                    $('#btn_save_linkage').html('Tambah');
                }else{
                    $('#btn_save_linkage').html('Simpan');
                }
            }

        });
    }

    function hapus_poduk(id_produk = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("produk/delete_produk"); ?>/"+id_produk,
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

    $('#modal_linkage').on('hidden.bs.modal', function () {
        reset_form_linkage();
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