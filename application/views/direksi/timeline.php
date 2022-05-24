<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

<div class="timeline-page">
    <section id="content_outer_wrapper">
        <div id="content_wrapper" class="card-overlay">
            <div id="header_wrapper" class="header-md">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <header id="header">
                                <h1>Timeline SDM</h1>
                                <p>Berikut ini adalah informasi timeline SDM terkait aplikasi.</p>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                    <li><a href="#">Master</a></li>
                                    <li><a href="<?php echo site_url('direksi/grid');?>">SDM</a></li>
                                    <li class="active">Timeline SDM</li>
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
                            <div class="card">
                                <div class="card-body">
                                    <section id="meeting-timeline" class="timeline-container ">
                                        <a onclick="add_timeline()" data-toggle="modal" >
                                            <div class="card card-date">
                                                <div>Tambah Riwayat</div>
                                            </div>
                                        </a>
                                        <?php 
                                        $left='fadeInLeft';
                                        $ikon = 'zmdi-time';
                                        $bgcolor = '#e74c3c';
                                        foreach ($data as $key): 
                                            if ($key['ID_RIWAYAT']==1) {
                                                $bgcolor = '#3c61e7';
                                                $ikon = 'zmdi-graduation-cap';
                                                $riwayat = 'Pendidikan';
                                            }elseif ($key['ID_RIWAYAT']==2) {
                                                $bgcolor = '#2da707';
                                                $ikon = 'zmdi-chart';
                                                $riwayat = 'Jabatan';
                                            }elseif ($key['ID_RIWAYAT']==3) {
                                                $bgcolor = '#e74c3c';
                                                $ikon = 'zmdi-file-text';
                                                $riwayat = 'Pelatihan';
                                            }else{
                                                $riwayat = '';
                                            }
                                            ?>
                                            <div class="meeting-timeline-block">
                                                <div class="meeting-timeline-icon animated bounceIn" style="background: <?php echo $bgcolor; ?>">
                                                    <i class="zmdi <?php echo $ikon; ?>"></i>
                                                </div>
                                                <div class="card card-timeline animated <?php echo $left ?>">
                                                    <header class="card-heading border-bottom">
                                                        <h2 class="card-title">Riwayat <?php echo $riwayat ?></h2>
                                                        <ul class="card-actions icons right-top">
                                                            <li class="dropdown">
                                                                <a href="#" data-toggle="dropdown" onclick="edit(<?php echo $key['ID_TIMELINE'] ?>)">
                                                                    <i class="zmdi zmdi-more-vert" ></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </header>
                                                    <div class="card-body p-0">
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <span class="pull-left">
                                                                    <i class="zmdi zmdi-pin w-15"></i>
                                                                </span>
                                                                <div class="list-group-item-body">
                                                                    <div class="list-group-item-heading"><?php echo $key['DETAIL'] ?></div>
                                                                    <div class="list-group-item-text"><?php echo $key['LOKASI'] ?></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <span class="pull-left">
                                                                    <i class="zmdi zmdi-book w-15"></i>
                                                                </span>
                                                                <div class="list-group-item-body">
                                                                    <div class="list-group-item-heading">Keterangan</div>
                                                                    <div>
                                                                        <?php echo $key['KETERANGAN'] ?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul></div>
                                                        <span class="meeting-time"><b>
                                                            <?php echo date_format(date_create($key['AWAL']),"d M Y"); ?>
                                                        </b> sd <b>
                                                        <?php echo ($key['AKHIR'] == '1970-01-01' or empty($key['AKHIR']))? ' sekarang' : date_format(date_create($key['AKHIR']),"d M Y"); ?>
                                                    </b></span>
                                                </div>
                                            </div>
                                            <?php 
                                            if ($left=='fadeInRight') {
                                                $left='fadeInLeft';
                                            }else{
                                                $left='fadeInRight';
                                            }
                                            endforeach ?> 


                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- start: modal direksi -->
    <div class="modal fade" id="modal_direksi" tabindex="-1" role="dialog" aria-labelledby="modal_direksi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel-2"> Data Riwayat</h4>
                    <p>Isilah data dibawah ini untuk menambahkan data riwayat !</p>
                    <ul class="card-actions icons right-top">
                        <li>  
                            <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                                <i class="zmdi zmdi-close"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="modal_isi">
                <form id="form_direksi" method="post" action="<?php echo site_url('direksi/save_timeline/'.$id);?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label lbl">Kategori Riwayat  : </label>
                            <select class="select form-control input" style="margin-top: 7px;" name="riwayat" id="riwayat" required>
                                <option value="">Pilih Riwayat </option>
                                <option value="1"> Pendidikan </option>
                                <option value="2"> Jabatan </option>
                                <option value="3"> Pelatihan </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="periodeAwal" class="control-label lbl">Lokasi</label>
                            <input type="text" class="form-control datepicker input" id="lokasi" name="lokasi" type="date" placeholder="Masukan Lokasi Riwayat">
                        </div>
                        <div class="form-group">
                            <label for="periodeAwal" class="control-label lbl">Detail</label>
                            <input type="text" class="form-control datepicker input" id="detail" name="detail" type="date" placeholder="Masukan Detail Riwayat">
                        </div>
                        <div class="form-group">
                            <label for="periodeAwal" class="control-label lbl">Periode Awal</label>
                            <input type="text" readonly="readonly" class="form-control datepicker input" id="datepicker1"   name="periodeAwal"  placeholder="Masukan Periode Awal">
                        </div>
                        <div class="form-group">
                            <label for="periodeAkhir" class="control-label lbl">Periode Akhir</label>
                            <input type="text" readonly="readonly" class="form-control datepicker input" id="datepicker2"   name="periodeAkhir"  placeholder="Masukan Periode Akhir">
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="control-label lbl" style="margin-bottom: 10px;">Keterangan</label>
                            <textarea name="editor2" id="editor1">

                            </textarea>
                            <script>
                                /* Replace the <textarea id="editor1"> with a CKEditor */
                                /* instance, using default configuration. */
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="simpan" class="btn btn-default oke" id="btn_save_direksi">Tambah</button>
                    </div>
                </form>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- end: modal direksi -->



    <script type="text/javascript">
        function add_timeline() {
            $('#modal_direksi').modal('show');
            $('#modal_direksi .modal-header .modal-title').html('Tambah Data Riwayat');
            $('#modal_direksi .modal-header').find('p').eq(0).html('Isilah data dibawah ini untuk menambahkan data riwayat !');
        }

        var disable = false, picker = new Pikaday({
            field: document.getElementById('datepicker1'),
            firstDay: 1,
            format: 'DD-MM-YYYY',
            minDate: new Date(1900, 0, 1),
            maxDate: new Date(2045, 12, 31),
            yearRange: [1900,2045],

            showDaysInNextAndPreviousMonths: true,
            enableSelectionDaysInNextAndPreviousMonths: true
        });

        var disable = false, picker = new Pikaday({
            field: document.getElementById('datepicker2'),
            firstDay: 1,
            format: 'DD-MM-YYYY',
            minDate: new Date(1900, 0, 1),
            maxDate: new Date(2045, 12, 31),
            yearRange: [1900,2045],

            showDaysInNextAndPreviousMonths: true,
            enableSelectionDaysInNextAndPreviousMonths: true
        });
    </script>

    <style type="text/css">
        .timeline-page .timeline-container .card.card-date{background-color: #f5f5f5;}

        .timeline-page #meeting-timeline .card.card-timeline{background-color: #fafafa;}

        /*.timeline-page #meeting-timeline .meeting-timeline-icon-1{background: #3c61e7;}
        .timeline-page #meeting-timeline .meeting-timeline-icon-2{background: #e74c3c;}
        .timeline-page #meeting-timeline .meeting-timeline-icon-3{background: #e74c3c;}
        .timeline-page #meeting-timeline .meeting-timeline-icon{background: #e74c3c;}*/

        .list-group-item-heading{margin-bottom: 10px;}

        .card-date{
            padding: 13px;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            letter-spacing: -0.2px;
            font-size: 14px;
            background-color: #e74c3c !important;
            color: #fff;
            -webkit-transition: background-color 0.5s ease-out;
            z-index: 1 !important;
        }

        .card-date:hover,
        .card-date:focus,
        .card-date:active{background-color: #c0392b !important;}

        .cke_contents{height: 130px !important;}

        /* Footer */
        .bawah{
            min-height: 150px;
            z-index: 10;
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background-color:#fff;
            box-shadow: 0 -3px 3px 0 rgba(0, 0, 0, 0.15) !important;
        }

        .isi{  
            font-size: 14px;
            font-weight: 500;
            padding-left: 260px;
            padding-right: 20px;
            padding-top: 10px;
        }
        /* end Footer */
    </style>
    <script type="text/javascript">
        function edit(id_dinas) {
            $('#modal_direksi').modal('show', {backdrop: 'static'});
            $('#modal_direksi .modal-header .modal-title').html('Edit Data Riwayat');
            $.ajax({
                url:"<?php echo site_url('direksi/edit_timeline/') ?>/"+id_dinas,
                success:function(response){
                    jQuery('#modal_isi').html(response);
                },  
                error:function(){
                    alertify.alert('<p class="text-danger">Error Connection</p>').setting({
                        'title':'Pemberitahuan',
                        'transition':'zoom'
                    }).show();
                }
            });
        }
        $('#modal_direksi').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>