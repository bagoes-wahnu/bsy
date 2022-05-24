<script src="<?php echo base_url(); ?>assets/js/jquery.md5.js"></script>
<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Award</h1>
                            <p>Berikut ini adalah beberapa informasi data award terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url(); ?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Company Profile</a></li>
                                <li class="active">Award</li>
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
                                <a href="#" onclick="add_award()" class="btn btn-default oke">Tambah Data</a>
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
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah" style="padding: 12px 8px;">No.</th>
                                                <th class="col-xs-4" data-orderable="false" style="padding: 12px 8px;">Keterangan</th>
                                                <th class="col-xs-1 tengah" data-orderable="false" style="padding: 12px 8px;">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false" style="padding: 12px 8px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($award as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo $value['KETERANGAN']; ?></td>
                                                    <td style="text-align: center;">

                                                        <?php echo ($value['STATUS'] == 1) ? '<span class="aktif" style=\'color:green\'><i class=\'zmdi zmdi-check\' ></i> Aktif</span>' : '<span class="nonaktif" style=\'color:red\'><i class=\'zmdi zmdi-close\'></i> Tidak Aktif</span>'; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                        <!-- <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li>  -->
                                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah">
                                                            <button type="button" onclick="edit_award(<?php echo $value['ID_AWARD']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </span>
                                                        <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_award(<?php echo $value['ID_AWARD']; ?>)"><i class="zmdi zmdi-delete"></i></button>
                                                        <!-- </li>
                                                                    <li> -->

                                                        <!-- </li>                                                            
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

<style type="text/css">
    .oys {
        text-align: center !important;
    }

    article,
    aside,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block;
    }

    .slider_gambar {
        margin-bottom: 20px;
    }

    .slider_gambar .fiks {
        position: relative;
        width: 100%;
        height: 270px;
        overflow: hidden;
        background-color: #f5f5f5;
    }

    .slider_gambar .fiks img {
        position: absolute;
        top: -9999px;
        left: -9999px;
        right: -9999px;
        bottom: -9999px;
        margin: auto;
    }
</style>

<script type="text/javascript">
    $(document).ready(() => {
        $('#tgl_award').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD-MM-YYYY'
        });
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset_form_award() {
        $('#modal_award #keterangan').val('');


        $('#modal_award #status').prop('checked', true);
        $('#btn_save_award').removeAttr('onclick');
    }

    function add_award() {
        $('#modal_award').modal('show');
        $('#modal_award .modal-header .modal-title').html('Tambah Data Award');
        $('#modal_award .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data award !');
        $('#btn_save_award').attr('onclick', 'simpan_award()');
        $('#tgl_award').val('');
        $('#keterangan').val('');
        $('#btn_save_award').html('Tambah');

    }

    function edit_award(id_award) {
        $('#modal_award').modal('show');
        $('#modal_award .modal-header .modal-title').html('Ubah Data Award');
        $('#modal_award .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data award !');
        $('#btn_save_award').attr('onclick', 'simpan_award(' + id_award + ')');
        $('#btn_save_award').html('Simpan');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("award/get"); ?>/" + id_award,
            success: function(msg) {
                var obj = jQuery.parseJSON(msg);
                if (obj.status == 'OK') {
                    $('#modal_award #keterangan').val(obj.data.KETERANGAN);
                    $('#modal_award #tgl_award').val(formatDate(obj.data.TGL_AWARD));

                    if (obj.data['STATUS'] == 1) {
                        $('#status').prop('checked', true);
                    } else {
                        $('#status').prop('checked', false);
                    }
                    var folder = $.md5(obj.data.ID_AWARD);
                    var edit_save = document.getElementById("blah");
                    edit_save.src = "  <?php echo base_url(); ?>" + "ffdwjws/award/" + folder + "/" + obj.data.FILE;


                } else {
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_award(id_award = '') {
        var file = new FormData($("#form_award")[0]);
        var data = $("#form_award").serializeArray();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("award/save"); ?>/" + id_award,
            data: file,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#btn_save_award").attr('disabled', '').removeAttr('onclick').html('Saving...');
                preventLeaving();
            },
            success: function(msg) {
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if (obj.status != "OK") {
                    swal("Peringatan!", obj.msg, "warning");
                } else {
                    $('#modal_award').modal('hide');
                    alertify.success(obj.msg);
                    window.setTimeout(function() {
                        location.reload();
                    }, 800);
                }
            },
            complete: function() {
                $("#btn_save_award").removeAttr('disabled').attr('onclick', 'simpan_award(' + id_award + ')');
                if (id_award == '') {
                    $('#btn_save_award').html('Tambah');
                } else {
                    $('#btn_save_award').html('Simpan');
                }
            }

        });
    }

    function hapus_award(id_award = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if (c == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("award/delete_award"); ?>/" + id_award,
                beforeSend: function() {
                    preventLeaving();
                },
                success: function(msg) {
                    window.onbeforeunload = false;
                    var obj = jQuery.parseJSON(msg);
                    if (obj.status != "OK") {
                        swal("Peringatan!", obj.msg, "warning");
                    } else {
                        alertify.success(obj.msg);
                        setTimeout
                        window.setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                }
            });
        } else {
            alertify.error('Proses berhasil dibatalkan');
        }
    }

    $('#modal_award').on('hidden.bs.modal', function() {
        reset_form_award();
    });

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }

    function formatDate(date) {
        var today = new Date(date);
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '-' + mm + '-' + yyyy;
        return today;
    }
</script>

<div class="modal fade" id="modal_award" tabindex="-1" role="dialog" aria-labelledby="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Tambah Data Award</h4>
                <p>Isilah data dibawah ini untuk menambahkan data award !</p>
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_award" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <div class="modal-body">
                <div class="slider_gambar">
                    <div class="fiks"><img id="blah" src="#" /></div>
                </div>
                <div class="form-group is-empty">
                    <div class="input-group" style="width: 100%;">
                        <input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="file">
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
                <div class="form-group">
                    <label class="control-label lbl">Keterangan : </label>
                    <input id="keterangan" type="text" name="keterangan" placeholder="Masukan Keterangan Penghargaan" data-rule-required="true" class="form-control input" autocomplete="off">
                </div>
                <h2 class="card-title">Tanggal Award</h2>
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" data-toggle-view="code">
                            <i class="zmdi zmdi-code"></i>
                        </a>
                    </li>
                </ul>
                </h2>
                <div class="card-body">
                    <div class="form-group is-empty">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" id="tgl_award" name="tgl_award" type="date" placeholder="Tanggal Award">
                        </div>
                    </div>
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
                <button type="submit" id="btn_save_award" class="btn btn-default oke">Tambah</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>