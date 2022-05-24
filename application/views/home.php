<?php
$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
// $arr_bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$role = $this->session->userdata('role');
$kota = $this->session->userdata('kota');
?>

<!-- Ngeload Select 2 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2/select2.min.css">
<script src="<?php echo base_url();?>assets/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/pikaday/pikaday.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/pikaday/css/pikaday.css">

<!-- load css loader -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/loader/css/style.css">

<section id="content_outer_wrapper">
    <div id="content_wrapper">
        <div id="header_wrapper" class="header-sm ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <header id="header">
                            <h1>Dashboard i-BSY</h1>
                            <ol class="breadcrumb">
                                <li class="active">Beranda</li>
                            </ol>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabpanel tab-header">
            <ul class="nav nav-tabs scrollable p-l-10">
                <?php if($kota == 1) { ?>
                <li class="active" role="presentation"><a href="#bna" data-toggle="tab" onclick="load_bna()">BANJARNEGARA</a></li>
                <?php } else { ?>
                <li role="presentation"><a href="#krt" data-toggle="tab" onclick="load_krt()">WONOSOBO</a></li>
                <?php } ?>
                <!-- <li role="presentation"><a href="#konsolidasi" data-toggle="tab" onclick="load_konsolidasi()">KONSOLIDASI</a></li> -->
            </ul>
        </div>

        <div id="content" class="container-fluid">
            <div id="tabbed_content" class="tab-content">
                <div class="tab-pane <?php if($kota == 1) { ?>fade active in<?php } ?>" id="bna">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-5">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: -3px;">
                                            <input type="text" class="form-control input" id="datepicker1" type="text" placeholder="Masukan Periode Awal" value="<?php echo $arr_bulan[date('n') - 1].' '. date('Y'); ?>">
                                            <!-- <input type="text" class="form-control input" id="datepicker1" type="text" placeholder="Masukan Periode Awal" value="<?php echo !empty($last_bna)? $arr_bulan[($last_bna['BULAN']) - 1].' '. $last_bna['TAHUN'] : ''; ?>"> -->
                                        </div>
                                    </td>
                                    <td>
                                        <button typt="button" class="btn btn-primary proses_selek" id="btn_bna" onclick="load_bna()" style="margin-bottom: 0px;">Proses</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="hide" id="loading_bna">
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
                    <div class="clearfix"></div>
                    <div id="get_data_bna"></div>
                </div>

                <div class="tab-pane <?php if($kota == 2) { ?>fade active in<?php } ?>" id="krt">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-5">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-left: -3px;">
                                            <input type="text" class="form-control input" id="datepicker2" type="text" placeholder="Masukan Periode Awal" value="<?php echo $arr_bulan[date('n') - 1].' '. date('Y'); ?>">
                                            <!-- <input type="text" class="form-control input" id="datepicker2" type="text" placeholder="Masukan Periode Awal" value="<?php echo !empty($last_krt)? $arr_bulan[($last_krt['BULAN']) - 1].' '. $last_krt['TAHUN'] : ''; ?>"> -->
                                        </div>
                                    </td>
                                    <td>
                                        <button typt="button" class="btn btn-primary proses_selek" id="btn_krt" onclick="load_krt()" style="margin-bottom: 0px;">Proses</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="hide" id="loading_krt">
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
                    <div class="clearfix"></div>
                    <div id="get_data_krt"></div>
                </div>

                <div class="tab-pane" id="konsolidasi">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-5">
                        <!-- <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-left: -3px;">
                                        <select class="js-example-basic-single select-dua" id="tahun_konsolidasi" name="tahun_konsolidasi">
                                            <?php
                                            $tahun_sekarang = date('Y');
                                            for ($i=$tahun_sekarang; $i > ($tahun_sekarang - 20); $i--) {
                                                ?>
                                                <option value="<?php echo $i; ?>" <?php if($i == $tahun_sekarang){echo 'selected';} ?>><?php echo $i; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td><button typt="button" class="btn btn-primary proses_selek" id="btn_konsolidasi" onclick="load_konsolidasi()">Proses</button></td>
                            </tr>
                        </table> -->
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-left: -3px;">
                                        <input type="text" class="form-control input" id="datepicker3" type="text" placeholder="Masukan Periode Awal" value="<?php echo $arr_bulan[date('n') - 1].' '. date('Y'); ?>">
                                        <!-- <input type="text" class="form-control input" id="datepicker3" type="text" placeholder="Masukan Periode Awal" value="<?php echo !empty($last_konsolidasi)? $arr_bulan[($last_konsolidasi['BULAN']) - 1].' '. $last_konsolidasi['TAHUN'] : ''; ?>"> -->
                                    </div>
                                </td>
                                <td>
                                    <button typt="button" class="btn btn-primary proses_selek" id="btn_konsolidasi" onclick="load_konsolidasi()" style="margin-bottom: 0px;">Proses</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="hide" id="loading_konsolidasi">
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
                <div class="clearfix"></div>
                <div id="get_data_konsolidasi"></div>
            </div>
        </div>
    </div>

</div>
</section>

<style type="text/css">
    .dash_surya .kotak:hover > img{
        -webkit-animation: swing 1s ease;
        animation: swing 1s ease;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
    }

    /* Hover */
    @-webkit-keyframes swing
    {
        15%
        {
            -webkit-transform: translateY(2px);
            transform: translateY(2px);
        }
        30%
        {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
        }
        50%
        {
            -webkit-transform: translateY(2px);
            transform: translateY(2px);
        }
        65%
        {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
        }
        80%
        {
            -webkit-transform: translateY(2px);
            transform: translateY(2px);
        }
        100%
        {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    }
    @keyframes swing
    {
        15%
        {
            -webkit-transform: translateY(2px);
            transform: translateY(2px);
        }
        30%
        {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
        }
        50%
        {
            -webkit-transform: translateY(2px);
            transform: translateY(2px);
        }
        65%
        {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
        }
        80%
        {
            -webkit-transform: translateY(2px);
            transform: translateY(2px);
        }
        100%
        {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    }
    /* Hover */
</style>
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    var y = new Date();
    var start_year = (y.getFullYear()) - 19;
    var end_year = (y.getFullYear()) + 1;

    $(document).ready(function() {
        $("#tahun_bna").select2();
        $("#tahun_krt").select2();
        $("#tahun_konsolidasi").select2();

        var field_bna = document.getElementById('datepicker1'),
        bulan = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        // bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        var disable = false, picker_bna = new Pikaday({
            field:field_bna,
            firstDay: 1,
            minDate: new Date(start_year, 0, 1),
            maxDate: new Date(end_year, 12, 31),
            yearRange: [start_year,end_year],
            format: 'MMMM YYYY',
            onDraw: function(date) {
                // console.log(date.calendars[0]);
                var a = date.calendars[0];
                field_bna.value = bulan[a.month]+ ' ' +a.year;

            }
        });

        var field_krt = document.getElementById('datepicker2');
        var disable = false, picker_krt = new Pikaday({
            field:field_krt,
            firstDay: 1,
            minDate: new Date(start_year, 0, 1),
            maxDate: new Date(end_year, 12, 31),
            yearRange: [start_year,end_year],
            format: 'MMMM YYYY',
            onDraw: function(date) {
                // console.log(date.calendars[0]);
                var a = date.calendars[0];
                field_krt.value = bulan[a.month]+ ' ' +a.year;

            }
        });

        var field_konsolidasi = document.getElementById('datepicker3');
        var disable = false, picker_konsolidasi = new Pikaday({
            field:field_konsolidasi,
            firstDay: 1,
            minDate: new Date(start_year, 0, 1),
            maxDate: new Date(end_year, 12, 31),
            yearRange: [start_year,end_year],
            format: 'MMMM YYYY',
            onDraw: function(date) {
                // console.log(date.calendars[0]);
                var a = date.calendars[0];
                field_konsolidasi.value = bulan[a.month]+ ' ' +a.year;

            }
        });

        var init_kota = "<?php echo $kota; ?>"
        if(init_kota == "1"){
        load_bna();
        }else{
          load_krt();
        }
    });

    function load_bna() {
        var id_kota = 1,
        group = 'A',
        branch = '0000',
        btn = "#btn_bna",
        loader = '#loading_bna',
        month_year = $('#datepicker1').val().split(' '),
        year = month_year[1];
        month = month_year[0];

        if(month_year == ''){
            year = 0;
            month = 0;
        }

        $('#get_data_bna').html('');
        $(btn).attr('disabled', '').removeAttr('onclick');
        $(btn).html('Processing..').attr('disabled', '').removeAttr('onclick');
        $(loader).removeClass('hide');

        $.ajax({
            type:"POST",
            url:base_url+"beranda/get_graph_data",
            data: {year:year, month:month, id_kota:id_kota, group:group, branch:branch},
            beforeSend:function() {
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#get_data_bna').html(obj.data);
                    // console.log(obj.data);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            },
            complete:function() {
                window.onbeforeunload = false;
                $(btn).html('Proses').attr('onclick', 'load_bna()').removeAttr('disabled');
                $(loader).addClass('hide');
            }
        });
    }

    function load_krt() {
        var id_kota = 2,
        group = 'A',
        branch = '0000',
        year = '2017',
        // year = $('#tahun_krt').val(),
        btn = "#btn_krt",
        loader = '#loading_krt',
        month_year = $('#datepicker2').val().split(' '),
        year = month_year[1];
        month = month_year[0];

        if(month_year == ''){
            year = 0;
            month = 0;
        }

        $('#get_data_krt').html('');
        $(btn).html('Processing..').attr('disabled', '').removeAttr('onclick');
        $(loader).removeClass('hide');

        $.ajax({
            type:"POST",
            url:base_url+"beranda/get_graph_data",
            data: {year:year, month:month, id_kota:id_kota, group:group, branch:branch},
            beforeSend:function() {
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#get_data_krt').html(obj.data);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            },
            complete:function() {
                window.onbeforeunload = false;
                $(btn).html('Proses').attr('onclick', 'load_krt()').removeAttr('disabled');
                $(loader).addClass('hide');
            }
        });
    }

    function load_konsolidasi() {
        var id_kota = 'all',
        group = 'A',
        branch = '0000',
        year = $('#tahun_konsolidasi').val(),
        btn = "#btn_konsolidasi",
        loader = '#loading_konsolidasi',
        month_year = $('#datepicker3').val().split(' '),
        year = month_year[1];
        month = month_year[0];

        if(month_year == ''){
            year = 0;
            month = 0;
        }

        $('#get_data_konsolidasi').html('');
        $(btn).html('Processing..').attr('disabled', '').removeAttr('onclick');
        $(loader).removeClass('hide');

        $.ajax({
            type:"POST",
            url:base_url+"beranda/get_graph_data",
            data: {year:year, month:month, id_kota:id_kota, group:group, branch:branch},
            beforeSend:function() {
                preventLeaving();
            },
            success:function(msg){
                window.onbeforeunload = false;
                var obj = jQuery.parseJSON(msg);
                if(obj.status == 'OK') {
                    $('#get_data_konsolidasi').html(obj.data);
                }else{
                    swal("OOPS!", obj.msg, "error");
                }
            },
            complete:function() {
                window.onbeforeunload = false;
                $(btn).html('Proses').attr('onclick', 'load_konsolidasi()').removeAttr('disabled');
                $(loader).addClass('hide');
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
    .pika-table {
        display: none;
    }
</style>
