<script src="<?php echo base_url();?>assets/js/jquery.masknumber.js"></script>
<style>
article, aside, figure, footer, header, hgroup, menu, nav, section { display: block; }

.slider_gambar{margin-bottom: 15px;}

.slider_gambar .fiks{
	position: relative;
	width: 100%;
	height: 400px;
	overflow: hidden;
	background-color: #f5f5f5;
}

.slider_gambar .fiks img{
	position: absolute;
	top: -9999px;
	left: -9999px;
	right: -9999px;
	bottom: -9999px;
	margin: auto;
}

.radio{margin: 15px 0px;}
</style>
<?php 
$kota = $this->session->userdata('kota');
?>
<script type="text/javascript">
	// function readURL(input) {
 //        if (input.files && input.files[0]) {
 //            var reader = new FileReader();

 //            reader.onload = function (e) {
 //                $('#blah')
 //                    .attr('src', e.target.result);
 //            };

 //            reader.readAsDataURL(input.files[0]);
 //        }
 //    }
</script>

<section id="content_outer_wrapper">
	<div id="content_wrapper" class="card-overlay">
		<div id="header_wrapper" class="header-md">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<header id="header">
							<h1>Tambah Data Struktur Modal</h1>
							<p>Isilah form dibawah ini untuk menambahkan data struktur modal.</p>
							<ol class="breadcrumb">
								<li><a href="<?php echo site_url();?>">Beranda</a></li>
								<li><a href="javascript:void(0)">Company Profile</a></li>
								<li class="active">Struktur Modal</li>
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
							<div class="card-body p-0">
								<div class="tabpanel">
									<ul class="nav nav-tabs">
										<?php if ($kota!=2){
											$active_a = 'active';
											$active_b = '';
										}else{
											$active_a = '';
											$active_b = 'active';
										}
										?>
										<?php if (($kota==0) || ($kota==1)): ?>
										<li class="<?php echo $active_a ?>">
											<a href="#bna" data-toggle="tab" aria-expanded="true">Banjarnegara</a>
										</li>
									<?php endif ?>
									<?php if (($kota==0) || ($kota==2)): ?>
									<li class="<?php echo $active_b ?>">
										<a href="#krt" data-toggle="tab" aria-expanded="true">Wonosobo</a>
									</li>
								<?php endif ?>

							</ul>
						</div>
						<form id="save_form">
							<div class="tab-content p-20" style="padding-bottom: 0px !important;">
								

								
								<div class="tab-pane fadeIn <?php echo $active_a ?>" id="bna">
									<div class="row">
										<div class="col-md-6 bna">
											<h1>Wilayah Banjarnegara</h1>
											<p class="sub_judul">
												Silahkan mengisi data terkait modal inti, modal pelengkap dan total modal pada wilayah Bagian Banjarnegara !
											</p>
											<?php
											$modal_inti = $data[0]['MODAL_INTI'];
											// $modal_inti = helpCurrency($data[0]['MODAL_INTI'], '');
											$modal_inti = explode(',', $modal_inti);
											$modal_inti = $modal_inti[0];

											$modal_plk = $data[0]['MODAL_PELENGKAP'];
											// $modal_plk = helpCurrency($data[0]['MODAL_PELENGKAP'], '');
											$modal_plk = explode(',', $modal_plk);
											$modal_plk = $modal_plk[0];

											$modal_total = $data[0]['TOTAL_MODAL'];
											// $modal_total = helpCurrency($data[0]['TOTAL_MODAL'], '');
											$modal_total = explode(',', $modal_total);
											$modal_total = $modal_total[0];
											?>
											<div class="form-group">
												<label class="control-label lbl">Modal Inti : </label>
												<input id="mod_inti_1" type="text" name="mod_inti_1" min="0" value="<?php echo $modal_inti;?>" placeholder="Masukan Modal Inti" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
											</div>
											<div class="form-group">
												<label class="control-label lbl">Modal Pelengkap : </label>
												<input id="mod_pelengkap_1" type="text" name="mod_pelengkap_1" min="0" value="<?php echo $modal_plk;?>" placeholder="Masukan Modal Pelengkap" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
											</div>
											<div class="form-group">
												<label class="control-label lbl">Total Modal : </label>
												<input id="tot_modal_1" type="text" name="tot_modal_1" min="0" value="<?php echo $modal_total;?>" placeholder="Masukan Total Modal" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fadeIn <?php echo $active_b ?>" id="krt">
									<div class="row">
										<div class="col-md-6 wonosobo">
											<h1>Wilayah Wonosobo</h1>
											<p class="sub_judul">
												Silahkan mengisi data terkait modal inti, modal pelengkap dan total modal pada wilayah Bagian Wonosobo !
											</p>
											<?php
											$modal_inti2 = $data[1]['MODAL_INTI'];
											// $modal_inti2 = helpCurrency($data[0]['MODAL_INTI'], '');
											$modal_inti2 = explode(',', $modal_inti2);
											$modal_inti2 = $modal_inti2[0];

											$modal_plk2 = $data[1]['MODAL_PELENGKAP'];
											// $modal_plk2 = helpCurrency($data[0]['MODAL_PELENGKAP'], '');
											$modal_plk2 = explode(',', $modal_plk2);
											$modal_plk2 = $modal_plk2[0];

											$modal_total2 = $data[1]['TOTAL_MODAL'];
											// $modal_total2 = helpCurrency($data[0]['TOTAL_MODAL'], '');
											$modal_total2 = explode(',', $modal_total2);
											$modal_total2 = $modal_total2[0];
											?>
											<div class="form-group">
												<label class="control-label lbl">Modal Inti : </label>
												<input id="mod_inti_2" type="text" name="mod_inti_2" placeholder="Masukan Modal Inti" data-rule-required="true" class="form-control input" value="<?php echo $modal_inti2;?>" aria-required="true" autocomplete="off">
											</div>
											<div class="form-group">
												<label class="control-label lbl">Modal Pelengkap : </label>
												<input id="mod_pelengkap_2" type="text" name="mod_pelengkap_2" value="<?php echo $modal_plk2;?>" placeholder="Masukan Modal Pelengkap" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
											</div>
											<div class="form-group">
												<label class="control-label lbl">Total Modal : </label>
												<input id="tot_modal_2" type="text" name="tot_modal_2" value="<?php echo $modal_total2;?>" placeholder="Masukan Total Modal" data-rule-required="true" class="form-control input" aria-required="true" autocomplete="off">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div style="float: right; padding-right: 30px; padding-bottom: 10px;">
									<button type="button" class="btn btn-default oke" id="btn_save_pendidikan" onclick="save()">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</section>
<script type="text/javascript">
	$(document).ready(function () {
		$('[name=mod_inti_1]').maskNumber({integer: true,thousands: '.'});
		$('[name=mod_pelengkap_1]').maskNumber({integer: true,thousands: '.'});
		$('[name=tot_modal_1]').maskNumber({integer: true,thousands: '.'});
		$('[name=mod_inti_2]').maskNumber({integer: true,thousands: '.'});
		$('[name=mod_pelengkap_2]').maskNumber({integer: true,thousands: '.'});
		$('[name=tot_modal_2]').maskNumber({integer: true,thousands: '.'});

	});
	function save()
	{
		var	mod_inti_1			=  $("#mod_inti_1").val();
		var	mod_pelengkap_1		=  $("#mod_pelengkap_1").val();
		var	tot_modal_1			=  $("#tot_modal_1").val();
		var	mod_inti_2			=  $("#mod_inti_2").val();
		var	mod_pelengkap_2		=  $("#mod_pelengkap_2").val();
		var	tot_modal_2			=  $("#tot_modal_2").val(); 
		if ((mod_inti_1<0) || (mod_pelengkap_1<0) || (tot_modal_1<0) || (mod_inti_2<0) || (mod_pelengkap_2<0) || (tot_modal_2<0)) {
			alertify.error('Data tidak boleh kurang dari nol !');
		}else{
			$.ajax({
				type    : "POST",
				data    : {mod_inti_1 : mod_inti_1, mod_pelengkap_1 : mod_pelengkap_1, tot_modal_1 : tot_modal_1, mod_inti_2 : mod_inti_2, mod_pelengkap_2 : mod_pelengkap_2, tot_modal_2 : tot_modal_2},
				url     : "<?php echo site_url('struktur/save_struktur_modal') ?>",
				success: function(data){
					alertify.success('Data Berhasil Disimpan !');

				},
				error : function(data){
				}
			});
		}
	}
</script>
<style type="text/css">
.sub_judul{
	font-family: 'Poppins', sans-serif;
	font-size: 14px;
	margin-bottom: 0px;
	line-height: 22px;
	margin-bottom: 15px;
}

.bna h1,
.wonosobo h1{
	font-family: 'Montserrat', sans-serif;
	color: #e74c3c;
	letter-spacing: -0.7px;
	font-weight: bold;
	margin-top: 0px;
}
</style>