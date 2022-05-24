<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Informasi Data Kantor</h1>
                            <p>Berikut ini adalah beberapa informasi data kantor terkait aplikaasi.</p>
                            <!-- <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li class="active">Master Kantor</li>
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
                                <button onclick="add_kantor()" class="btn btn-default oke">Tambah Data</button>
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
                                                <th class="col-xs-1 tengah">Group</th>
                                                <th class="col-xs-1 tengah">Kode</th>
                                                <th class="col-xs-1 tengah">Nama Kantor</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($kantor as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['GROUP']; ?></td> 
                                                    <td style="text-align: center;"><?php echo $value['BRANCH']; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['KETERANGAN']; ?></td>
                                                    <td style="text-align: center;">
                                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                            <button type="button" onclick="edit_kantor('<?php echo $value['GROUP'];?>', '<?php echo $value['BRANCH']; ?>')" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </span>
                                                        <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_kantor('<?php echo $value['GROUP'];?>', '<?php echo $value['BRANCH']; ?>')"><i class="zmdi zmdi-delete"></i></button>
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

<div class="modal fade" id="modal_kantor" tabindex="-1" role="dialog" aria-labelledby="modal_kantor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Kantor.</h4>
                <p>Isilah data dibawah ini untuk menambahkan data kantor !</p>
                <ul class="card-actions icons right-top">
                    <li>  
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_kantor" method="post" action="" onsubmit="return false;">
            <div class="modal-body">     
               <div class="form-group">
                <label class="control-label lbl">Group : </label>
                <select class="select form-control input" style="margin-top: 7px;" name="group" id="group">
                    <option value="">Pilih Group </option>
                    <option value="A">A </option>
                    <option value="B">B </option>
                    <option value="C">C </option>
                    <option value="D">D </option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label lbl">Kode : </label>
                <input id="cabang" type="text" name="cabang" placeholder="Masukan kode" data-rule-required="true" data-rule-rangelength="[3,30]" class="form-control input" aria-required="true" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="control-label lbl">Nama Kantor : </label>
                <input id="kantor" type="text" name="kantor" placeholder="Masukan nama kantor" data-rule-required="true" data-rule-rangelength="[3,50]" class="form-control input" aria-required="true" autocomplete="off">
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-default oke" id="btn_save_kantor">Tambah</button>
        </div>
    </form>
    <!-- modal-content -->
</div>
<!-- modal-dialog -->
</div>
<script src="<?php echo base_url('assets/js/custom.js'); ?>" ></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#cabang').keydown(function (e) {
            /* Allow: backspace, delete, tab, escape, enter */         /* Allow: Ctrl+A, Command+A */                                      /* Allow: home, end, left, right, down, up */
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 || (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 40)) {
                /* let it happen, don't do anything */
                return;
            }
            /* Ensure that it is a number and stop the keypress */
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 65 || e.keyCode > 90) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });

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
    function reset_form_kantor() {
        $('#modal_kantor #group').val('');
        $('#modal_kantor #group').change();
        // $('#modal_kantor #group').prop('readonly', false);
        $('#modal_kantor #cabang').val('');
        // $('#modal_kantor #cabang').prop('readonly', false);
        $('#modal_kantor #kantor').val('');
    }

    function add_kantor() {
        $('#modal_kantor').modal('show');
        $('#modal_kantor .modal-header .modal-title').html('Tambah Data Kantor');
        $('#modal_kantor .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data kantor !');
        $('#btn_save_kantor').attr('onclick', 'simpan_kantor()');
        $('#btn_save_kantor').html('Tambah');

    }

    function edit_kantor(group, branch) {
        $('#modal_kantor').modal('show');
        $('#modal_kantor .modal-header .modal-title').html('Ubah Data Kantor');
        $('#modal_kantor .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data kantor !');
        $('#btn_save_kantor').attr('onclick', 'simpan_kantor(\''+group+'\', \''+branch+'\')');
        $('#btn_save_kantor').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kantor/get"); ?>/"+group+"/"+branch,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_kantor #group').val(obj.data.GROUP);
                    $('#modal_kantor #group').change();
                    // $('#modal_kantor #group').prop('readonly', true);
                    $('#modal_kantor #cabang').val(obj.data.BRANCH);
                    // $('#modal_kantor #cabang').prop('readonly', true);
                    $('#modal_kantor #kantor').val(obj.data.KETERANGAN);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_kantor(group = '', branch='') {
        var file = new FormData($("#form_kantor")[0]);
        var data = $("#form_kantor").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("kantor/save"); ?>/"+group+"/"+branch,
            data:data,
            // contentType: false,
            // cache: false,
            // processData:false,
            beforeSend:function() {
                $("#btn_save_kantor").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status != "OK"){
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_kantor').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            },
            complete:function() {
                $("#btn_save_kantor").removeAttr('disabled').attr('onclick', 'simpan_kantor(\''+group+'\', \''+branch+'\')');
                if(group == '' && branch == ''){
                    $('#btn_save_kantor').html('Tambah');
                }else{
                    $('#btn_save_kantor').html('Simpan');
                }
            }

        });
    }

    function hapus_kantor(group = '', branch='') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("kantor/delete_kantor"); ?>/"+group+"/"+branch,
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

    $('#modal_kantor').on('hidden.bs.modal', function () {
        reset_form_kantor();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>