 
<script src="<?php echo base_url();?>assets/js/jquery.masknumber.js"></script>
<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Detail Linkage Profile</h1>
                            <p>Isilah form dibawah ini untuk menambahkan data detail linkage profile.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                <li><a href="javascript:void(0)">Company Profile</a></li>
                                <li><a href="<?php echo site_url();?>linkage/grid">Linkage Profile</a></li>
                                <li class="active">Detail Linkage Profile</li>
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
                                <button type="button" onclick="add_linkage()" class="btn btn-default oke">Tambah Data</button>      
                                <!-- <button data-toggle="modal" data-target="#tambah" class="btn btn-default oke">Tambah Data</button>		 -->
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
                                                    <th class="col-xs-1" data-orderable="false">Pencarian</th>
                                                    <th class="col-xs-1" data-orderable="false">Jatuh Tempo</th>
                                                    <th class="col-xs-1" data-orderable="false">Plafond Bank</th>
                                                    <th class="col-xs-1" data-orderable="false">Baki Debet</th>
                                                    <th class="col-xs-1" data-orderable="false">Kelonggaran Tarik</th>
                                                    <th class="col-xs-1" data-orderable="false">Bunga</th>
                                                    <th class="col-xs-1" data-orderable="false"></th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($linkage as $value) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td style="text-align: center;"><?php echo date_format(date_create($value['TGL_PENCARIAN']),"d M Y"); ?></td>
                                                    <td style="text-align: center;"><?php echo date_format(date_create($value['JATUH_TEMPO']),"d M Y"); ?></td>
                                                    <td style="text-align: center;"><?php echo format_rupiah($value['PLATFOND_BANK']); ?></td>
                                                    <td style="text-align: center;"><?php echo format_rupiah($value['BAKI_DEBIT']); ?></td>
                                                    <td style="text-align: center;"><?php echo format_rupiah($value['KELONGGARAN_TARIK']); ?></td>
                                                    <td style="text-align: center;"><?php echo $value['BUNGA']; ?> %</td>
                                                    <td style="text-align: center;">
                                                        <!-- <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                                            <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                                                <i class="zmdi zmdi-plus"></i>
                                                            </button>
                                                            <ul class="nav-sub">
                                                                <li>  -->
                                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                                        <button type="button" onclick="edit_linkage(<?php echo $value['ID_DETAIL_LINKAGE']; ?>)" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                                    </span>
                                                                <!-- </li>
                                                                <li> -->
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm" onclick="hapus_linkage(<?php echo $value['ID_DETAIL_LINKAGE']; ?>)"><i class="zmdi zmdi-delete"></i></button>
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

<!-- start: modal linkage -->
<div class="modal fade" id="modal_linkage" tabindex="-1" role="dialog" aria-labelledby="modal_linkage">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Detail Linkage.</h4>
                <p>Isilah data dibawah ini untuk menambahkan data linkage !</p>
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
            <label class="control-label lbl">Tanggal Pencarian : </label>
            <input type="text" readonly="readonly"  class="form-control datepicker input" id="tgl_pencarian" name="tgl_pencarian"  placeholder="Masukan Tanggal Pencarian">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Jatuh Tempo : </label>
            <input type="text" readonly="readonly"  class="form-control datepicker input" id="jatuh_tempo" name="jatuh_tempo"  placeholder="Masukan Tanggal Jatuh Tempo">
        </div>
        
        <div class="form-group">
            <label class="control-label lbl">Plafond Bank Wilayah : </label>
            <input id="plaf_nilai" type="text" name="plaf_nilai" min="0"  placeholder="Masukan Nilai Plafond Bank" data-rule-required="true" class="form-control  input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Baki Debet : </label>
            <input id="baki_debet" type="text" name="baki_debet" min="0"  placeholder="Masukan Nilai Baki Debet" data-rule-required="true" class="form-control  input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Kelonggaran Tarik Debet : </label>
            <input id="kelong_tarik" type="text" name="kelong_tarik" min="0"  placeholder="Masukan Nilai Kelonggaran Tarik" data-rule-required="true" class="form-control  input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Bunga (%) : </label>
            <input id="bunga" type="text" name="bunga" placeholder="Masukan Nilai Bunga" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
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

    function reset_form_linkage() {
        $('#modal_linkage #tgl_pencarian').val('');
        $('#modal_linkage #jatuh_tempo').val('');
        $('#modal_linkage #plaf_nilai').val('');
        $('#modal_linkage #baki_debet').val('');
        $('#modal_linkage #kelong_tarik').val('');
        $('#modal_linkage #bunga').val('');
        
      
        $('#btn_save_linkage').removeAttr('onclick');
    }

    function add_linkage() {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Tambah Data Linkage');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data linkage !');
        $('#btn_save_linkage').attr('onclick', 'simpan_linkage()');
        $('#btn_save_linkage').html('Tambah');

    }

    function edit_linkage(id_linkage) {
        $('#modal_linkage').modal('show');
        $('#modal_linkage .modal-header .modal-title').html('Ubah Data Linkage');
        $('#modal_linkage .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk mengubah data linkage !');
        $('#btn_save_linkage').attr('onclick', 'simpan_linkage('+id_linkage+')');
        $('#btn_save_linkage').html('Simpan');
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("detail_linkage/get"); ?>/"+id_linkage,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_linkage #tgl_pencarian').val(obj.data.TGL_PENCARIAN);
                    $('#modal_linkage #jatuh_tempo').val(obj.data.JATUH_TEMPO);
                    var platfond = obj.data.PLATFOND_BANK;
                    var baki_debet = obj.data.BAKI_DEBIT;
                    $('#modal_linkage #plaf_nilai').val(platfond.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
                    $('#modal_linkage #baki_debet').val(baki_debet.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
                    $('#modal_linkage #kelong_tarik').val(obj.data.KELONGGARAN_TARIK);
                    $('#modal_linkage #bunga').val(obj.data.BUNGA);
                   

                   

                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            }
        });
    }

    function simpan_linkage(id_linkage = '') {
        var file = new FormData($("#form_linkage")[0]);
        var data = $("#form_linkage").serializeArray();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("detail_linkage/save/".$id); ?>/"+id_linkage,
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
                $("#btn_save_linkage").removeAttr('disabled').attr('onclick', 'simpan_linkage('+id_linkage+')');
                if(id_linkage == ''){
                    $('#btn_save_linkage').html('Tambah');
                }else{
                    $('#btn_save_linkage').html('Simpan');
                }
            }

        });
    }

    function hapus_linkage(id_linkage = '') {
        var c = confirm('Apakah Anda yakin akan menghapus data ini?');

        if(c == true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url("detail_linkage/delete_linkage"); ?>/"+id_linkage,
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

    var disable = false, picker = new Pikaday({
        field: document.getElementById('tgl_pencarian'),
        firstDay: 1,
        format: 'DD-MM-YYYY',
        minDate: new Date(1945, 0, 1),
        maxDate: new Date(2045, 12, 31),
        yearRange: [1945,2045],
        
        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });

     var disable = false, picker = new Pikaday({
        field: document.getElementById('jatuh_tempo'),
        firstDay: 1,
        format: 'DD-MM-YYYY',
        minDate: new Date(1945, 0, 1),
        maxDate: new Date(2045, 12, 31),
        yearRange: [1945,2045],
        
        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });



      $(document).ready(function () {

            $('[name=plaf_nilai]').maskNumber({integer: true,thousands: '.'});
            $('[name=baki_debet]').maskNumber({integer: true,thousands: '.'});
            $('[name=kelong_tarik]').maskNumber({integer: true,thousands: '.'});
            $('[id=bunga]').maskNumber({decimal: '.',thousands: ''});
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
</style>
<?php 
function format_rupiah($nilai_uang = NULL)
        {
            if($nilai_uang != NULL){
                $pecah_uang = explode('.', $nilai_uang);

                if(count($pecah_uang)==1){
                    $nilai_uang = $pecah_uang[0];
                    $uang2 = '';
                }else{
                    $nilai_uang = $pecah_uang[0];
                    $uang2 = $pecah_uang[1];
                }

                $nilai_rupiah      = "";
                $jumlah_angka  = strlen($nilai_uang);
                while($jumlah_angka > 3)
                {
                  $nilai_rupiah     = "." . substr($nilai_uang,-3) . $nilai_rupiah;
                  $sisa_nilai         = strlen($nilai_uang) - 3;
                  $nilai_uang         = substr($nilai_uang,0,$sisa_nilai);
                  $jumlah_angka     = strlen($nilai_uang);
                }

                if(count($pecah_uang)==1){
                    $nilai_rupiah       = "Rp " . $nilai_uang . $nilai_rupiah . ",00";
                }else{
                    $nilai_rupiah       = "Rp " . $nilai_uang . $nilai_rupiah . "," . $uang2;
                }

                return $nilai_rupiah;
            }else{
                return '';
            }
        }
?>
