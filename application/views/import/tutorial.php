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
                            <h1>Tutorial Import</h1>
                            <p>Berikut ini adalah tutorial import data kinerja keuangan.</p>
                            <ol class="breadcrumb">
                                <li><a href="javascript:;">Beranda</a></li>
                                <li><a href="<?php echo site_url('import');?>">Import Kinerja Keuangan</a></li>
                                <li class="active"><a href="javascript:;">Tutorial Import</a></li>
                            </ol>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="container-fluid m-t-0">
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content">
                            <div style="background-color: #fff; padding: 15px;">
                                <div class="card-body">
                                    <header class="content-heading">
                                        <!-- <h2 class="content-title">Collapsible Panels</h2> -->
                                        <!-- <small>Collapsibles are accordion elements that expand when clicked on. They allow you to hide content that is not immediately relevant to the user.</small> -->
                                    </header>
                                    <div class="content-body m-t-30">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                         A. Syarat & Ketentuan
                                                     </a>
                                                 </h4>
                                             </div>
                                             <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <p class="text-default"><b>Syarat-syarat untuk melakukan import:</b></p>
                                                    <ol>
                                                        <!-- <li class="text-default">Pastikan komputer atau laptop Anda sudah terinstal aplikasi <b><i>LibreOffice</i></b>. Jika belum, aplikasi bisa diunduh <u><a href="https://www.libreoffice.org/download/download/" class="text-warning" target="_blank">disini</a></u>.</li> -->
                                                        <li class="text-default">Hindari penggunaan <b><i>Formula</i></b>.</li>
                                                        <li class="text-default">File yang akan diimport harus berformat  <b><i>.csv</i></b> (Comma Separated Values). Cara mengubah format file dapat dilihat <u><a class="text-warning" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">disini</a></u>.</li>
                                                        <li class="text-default">Format dan urutan kolom harus sama dengan template file yang dapat diunduh <u><a href="<?php echo site_url('import/template/download'); ?>" class="text-warning" target="_blank">disini</a></u>.</li>
                                                        <li class="text-default">Hindari penggunaan karakter `;` (<u><i>semicolon</i></u>) dalam kalimat.</li>
                                                    </ol>
                                                    <br>
                                                    <p class="text-default"><b>Ketentuan import:</b></p>
                                                    <ol>
                                                        <li>Dengan melakukan import, Anda dianggap telah menyetujui persyaratan yang sudah ditentukan.</li>
                                                    </ol>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        B. Tutorial Merubah format XLS atau XLSX ke CSV (Text)
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                <p class="text-default"><b>Tutorial Merubah file excel (file dengan format XLS atau XLSX) ke format CSV:</b></p>
                                                    <ol>
                                                        <li class="text-default">Buka file excel (file dengan format XLS atau XLSX) yang akan diimport.</li>
                                                        <li class="text-default">Klik menu <b><i>File</i></b> di pojok kiri atas, pilih <b><i>Save As</i></b> maka akan muncul sebuah dialog untuk memilih lokasi penyimpanan dan format file. Pilih lokasi sesuai yang diinginkan dan pilih format <b><i>CSV (Comma delimited) (*.csv)</i></b> pada field <b><i>Save as type: </i></b>, kemudian klik tombol <b><i>Save</i></b>.</li>
                                                        <li class="text-default">File sudah siap untuk diimport.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        C. Tutorial Merubah format XLS atau XLSX ke CSV (YouTube)
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFour">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Collapsible Group Item #4
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    .table thead tr th{text-transform: uppercase;}

    .table tbody tr td{
        font-family: 'Poppins', sans-serif;
        letter-spacing: -0.2px;
        font-weight: 500;
        padding: 14px 0px;
    } 
</style>