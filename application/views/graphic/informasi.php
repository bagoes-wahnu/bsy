<script src="<?php echo base_url();?>assets/chart/dist/Chart.bundle.js"></script>
<script src="<?php echo base_url();?>assets/chart/samples/utils.js"></script>

<script src="<?php echo base_url();?>assets/pikaday/pikaday.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/pikaday/css/pikaday.css">

<section id="content_outer_wrapper">
  <div id="content_wrapper" class="card-overlay">
    <div id="header_wrapper" class="header-md">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <header id="header">
              <h1>Informasi Data Tabungan</h1>
              <p>Berikut ini adalah beberapa informasi data tabungan terkait aplikasi.</p>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url();?>">Beranda</a></li>
                <li class="active">Data Tabungan</li>
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
                                        <input type="text" class="form-control datepicker input" id="datepicker1" type="date" placeholder="Masukan Periode Awal">
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary proses_selek" style="margin-bottom: 0px;">Proses</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <p>Total Jumlah Nominal Data Tabungan : <span>Rp. 359.000.000,-</span></p>
              </header>
              <div class="card">
                <div class="card-body" style="padding-top: 0px;">
                	<div class="row" style="margin-bottom: 30px;">
	                	<div class="col-md-12">
		            		<canvas id="canvas" height="100"></canvas>
		            	</div>
	            	</div>
	            	<div class="row" style="margin-bottom: 30px;">
		            	<div class="col-md-6">
		            		<canvas id="chart-area" height="150" />
		            	</div>
		            	<div class="col-md-6">
		            		<h1>Informasi Data Chart</h1>
		            		<p>Berikut ini adalah data keterangan terkait diagram Pie Cart disamping.</p>
		            		<table>
		            			<tr>
		            				<td>Tabungan Surya</td>
		            				<td> : </td>
		            				<td>Rp. 2,93096E+11,-</td>
		            			</tr>
		            			<tr>
		            				<td>ATM Khusus</td>
		            				<td> : </td>
		            				<td>Rp. 8.012.268.971,-</td>
		            			</tr>
		            			<tr>
		            				<td>ATM Surya</td>
		            				<td> : </td>
		            				<td>Rp. 8.635.154.595,-</td>
		            			</tr>
		            			<tr>
		            				<td>Tabungan Pensiun</td>
		            				<td> : </td>
		            				<td>Rp. 19.358.568.272,-</td>
		            			</tr>
		            			<tr>
		            				<td>TAS</td>
		            				<td> : </td>
		            				<td>Rp. 62.779.432.190,-</td>
		            			</tr>
		            			<tr>
		            				<td>Tabungan KU</td>
		            				<td> : </td>
		            				<td>Rp. 7.467.832.738,-</td>
		            			</tr>
		            			<tr>
		            				<td>Tabungan Umroh</td>
		            				<td> : </td>
		            				<td>Rp. 1.633.792.838,-</td>
		            			</tr>
		            			<tr>
		            				<td>Tabungan Umum</td>
		            				<td> : </td>
		            				<td>Rp. 5.757.963.356,-</td>
		            			</tr>
		            			<tr>
		            				<td>Tabungan Simpel</td>
		            				<td> : </td>
		            				<td>Rp. 616.867.730,-</td>
		            			</tr>
		            		</table>
		            	</div>
		            </div>
	            </div>

	            <div class="modal-footer">
			      <a href="<?php echo site_url('Beranda');?>" class="btn btn-default" data-dismiss="modal">Kembali</a>
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
    var disable = false, picker = new Pikaday({
        field: document.getElementById('datepicker1'),
        firstDay: 1,
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020],
        
        showDaysInNextAndPreviousMonths: true,
        enableSelectionDaysInNextAndPreviousMonths: true
    });

    var color = Chart.helpers.color;
    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'Target - dalam satuan (Billiun)',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [12, 18, 16, 8, 11, 15, 12, 9, 9, 8, 4, 11]
        }, {
            label: 'Realisasi - dalam satuan (Billiun)',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [12, 19, 10, 7, 9, 11, 12, 9, 7, 5, 10, 8]
        }]

    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [12, 19, 10, 7, 9, 11, 12, 9, 7],
                backgroundColor: ['#e74c3c', '#e67e22', '#f1c40f', '#9b59b6', '#3498db', '#2ecc71', '#1abc9c', '#34495e', '#7f8c8d'],
                label: 'Dataset 1'
            }],
            labels: [
                "Tab Surya",
                "ATM Khusus",
                "ATM Surya",
                "Tab Pensiun",
                "TAS",
                "Tab KU",
                "Tab Umroh",
                "THT Umum",
                "Tab Simpel"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                }
            }
        });

        var ctx2 = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx2, config);
    };
</script>

<style type="text/css">
	.card .card-heading p{padding-bottom: 0px;}

	.row .col-md-6 h1{
		margin-top: 0px;
		font-family: 'Montserrat', sans-serif;
		margin-bottom: 0px;
		letter-spacing: -0.3px;
	}

	.row .col-md-6 p{
		font-family: 'Poppins', sans-serif;
		letter-spacing: -0.2px;
		font-size: 14px;
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