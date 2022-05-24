<!-- Ngeload Select 2 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.min.css">
<script src="<?php echo base_url();?>assets/select2/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
</script>

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Jaringan Kantor</h1>
                            <p>Berikut ini adalah beberapa informasi data jaringan kantor terkait aplikasi.</p>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="container-fluid">
            <div class="content-body" style="margin-top: -25px;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-data-tables product-table-wrapper">
                          <!--   <div class="shortcuts">
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url('keuangan/kota');?>">Data Kota</a></li>
                                    <li><a href="<?php echo site_url('keuangan/wilayah');?>">Data Wilayah</a></li>
                                    <li><a href="<?php echo site_url('keuangan/cabang');?>">Data Cabang</a></li>
                                    <li class="active">Data Kas</li>
                                </ol>
                            </div> -->
                            <header class="card-heading">
                                <button type="button" class="btn btn-default oke">Import Data</button>	
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
                                <div style="padding: 0px 20px;">
                                    <div class="form-group">
                                        <label class="control-label lbl">Pilih Kantor Cabang : </label>
                                        <select class="js-example-basic-single select-dua" name="state">
                                            <option>Silahkan Pilih Kantor Cabang</option>
                                            <option value="wil1">Wanadadi</option>
                                            <option value="wil2">Punggelan</option>
                                            <option value="wil3">Mandiraja</option>
                                            <option value="wil4">Purbalingga</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1 tengah">No.</th>
                                                <th class="col-xs-1 tengah">Kantor Kas</th>
                                                <th class="col-xs-1 tengah">Bulan</th>
                                                <th class="col-xs-1 tengah">Tahun</th>
                                                <th class="col-xs-1 tengah" data-orderable="false"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">1</td>
                                                <td style="text-align: center;">Susukan</td>
                                                <td style="text-align: center;">Januari</td>
                                                <td style="text-align: center;">2014</td>
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
                                                                <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">2</td>
                                                <td style="text-align: center;">Padanarum</td>
                                                <td style="text-align: center;">Februari</td>
                                                <td style="text-align: center;">2015</td>
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
                                                                <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">3</td>
                                                <td style="text-align: center;">Segamas</td>
                                                <td style="text-align: center;">Maret</td>
                                                <td style="text-align: center;">2015</td>
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
                                                                <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">4</td>
                                                <td style="text-align: center;">Padamara</td>
                                                <td style="text-align: center;">April</td>
                                                <td style="text-align: center;">2014</td>
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
                                                                <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">5</td>
                                                <td style="text-align: center;">Kaligondang</td>
                                                <td style="text-align: center;">Mei</td>
                                                <td style="text-align: center;">2015</td>
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
                                                                <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">6</td>
                                                <td style="text-align: center;">Kutasari</td>
                                                <td style="text-align: center;">Juni</td>
                                                <td style="text-align: center;">2013</td>
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
                                                                <a href="<?php echo site_url('Keuangan');?>/cab" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Kas" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-home"></i></a>
                                                            </li>
                                                            <li> 
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Lihat Keuangan" class="btn btn-warning btn-fab btn-fab-sm"><i class="zmdi zmdi-money-box"></i></a>
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

<style type="text/css">
    /* Shortcut */
    .breadcrumb li a,
    .breadcrumb>li+li:before, 
    .mega.breadcrumb>li+li:before{
        color: #2c3e50;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: -0.2px;
    }

    .breadcrumb li a:hover,
    .breadcrumb li.active{
        color: #e74c3c;
        font-weight: 600;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: -0.2px;
    }

    .shortcuts{
        width: 100%;
        background-color: #f5f5f5;
        padding: 15px 20px 10px 20px;
    }

    .shortcuts .breadcrumb{margin-bottom: 0px;}
    /* Shortcut */
</style>