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
            <?php 
            $kota = $this->session->userdata('kota');
            ?>
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
                                    <li><a href="<?php echo site_url('keuangan/cabang');?>">Data Kas</a></li>
                                </ol>
                            </div> -->
                            <div class="card-body">
                                <p class="sub_judul">
                                    Pada Halaman Informasi Data  Surya Yudha, dibagi menjadi 2 wilayah, yaitu Banjarnegara dan Wonosobo. setiap wilayah memiliki nilai dan kondisi yang berbeda dari segi  dan detail wilayah, silahkan pilih salah satu gambar dibawah ini untuk mengakseske dua wilayah tersebut !
                                </p>
                                <hr>
                                <div class="row" style="padding: 12px 10px 15px 10px;">
                                    <div class="col-md-6">
                                        <div class="badan">
                                            <img class="satu" src="<?php echo base_url();?>assets/img/banjarnegara.jpg">
                                            <?php if (($kota==0) || ($kota==1)): ?>
                                            <div class="middle">
                                                <div class="text">
                                                    <p>Banjarnegara.</p>
                                                    <div class="row tombol">
                                                        <div class="col-md-12">
                                                          <a href="<?php echo site_url('wilayah/grid_baru/1');?>" class="btn btn-default oke btn-block">Detail Wilayah</a>
                                                            
                                                        </div>
                                                       <!--  <div class="col-md-6">
                                                            <a href="<?php echo site_url('keuangan/kota/1');?>" class="btn btn-default oke btn-block">Detail Keuangan</a>
                                                        </div> -->
                                                    </div> 
                                                </div>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <h3>Wilayah Banjarnegara</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="badan">
                                            <img class="dua" src="<?php echo base_url();?>assets/img/wonosobo.jpg">
                                            <?php if (($kota==0) || ($kota==2)): ?>
                                            <div class="middle">
                                                <div class="text">
                                                    <p>Wonosobo.</p>
                                                    <div class="row tombol">
                                                        <div class="col-md-12">
                                                          <a href="<?php echo site_url('wilayah/grid_baru/2');?>" class="btn btn-default oke btn-block">Detail Wilayah</a> 
                                                          
                                                        </div>
                                                      <!--   <div class="col-md-6">
                                                            <a href="<?php echo site_url('keuangan/kota/2');?>" class="btn btn-default oke btn-block">Detail Keuangan</a>
                                                        </div> -->
                                                    </div> 
                                                </div>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <h3>Wilayah Wonosobo</h3>
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

    .badan{
        width: 100%;
        height: 400px;
        border-top-right-radius: 6px;
        border-top-left-radius: 6px;
        background-color: #212121;
        position: relative;
        overflow: hidden; 
    }

    .badan .satu{top: -9845px;}

    .badan .dua{top: -9978px;}

    .badan img{
        position: absolute;
        left: -9999px;
        right: -9999px;
        bottom: -9999px;
        margin: auto;
        transition: .5s ease;
    }

    .badan:hover img {opacity: 0.15;}

    .badan:hover .middle {opacity: 1;}

    h3{
        font-family: 'Montserrat', sans-serif;
        letter-spacing: -0.3px;
        text-align: center;
        color: #e74c3c;
    }

    .card-body .sub_judul{
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
        text-align:center;
        width: 60%;
    }

    .text {
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        padding: 16px 0px;
    }

    .text p{margin-bottom: 0px;}

    .tombol .col-md-6{padding: 0px 5px;}

    .tombol .col-md-6 .btn, .tombol .col-md-6 .btn:hover{box-shadow: none;}

    @media (max-width: 1366px){
       .tombol .oke{
           font-size: 10px;
           padding: 10px;
       }
   }
</style>