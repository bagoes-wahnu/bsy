
<?php
$role = $this->session->userdata('role');
$kota = $this->session->userdata('kota');
?>
<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Kinerja Keuangan</h1>
                            <p>Berikut ini adalah beberapa informasi data kinerja keuangan kantor terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="javascript:;">Beranda</a></li>
                                <li class="active"><a href="javascript:;">Kinerja Keuangan</a></li>
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
                            <div class="card-body">
                                <p class="sub_judul">
                                    Pada Halaman Informasi Data Keuangan Surya Yudha, dibagi menjadi 2 wilayah, yaitu Banjarnegara dan Wonosobo. setiap wilayah memiliki nilai dan kondisi yang berbeda dari segi keuangan dan detail wilayah, silahkan pilih salah satu gambar dibawah ini untuk mengakseske dua wilayah tersebut !
                                </p>
                                <!-- <a href="<?php echo site_url('import/tutorial'); ?>" class="btn btn-default oke">Tutorial Import</a> -->
                                <hr>
                                <div class="row" style="padding: 12px 10px 15px 10px;">
                                  <?php if($kota == 1) { ?>
                                    <div class="col-md-6">
                                        <div class="badan">
                                            <img class="satu" src="<?php echo base_url(); ?>assets/img/banjarnegara.jpg">
                                            <div class="middle">
                                                <div class="text">
                                                    <p>Keuangan Banjarnegara.</p>
                                                    <?php
                                                    if ($this->session->userdata('kota') == 1) {
                                                        ?>
                                                        <div class="row tombol">
                                                            <div class="col-md-6">
                                                                <a href="<?php echo site_url('import'); ?>/keuangan_target" class="btn btn-default oke btn-block">
                                                                    Target
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a href="<?php echo site_url('import'); ?>/keuangan_realisasi" class="btn btn-default oke btn-block">Realisasi</a>
                                                            </div>
                                                        </div>
                                                        <div class="row tombol">
                                                            <div class="col-md-6 col-md-offset-3">
                                                                <a href="<?php echo site_url('import'); ?>/harian" class="btn btn-default oke btn-block">Harian</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Wilayah Banjarnegara</h3>
                                    </div>
                                    <?php } else { ?>
                                    <div class="col-md-6">
                                        <div class="badan">
                                            <img class="dua" src="<?php echo base_url(); ?>assets/img/wonosobo.jpg">
                                            <div class="middle">
                                                <div class="text">
                                                    <p>Keuangan Wonosobo.</p>
                                                    <?php
                                                    if ($this->session->userdata('kota') == 2) {
                                                        ?>
                                                        <div class="row tombol">
                                                            <div class="col-md-6">
                                                                <a href="<?php echo site_url('import'); ?>/keuangan_target" class="btn btn-default oke btn-block">
                                                                    Target
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a href="<?php echo site_url('import'); ?>/keuangan_realisasi" class="btn btn-default oke btn-block">Realisasi</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Wilayah Wonosobo</h3>
                                    </div>
                                  <?php } ?>
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
    .badan {
        width: 100%;
        height: 400px;
        border-top-right-radius: 6px;
        border-top-left-radius: 6px;
        background-color: #212121;
        position: relative;
        overflow: hidden;
    }

    .badan .satu {
        top: -9845px;
    }

    .badan .dua {
        top: -9978px;
    }

    .badan img {
        position: absolute;
        left: -9999px;
        right: -9999px;
        bottom: -9999px;
        margin: auto;
        transition: .5s ease;
    }

    .badan:hover img {
        opacity: 0.15;
    }

    .badan:hover .middle {
        opacity: 1;
    }

    h3 {
        font-family: 'Montserrat', sans-serif;
        letter-spacing: -0.3px;
        text-align: center;
        color: #e74c3c;
    }

    .card-body .sub_judul {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        margin-bottom: 0px;
        line-height: 22px;
        padding: 0px 8px;
        margin-bottom: 15px;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        width: 60%;
    }

    .text {
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        padding: 16px 0px;
    }

    .text p {
        margin-bottom: 0px;
    }

    .tombol .col-md-6 {
        padding: 0px 5px;
    }

    .tombol .col-md-6 .btn,
    .tombol .col-md-6 .btn:hover {
        box-shadow: none;
    }

    /* Media */
    @media (max-width: 1366px) {
        .badan .satu {
            top: -10000px;
        }

        .tombol .oke {
            font-size: 10px;
            padding: 10px;
        }

        .middle {
            width: 70%;
        }
    }

    /* Media */

    @media (max-width: 1366px) {
        .tombol .oke {
            font-size: 10px;
            padding: 10px;
        }
    }
</style>
