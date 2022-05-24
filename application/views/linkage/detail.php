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
                                <li><a href="javascript:void(0)">Linkage Profile</a></li>
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
                <button data-toggle="modal" data-target="#tambah" class="btn btn-default oke">Tambah Data</button>      
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
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>13-Oktober-2017</td>
                            <td>21-Desember-2017</td>
                            <td>Rp. 230.560.000,-</td>
                            <td>Rp. 899.500,-</td>
                            <td>Rp. 1.350.500,-</td>
                            <td>30%</td>
                            <td style="text-align: center;">
                                <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                    <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                      <i class="zmdi zmdi-plus"></i>
                                    </button>
                                    <ul class="nav-sub">
                                      <li> 
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                      </li>
                                      <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                          <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-attachment-alt"></i></a>
                                        </span>
                                      </li>
                                    </ul>
                                </nav> 
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>21-Maret-2016</td>
                            <td>01-Juli-2016</td>
                            <td>Rp. 730.260.500,-</td>
                            <td>Rp. 10.199.500,-</td>
                            <td>Rp. 122.550.500,-</td>
                            <td>5%</td>
                            <td style="text-align: center;">
                                <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                    <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                      <i class="zmdi zmdi-plus"></i>
                                    </button>
                                    <ul class="nav-sub">
                                      <li> 
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                      </li>
                                      <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                          <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-attachment-alt"></i></a>
                                        </span>
                                      </li>
                                    </ul>
                                </nav> 
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>25-Agustus-2017</td>
                            <td>13-November-2017</td>
                            <td>Rp. 192.260.500,-</td>
                            <td>Rp. 9.699.500,-</td>
                            <td>Rp. 12.950.500,-</td>
                            <td>15.89%</td>
                            <td style="text-align: center;">
                                <nav class="btn-fab-group" style="display: -webkit-inline-box;">
                                    <button class="btn btn-default btn-fab fab-menu btn-fab-sm" data-fab="left">
                                      <i class="zmdi zmdi-plus"></i>
                                    </button>
                                    <ul class="nav-sub">
                                      <li> 
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></a>
                                      </li>
                                      <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                          <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-attachment-alt"></i></a>
                                        </span>
                                      </li>
                                    </ul>
                                </nav> 
                            </td>
                        </tr>
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

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel-2">Tambah Detail Linkage.</h4>
        <p>Isilah data dibawah ini untuk menambahkan data detail linkage yang dipilih !</p>
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
        <div class="form-group">
            <label class="control-label lbl">Tanggal Pencarian : </label>
            <input type="text" class="form-control datepicker input" id="datepicker1" type="date" placeholder="Masukan Tanggal Pencarian">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Jatuh Tempo : </label>
            <input type="text" class="form-control datepicker input" id="datepicker2" type="date" placeholder="Masukan Tanggal Jatuh Tempo">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Plafond Bank Wilayah : </label>
            <input id="plaf_nilai" type="number" name="plaf_nilai" placeholder="Masukan Nilai Plafond Bank" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Baki Debet : </label>
            <input id="baik_debet" type="number" name="baik_debet" placeholder="Masukan Nilai Baki Debet" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Kelonggaran Tarik Debet : </label>
            <input id="kelong_tarik" type="number" name="kelong_tarik" placeholder="Masukan Nilai Kelonggaran Tarik" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Bunga (%) : </label>
            <input id="bunga" type="number" name="bunga" placeholder="Masukan Nilai Bunga" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
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

<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="ubah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel-2">Ubah Detail Linkage.</h4>
        <p>Isilah data dibawah ini untuk mengubah data detail linkage yang dipilih !</p>
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
        <div class="form-group">
            <label class="control-label lbl">Tanggal Pencarian : </label>
            <input type="text" class="form-control datepicker input" id="datepicker1" type="date" placeholder="Masukan Tanggal Pencarian">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Jatuh Tempo : </label>
            <input type="text" class="form-control datepicker input" id="datepicker2" type="date" placeholder="Masukan Tanggal Jatuh Tempo">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Plafond Bank Wilayah : </label>
            <input id="plaf_nilai" type="number" name="plaf_nilai" placeholder="Masukan Nilai Plafond Bank" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Baki Debet : </label>
            <input id="baik_debet" type="number" name="baik_debet" placeholder="Masukan Nilai Baki Debet" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Kelonggaran Tarik Debet : </label>
            <input id="kelong_tarik" type="number" name="kelong_tarik" placeholder="Masukan Nilai Kelonggaran Tarik" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="control-label lbl">Bunga (%) : </label>
            <input id="bunga" type="number" name="bunga" placeholder="Masukan Nilai Bunga" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
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

<style type="text/css">
    .card.card-data-tables table.dataTable thead .sorting_asc:before, 
    .card.card-data-tables table.dataTable thead .sorting_desc:after{display: none;}

    .card.card-data-tables table.dataTable thead .sorting:after, 
    .card.card-data-tables table.dataTable thead .sorting:before, 
    .card.card-data-tables table.dataTable thead .sorting_asc:after, 
    .card.card-data-tables table.dataTable thead .sorting_asc:before, 
    .card.card-data-tables table.dataTable thead .sorting_asc_disabled:after, 
    .card.card-data-tables table.dataTable thead .sorting_asc_disabled:before, 
    .card.card-data-tables table.dataTable thead .sorting_desc:after, 
    .card.card-data-tables table.dataTable thead .sorting_desc:before, 
    .card.card-data-tables table.dataTable thead .sorting_desc_disabled:after, 
    .card.card-data-tables table.dataTable thead .sorting_desc_disabled:before{display: none;}
</style>

<script>
    var disable = false, picker = new Pikaday({
        field: document.getElementById('datepicker1'),
        firstDay: 1,
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020],
        
        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });

     var disable = false, picker = new Pikaday({
        field: document.getElementById('datepicker2'),
        firstDay: 1,
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020],
        
        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });


    function reset_form_linkage() {
        $('#modal_linkage #linkage').val('');
        $('#modal_linkage #tipe').val('');
        $('#modal_linkage #tipe').change();
        $('#modal_linkage #logo').addClass('hide');
        $('#modal_linkage #status').prop('checked', true);
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
            url:"<?php echo base_url("linkage/get"); ?>/"+id_linkage,
            success:function(msg){
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#modal_linkage #nama_bank').val(obj.data.NAMA_BANK);
                    $('#modal_linkage #tipe').val(obj.data['TYPE']);
                    $('#modal_linkage #tipe').change();

                    if(obj.data['STATUS'] == 1){
                        $('#status').prop('checked', true);
                    }else{
                        $('#status').prop('checked', false);
                    }

                    if(!$.isEmptyObject(obj.data.LOGO)){
                        $('#modal_linkage #logo').removeClass('hide');
                        $('#modal_linkage #logo a').removeAttr('href').attr('href', '<?php echo base_url('watch'); ?>/logo?src='+obj.data.LOGO+'&id='+obj.data.ID_LINKAGE);
                    }else{
                        $('#modal_linkage #logo').addClass('hide');
                        $('#modal_linkage #logo a').attr('href', 'javascript:;');
                    }
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
            url:"<?php echo base_url("linkage/save"); ?>/"+id_linkage,
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
                url:"<?php echo base_url("linkage/delete_linkage"); ?>/"+id_linkage,
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