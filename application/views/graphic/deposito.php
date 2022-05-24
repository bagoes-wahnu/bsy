<?php
$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
// $arr_bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
?>

<script src="<?php echo base_url();?>assets/pikaday/pikaday.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/pikaday/css/pikaday.css">

<script src="<?php echo base_url();?>assets/chart/dist/Chart.bundle.js"></script>
<script src="<?php echo base_url();?>assets/chart/samples/utils.js"></script>

<!-- load css loader -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/loader/css/style.css">

<section id="content_outer_wrapper">
    <div id="content_wrapper" class="card-overlay">
        <div id="header_wrapper" class="header-md">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1 class="xxx">Informasi Data Deposito</h1>
                            <p>Berikut ini adalah beberapa informasi data deposito terkait aplikasi.</p>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url('beranda'); ?>">Beranda</a></li>
                                <li class="active">Data Deposito <?php echo $kota; ?></li>
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
                        <div class="card card-body">
                            <header class="card-heading" style="padding-bottom: 0px;">
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-5">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <div class="form-group" style="margin-left: -3px; padding-bottom: 0px;">
                                                        <input type="text" class="form-control datepicker input" id="datepicker1" type="date" placeholder="Masukkan Periode Akhir" value="<?php echo $arr_bulan[date('n') - 1].' '. date('Y'); ?>">
                                                        <!-- <input type="text" class="form-control datepicker input" id="datepicker1" type="date" placeholder="Masukkan Periode Akhir" value="<?php echo !empty($latest)? $arr_bulan[($latest['BULAN']) - 1].' '. $latest['TAHUN'] : ''; ?>"> -->
                                                    </div>
                                                </td>
                                                <td>
                                                    <button typt="button" class="btn btn-primary proses_selek" id="btn_proses" onclick="load_graph()" style="margin-bottom: 0px;">Proses</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <p>Total Jumlah Nominal Data Deposito : <span id="nominal">Rp. 359.000.000</span></p>
                            </header>
                            <div class="card">
                                <div class="card-body" style="padding-top: 0px;">
                                    <div class="hide" id="loading">
                                        <div class="cube-wrapper">
                                            <div class="cube-folding">
                                                <span class="leaf1"></span>
                                                <span class="leaf2"></span>
                                                <span class="leaf3"></span>
                                                <span class="leaf4"></span>
                                            </div>
                                            <span class="loading" data-name="Loading">Loading</span>
                                        </div>
                                    </div>
                                    <div id="data_chart"></div>
                                </div>

                                <div class="modal-footer">
                                    <a href="<?php echo site_url('beranda');?>" class="btn btn-default" data-dismiss="modal">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        load_graph();
    });

    var base_url = '<?php echo base_url(); ?>';
    var y = new Date();
    var start_year = (y.getFullYear()) - 19;
    var end_year = (y.getFullYear()) + 1;

    var field_tabungan = document.getElementById('datepicker1'),
    bulan = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var disable = false, picker_tabungan = new Pikaday({
        field:field_tabungan,
        firstDay: 1,
        minDate: new Date(start_year, 0, 1),
        maxDate: new Date(end_year, 12, 31),
        yearRange: [start_year,end_year],
        format: 'MMMM YYYY',
        onDraw: function(date) {                
            var a = date.calendars[0];
            field_tabungan.value = bulan[a.month]+ ' ' +a.year;

        }
    });

    function load_graph(){
        var id_kota = '<?php echo $id_kota; ?>',
        group = '<?php echo $group; ?>',
        branch = '<?php echo $branch; ?>',
        btn = "#btn_proses",
        loader = '#loading',
        month_year = $('#datepicker1').val().split(' '),
        year = month_year[1];
        month = month_year[0];

        if(month_year == ''){
            year = 0;
            month = 0;
        }
        
        $(btn).attr('disabled', '').removeAttr('onclick');
        $(btn).html('Processing..').attr('disabled', '').removeAttr('onclick');
        $(loader).removeClass('hide');

        $.ajax({
            type:"POST",
            url:base_url+"graph/get_deposito/"+year+"/"+month+"/"+id_kota+"/"+group+"/"+branch,
            beforeSend:function() {
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    var nominal = obj.nominal;
                    $('#nominal').html(nominal);
                    // $('#nominal').html('Rp. '+nominal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")+',-');
                    $('#data_chart').html(obj.data);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            },
            complete:function() {
                window.onbeforeunload = false;
                $(btn).html('Proses').attr('onclick', 'load_graph()').removeAttr('disabled');
                setTimeout(function () {
                    $(loader).addClass('hide');                    
                }, 2000);
            }
        });
    }

    function preventLeaving() {
        window.onbeforeunload = function() {
            return "Are you sure you want to navigate away?";
        }
    }
</script>

<style type="text/css">
    /*.card .card-heading p{padding-bottom: 0px;}*/

    .row .col-md-6 h1{
        margin-top: 0px;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 10px;
        letter-spacing: -0.3px;
        font-size: 18px;
    }

    .row .col-md-6 p{
        font-family: 'Poppins', sans-serif;
        letter-spacing: -0.2px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .row .col-md-6 table tr td{
        font-family: 'Poppins', sans-serif;
        padding: 0px 15px 10px 0px;
        font-size: 14px;
    }

    table tr td{padding-right: 10px;}

    .proses_selek{
        height: 38px;
        margin-top: 0px;
        border-radius: 2px;
        padding: 8px 16px;
        text-transform: capitalize;
        font-family: 'Poppins', sans-serif;
    }
</style>

<style type="text/css">
    .pika-table {
        display: none;
    }
</style>