<!-- Ngeload Select 2 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.min.css">
<script src="<?php echo base_url();?>assets/select2/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".js-example-basic-single").select2();
      $.fn.modal.Constructor.prototype.enforceFocus = function () {};
    });
</script>


<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Master User</h1>
                            <p>Berikut ini adalah beberapa informasi data master user terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="javascript:void(0)">Beranda</a></li>
                                <li><a href="javascript:void(0)">Master</a></li>
                                <li><a href="javascript:void(0)">Master User</a></li>
                                <li class="active">Banjarnegara</li>
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
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#tambah" class="btn btn-default oke">Tambah Data</a>      
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
                                                <th class="col-xs-1" data-orderable="false">Username</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Hak Akses</th>
                                                <th class="col-xs-1 tengah" data-orderable="false">Status</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">1</td>
                                                <td>Abdi Sembada Amirullah</td>
                                                <td style="text-align: center;">Admin</td>
                                                <td style="text-align: center;"><i class="zmdi zmdi-check"></i>&nbsp; Aktif</td>
                                                <td class="oys">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah"> 
                                                            <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </a>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <a href="javascript:;"> 
                                                            <button type="button" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">2</td>
                                                <td>Erick Wahyudi Prakoso</td>
                                                <td style="text-align: center;">Kinerja Keuangan</td>
                                                <td style="text-align: center;"><i class="zmdi zmdi-check"></i>&nbsp; Aktif</td>
                                                <td class="oys">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah"> 
                                                            <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </a>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <a href="javascript:;"> 
                                                            <button type="button" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">3</td>
                                                <td>Dimas Habib</td>
                                                <td style="text-align: center;">Pembukuan</td>
                                                <td style="text-align: center;"><i class="zmdi zmdi-check"></i>&nbsp; Aktif</td>
                                                <td class="oys">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah"> 
                                                            <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </a>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <a href="javascript:;"> 
                                                            <button type="button" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">4</td>
                                                <td>Muhammad Raffi Vian</td>
                                                <td style="text-align: center;">Personalia</td>
                                                <td style="text-align: center;"><i class="zmdi zmdi-close"></i>&nbsp; Tidak Aktif</td>
                                                <td class="oys">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah"> 
                                                            <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </a>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <a href="javascript:;"> 
                                                            <button type="button" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">5</td>
                                                <td>Muhammad Khafid Barokum</td>
                                                <td style="text-align: center;">Sekertaris</td>
                                                <td style="text-align: center;"><i class="zmdi zmdi-close"></i>&nbsp; Tidak Aktif</td>
                                                <td class="oys">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah"> 
                                                            <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </a>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <a href="javascript:;"> 
                                                            <button type="button" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">6</td>
                                                <td>Zulmi Adi Rizky</td>
                                                <td style="text-align: center;">Android</td>
                                                <td style="text-align: center;"><i class="zmdi zmdi-check"></i>&nbsp; Aktif</td>
                                                <td class="oys">
                                                    <span data-toggle="tooltip" data-placement="bottom" title="Ubah"> 
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ubah"> 
                                                            <button type="button" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></button>
                                                        </a>
                                                    </span>
                                                    <span data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <a href="javascript:;"> 
                                                            <button type="button" class="btn btn-danger btn-fab btn-fab-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </a>
                                                    </span>
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

<style type="text/css">
    .oys .bottom{top: 50px !important;}

    .oys .top{top: -20px !important;}

    .oys{text-align: center !important;}
</style>

<script type="text/javascript">
    $(function() {
        $('#android').hide(); 
        $('#bukan_android').hide();
        $('#jabatan').change(function(){
            if($('#jabatan').val() == 'android') {
                $('#android').show();
                $('#bukan_android').hide(); 
            }else if($('#jabatan').val() == 'bukan_android') {
                $('#bukan_android').show();
                $('#android').hide();
            } else {
                $('#android').hide(); 
                $('#bukan_android').hide();
            } 
        });
    });

    $(function() {
        $('#android2').hide(); 
        $('#bukan_android2').hide();
        $('#jabatan2').change(function(){
            if($('#jabatan2').val() == 'android2') {
                $('#android2').show();
                $('#bukan_android2').hide(); 
            }else if($('#jabatan2').val() == 'bukan_android2') {
                $('#bukan_android2').show();
                $('#android2').hide();
            } else {
                $('#android').hide(); 
                $('#bukan_android2').hide();
            } 
        });
    });
</script>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel-2">Tambah Data Master User</h4>
        <p>Isilah data dibawah ini untuk menambahkan data master user !</p>
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
            <label class="control-label lbl">Pilih Hak Akses  : </label>
            <select class="js-example-basic-single select-dua" name="state">
                <option name="" value="">Pilih Hak Akses </option>
                <option name="bukan_android2" value="bukan_android2">Admin</option>
                <option name="bukan_android2" value="bukan_android2">Kinerja Keuangan</option>
                <option name="bukan_android2" value="bukan_android2">Pembukuan</option>
                <option name="bukan_android2" value="bukan_android2">Personalia</option>
                <option name="bukan_android2" value="bukan_android2">Sekertaris</option>
                <option name="android2" value="android2">Android</option>
            </select>
        </div>
        <div id="android">
            <div class="form-group">
              <label class="control-label lbl">Nama Lengkap : </label>
              <input id="namalengkap" type="text" name="namalengkap" placeholder="Masukan Nama Lengkap" data-rule-required="true" class="form-control input" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label lbl">Nama Panggilan : </label>
              <input id="namaPanggilan" type="text" name="namaPanggilan" placeholder="Masukan Nama Panggilan" data-rule-required="true" class="form-control input" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label lbl">Nama User : </label>
              <input id="namaUser" type="text" name="namaUser" placeholder="Masukan Nama User" data-rule-required="true" class="form-control input" autocomplete="off">
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
        <div id="bukan_android">
            <div class="form-group">
              <label class="control-label lbl">Nama User : </label>
              <input id="namaUser" type="text" name="namaUser" placeholder="Masukan Nama User" data-rule-required="true" class="form-control input" autocomplete="off">
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
        <h4 class="modal-title" id="myModalLabel-2">Ubah Data Master User</h4>
        <p>Isilah data dibawah ini untuk mengubah data master user !</p>
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
            <label class="control-label lbl">Pilih Hak Akses  : </label>
            <select class="js-example-basic-single select-dua" name="state">
                <option name="" value="">Pilih Hak Akses </option>
                <option name="bukan_android2" value="bukan_android2">Admin</option>
                <option name="bukan_android2" value="bukan_android2">Kinerja Keuangan</option>
                <option name="bukan_android2" value="bukan_android2">Pembukuan</option>
                <option name="bukan_android2" value="bukan_android2">Personalia</option>
                <option name="bukan_android2" value="bukan_android2">Sekertaris</option>
                <option name="android2" value="android2">Android</option>
            </select>
        </div>
        <div id="android2">
            <div class="form-group">
              <label class="control-label lbl">Nama Lengkap : </label>
              <input id="namalengkap" type="text" name="namalengkap" placeholder="Masukan Nama Lengkap" data-rule-required="true" class="form-control input" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label lbl">Nama Panggilan : </label>
              <input id="namaPanggilan" type="text" name="namaPanggilan" placeholder="Masukan Nama Panggilan" data-rule-required="true" class="form-control input" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label lbl">Nama User : </label>
              <input id="namaUser" type="text" name="namaUser" placeholder="Masukan Nama User" data-rule-required="true" class="form-control input" autocomplete="off">
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
        <div id="bukan_android2">
            <div class="form-group">
              <label class="control-label lbl">Nama User : </label>
              <input id="namaUser" type="text" name="namaUser" placeholder="Masukan Nama User" data-rule-required="true" class="form-control input" autocomplete="off">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-default oke">Simpan</button>
      </div>
    </form>
    <!-- modal-content -->
  </div>
  <!-- modal-dialog -->
</div>