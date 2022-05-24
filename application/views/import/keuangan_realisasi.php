<?php
$arr_bulan = array('1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');

$arr_kategori = array('tks' => 'Data TKS', 'tdk' => 'Data Tabungan, Deposito & Kredit');
?>

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Data Realisasi</h1>
                            <p>Berikut ini adalah beberapa informasi data kinerja keuangan kantor terkait realisasi.</p>
                            <!-- <ol class="breadcrumb">
                                <li><a href="javascript:;">Beranda</a></li>
                                <li><a href="<?php echo site_url('import'); ?>">Import Kinerja Keuangan</a></li>
                                <li class="active"><a href="javascript:;">Realisasi</a></li>
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
                                <button type="button" class="btn btn-default oke" onclick="import_data()">Import Data</button>
                                <div class="card-search">
                                    <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                                        <i class="zmdi zmdi-search search-icon-left"></i>
                                        <input type="text" class="form-control filter-input" placeholder="Filter Products..." autocomplete="off">
                                        <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close">
                                            <i class="zmdi zmdi-close"></i>
                                        </a>
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
                                    <li class="dropdown" data-toggle="tooltip" data-placement="top" data-original-title="Show Entries">
                                        <a href="javascript:void(0)" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <div id="dataTablesLength">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="Export All">
                                            <i class="zmdi zmdi-inbox"></i>
                                        </a>
                                    </li>
                                </ul>
                            </header>
                            <div class="card-body p-0">
                                <div class="alert alert-info m-20 hidden-md hidden-lg" role="alert">
                                    <p>
                                        Heads up! You can Swipe table Left to Right on Mobile devices.
                                    </p>
                                </div>

                                <div class="table-responsive">
                                    <table id="table1" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-orderable="true" class="col-xs-2" style="text-align: center;">Bulan</th>
                                                <th data-orderable="true" class="col-xs-2" style="text-align: center;">Tahun</th>
                                                <th data-orderable="true" class="col-xs-2" style="text-align: center;">Jenis</th>
                                                <th data-orderable="true" class="col-xs-2" style="text-align: center;">Tanggal Import</th>
                                                <th data-orderable="true" class="col-xs-2" style="text-align: center;">Jam Import</th>
                                                <th data-orderable="true" class="col-xs-2" style="text-align: center;">Progres</th>
                                                <th data-orderable="false" class="col-xs-2" style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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

<div class="modal fade" id="modal_import" tabindex="-1" role="dialog" aria-labelledby="modal_import">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Import Realisasi</h4>
                <p>Isilah data dibawah ini untuk menambahkan data terkait realisasi !</p>
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_import" method="post" action="" enctype="multipart/form-data" onsubmit="return false;">
            <input type="hidden" id="jenis" name="jenis" value="realisasi">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label lbl">Bulan : </label>
                    <select class="select form-control" name="bulan" id="bulan">
                        <option value="">Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Tahun : </label>
                    <select class="select form-control" name="tahun" id="tahun">
                        <option value="">Pilih Tahun</option>
                        <?php
                        $tahun = date('Y');
                        for ($i = $tahun; $i > ($tahun - 20); $i--) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">Jenis Data : </label>
                    <select class="select form-control" name="kategori" id="kategori">
                        <option value="">Pilih Jenis Data</option>
                        <option value="tks">Data realisasi TKS</option>
                        <option value="tdk">Data realisasi Tabungan, Deposito & Kredit</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label lbl">File : </label>
                    <div class="form-group is-empty">
                        <div class="input-group" style="width: 100%;">
                            <input type="file" onchange="cekFile(this.value)" accept=".csv" class="form-control" placeholder="Upload File" id="file" name="file">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control input" placeholder="Upload File Terkait">
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
                <button type="button" class="btn btn-default oke" id="btn_import" onclick="import_data(true)">Import</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<style type="text/css">
    .table thead tr th {
        text-transform: uppercase;
    }

    .table tbody tr td {
        font-family: 'Poppins', sans-serif;
        letter-spacing: -0.2px;
        font-weight: 500;
        padding: 14px 0px;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js-page/import-keuangan-realisasi.js"></script>
