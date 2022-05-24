<section id="content_outer_wrapper">
  <div id="content_wrapper" class="card-overlay">
    <div id="header_wrapper" class="header-md">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <header id="header">
              <h1>Informasi Data Linkage</h1>
              <p>Berikut ini adalah beberapa informasi data linkage Kota Surabaya terkait aplikasi.</p>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                <li><a href="javascript:void(0)">Master</a></li>
                <li><a href="<?php echo site_url('Kota');?>/grid">Master Kota</a></li>
                <li class="active">Linkage Program</li>
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
                        <th class="col-xs-1 tengah">Tipe</th>
                        <th class="col-xs-1">Nama Bank</th>
                        <th class="col-xs-1">Nominal</th>
                        <th class="col-xs-1 tengah" data-orderable="false"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">Bank</td>
                        <td>Bank Mandiri</td>
                        <td>Rp. 250.000.000,-</td>
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
                        <td style="text-align: center;">Bank</td>
                        <td>Bank CIMB</td>
                        <td>Rp. 175.785.000,-</td>
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
                        <td style="text-align: center;">Bank</td>
                        <td>Bank Danamon</td>
                        <td>Rp. 301.910.000,-</td>
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
                        <td style="text-align: center;">4</td>
                        <td style="text-align: center;">Non Bank</td>
                        <td>Koprasi Kartika Candra</td>
                        <td>Rp. 20.910.000,-</td>
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
                        <td style="text-align: center;">5</td>
                        <td style="text-align: center;">Non Bank</td>
                        <td>Energeek The E - Goverment Solution</td>
                        <td>Rp. 197.220.000,-</td>
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
                        <td style="text-align: center;">6</td>
                        <td style="text-align: center;">Bank</td>
                        <td>Bank HSBC</td>
                        <td>Rp. 7.910.000,-</td>
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
        <h4 class="modal-title" id="myModalLabel-2">Tambah Data Lingkage Program</h4>
        <p>Isilah data dibawah ini untuk menambahkan data linkage program !</p>
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
          <label class="control-label lbl">Nama Bank : </label>
          <input id="kota" type="text" name="kota" placeholder="Masukan Nama Bank" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="control-label lbl">Tipe Bank : </label>
          <select class="select form-control input" style="margin-top: 7px;">
            <option>Pilih Tipe Bank</option>
            <option>Bank</option>
            <option>Non Bank</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label lbl">Jumlah Nominal : </label>
          <input id="nominal" type="number" name="nominal" class="form-control input" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Masukan Total Nominal" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="control-label lbl">Upload Logo : </label>
          <div class="form-group is-empty">
            <div class="input-group" style="width: 100%;">
              <input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="gambar_siswa">
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
        <h4 class="modal-title" id="myModalLabel-2">Ubah Data Lingkage Program</h4>
        <p>Isilah data dibawah ini untuk mengubah data linkage program !</p>
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
          <label class="control-label lbl">Nama Bank : </label>
          <input id="kota" type="text" name="kota" placeholder="Masukan Nama Bank" data-rule-required="true" data-rule-rangelength="[10,30]" class="form-control input" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="control-label lbl">Tipe Bank : </label>
          <select class="select form-control input" style="margin-top: 7px;">
            <option>Pilih Tipe Bank</option>
            <option>Bank</option>
            <option>Non Bank</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label lbl">Jumlah Nominal : </label>
          <input id="nominal" type="number" name="nominal" class="form-control input" data-rule-required="true" data-mask="000.000.000.000.000,00" placeholder="Masukan Total Nominal" aria-required="true" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="control-label lbl">Upload Logo : </label>
          <div class="form-group is-empty">
            <div class="input-group" style="width: 100%;">
              <input type="file" onchange="readURL(this);" class="form-control" placeholder="Upload Gambar" name="gambar_siswa">
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