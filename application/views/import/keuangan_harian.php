<style type="text/css">
    .row {
        margin: auto;
    }

    .item1 {
        background-color: #f5f5f5;
        padding: 10px 0px;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    .input-group span {
        font-size: 18px;
        font-weight: 600;
        color: #607188;
    }

    .form-group {
        padding-bottom: 5px;
    }

    .arrow i {
        font-size: 2rem;
        color: #516073;
        padding-top: 12px;
    }
</style>

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Data Harian</h1>
                            <p>Berikut ini adalah beberapa informasi data kinerja keuangan kantor terkait harian.</p>
                            <ol class="breadcrumb">
                                <li><a href="javascript:;">Beranda</a></li>
                                <li><a href="<?php echo site_url('import'); ?>">Import Kinerja Keuangan</a></li>
                                <li class="active"><a href="javascript:;">Harian</a></li>
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
                                <!-- <button type="button" class="btn btn-default oke" data-toggle="modal" data-target="#modal_import">Import Data</button> -->
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
                                    <li>
                                        <a href="javascript:void(0)" data-card-search="open" data-toggle="modal" data-placement="top" data-original-title="Filter Data" data-target="#modal_filter">
                                            <i class="zmdi zmdi-filter-list"></i>
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

                                <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <table width="100%">
                                            <tr>
                                                <td class="text-left">
                                                    <a href="" class="text-danger arrow"><i class="material-icons">chevron_left</i></a>
                                                </td>
                                                <td>
                                                    <h2>Januari</h2>
                                                </td>
                                                <td class="text-right">
                                                    <a href="" class="text-danger arrow"><i class="material-icons">chevron_right</i></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row text-center m-t-20">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item1" id="item1">1-12-2019</div>
                                                <div class="item1" id="item1">2-12-2019</div>
                                                <div class="item1" id="item1">3-12-2019</div>
                                                <div class="item1" id="item1">4-12-2019</div>
                                                <div class="item1" id="item1">5-12-2019</div>
                                                <div class="item1" id="item1">6-12-2019</div>
                                                <div class="item1" id="item1">7-12-2019</div>
                                                <div class="item1" id="item1">8-12-2019</div>
                                                <div class="item1" id="item1">9-12-2019</div>
                                                <div class="item1" id="item1">10-12-2019</div>
                                                <div class="item1" id="item1">11-12-2019</div>
                                                <div class="item1" id="item1">12-12-2019</div>
                                                <div class="item1" id="item1">13-12-2019</div>
                                                <div class="item1" id="item1">14-12-2019</div>
                                                <div class="item1" id="item1">15-12-2019</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="80">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="40,90">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item1" id="item1">16-12-2019</div>
                                                <div class="item1" id="item1">17-12-2019</div>
                                                <div class="item1" id="item1">18-12-2019</div>
                                                <div class="item1" id="item1">19-12-2019</div>
                                                <div class="item1" id="item1">20-12-2019</div>
                                                <div class="item1" id="item1">21-12-2019</div>
                                                <div class="item1" id="item1">22-12-2019</div>
                                                <div class="item1" id="item1">23-12-2019</div>
                                                <div class="item1" id="item1">24-12-2019</div>
                                                <div class="item1" id="item1">25-12-2019</div>
                                                <div class="item1" id="item1">26-12-2019</div>
                                                <div class="item1" id="item1">27-12-2019</div>
                                                <div class="item1" id="item1">28-12-2019</div>
                                                <div class="item1" id="item1">29-12-2019</div>
                                                <div class="item1" id="item1">30-12-2019</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi" value="">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control input" placeholder="Persentase realisasi">
                                                    <span class="input-group-addon ion ion-email-unread">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-right m-t-20">
                                    <div class="col-md-12">
                                        <button class="btn btn-default oke">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal_filter" tabindex="-1" role="dialog" aria-labelledby="modal_filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Filter</h4>
                <p>Isilah data dibawah ini untuk filter data realisasi harian !</p>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label lbl">Tanggal Awal : </label>
                            <input type="text" class="form-control datepicker" id="tgl" name="tgl_award" placeholder="Tanggal Awal">
                        </div>
                        <div class="form-group">
                            <label class="control-label lbl">Tanggal Akhir : </label>
                            <input type="text" class="form-control datepicker" name="tgl_award" placeholder="Tanggal Akhir">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-default oke" id="btn_import">Simpan</button>
            </div>
        </form>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>




<script type="text/javascript">
    $(document).ready(() => {
        $('#tgl').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            format: 'DD-MM-YYYY'
        });
    })
</script>