<?php 
$kota = $this->session->userdata('kota');
?>

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
							<h1>Tambah Data Bagan Struktur Modal</h1>
							<p>Isilah form dibawah ini untuk menambahkan data bagan struktur modal.</p>
							<ol class="breadcrumb">
								<li><a href="<?php echo site_url();?>">Beranda</a></li>
								<li><a href="javascript:void(0)">Company Profile</a></li>
								<li class="active">Bagan Struktur Modal</li>
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
								<div class="tab-content p-20" style="padding-bottom: 0px !important;">
									<div class="tab-pane fadeIn <?php echo $active_a ?>" id="bna">
										<form action="<?php echo site_url();?>/struktur/save_foto/1" method="post" enctype="multipart/form-data" >
											<div class="row">
												<div class="col-md-6">
													<div class="slider_gambar">
														<?php
														//var_dump($data[0]['STRUKTUR_ORGANISASI']);
														if ($data[0]['STRUKTUR_ORGANISASI']==''){
															?>
															<div class="fiks"><img id="blah" src="<?php echo base_url();?>assets/img/default.jpg"/></div>
															<?php
														}else{  
															echo '<div class="fiks"><img id="blah" src="'.base_url('watch/struktur?id=1&source='.$data[0]['STRUKTUR_ORGANISASI']).'"/></div>';
														// echo '<div class="fiks"><img id="blah" src="'.base_url().'ffdwjws/struktur/'.md5('1').'/'.$data[0]['STRUKTUR_ORGANISASI'].'"/></div>';
														} 
														?>

													</div>
												</div>
												<div class="col-md-6 bna">
													<h1>Upload Bagan Banjarnegara</h1>
													<p class="sub_judul">
														Silahkan upload gambar terkait bagan struktur organisasi <b>Banjarnegara</b> terkait aplikasi <b>BPR Surya Yudha</b> pada inputan dibawah ini !
													</p>
													<div class="form-group is-empty">
														<div class="input-group" style="width: 100%;">
															<input type="file" class="form-control" placeholder="Upload Gambar" name="file" accept=".jpg, .jpeg, .png">
															<div class="input-group">
																<input type="text" readonly="" class="form-control" placeholder="Upload Gambar">
																<span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;">
																	<button type="button" class="btn btn-info btn-fab btn-fab-sm">
																		<i class="zmdi zmdi-attachment-alt"></i>
																	</button>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div style="float: right; padding-right: 30px; padding-bottom: 10px;">
													<button type="submit" class="btn btn-default oke" id="btn_save_pendidikan">Simpan</button>
												</div>
											</form>
										</div>
									</div>
									<div class="tab-pane fadeIn <?php echo $active_b ?>" id="krt">
										<form action="<?php echo site_url();?>/struktur/save_foto/2" method="post" enctype="multipart/form-data" >
											<div class="row">
												<div class="col-md-6">
													<div class="slider_gambar">
														<?php
													//var_dump($data[0]['STRUKTUR_ORGANISASI']);
														if ($data[1]['STRUKTUR_ORGANISASI']==''){
															?>
															<div class="fiks"><img id="blah" src="<?php echo base_url();?>assets/img/default.jpg"/></div>
															<?php 
														}else{  
															echo '<div class="fiks"><img id="blah" src="'.base_url().'ffdwjws/struktur/'.md5('2').'/'.$data[1]['STRUKTUR_ORGANISASI'].'"/></div>';
														} 
														?>
													</div>
												</div>
												<div class="col-md-6 wonosobo">
													<h1>Upload Bagan Wonosobo</h1>
													<p class="sub_judul">
														Silahkan upload gambar terkait bagan struktur organisasi <b>Wonosobo</b> terkait aplikasi <b>BPR Surya Yudha</b> pada inputan dibawah ini !
													</p>
													<div class="form-group is-empty">
														<div class="input-group" style="width: 100%;">
															<input type="file"  class="form-control" placeholder="Upload Gambar" name="file" accept=".jpg, .jpeg, .png">
															<div class="input-group">
																<input type="text" readonly="" class="form-control" placeholder="Upload Gambar">
																<span class="input-group-btn input-group-sm" style="padding: 0px 0px 0px 12px;">
																	<button type="button" class="btn btn-info btn-fab btn-fab-sm">
																		<i class="zmdi zmdi-attachment-alt"></i>
																	</button>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div style="float: right; padding-right: 30px; padding-bottom: 10px;">
												<button type="submit" class="btn btn-default oke" id="btn_save_pendidikan">Simpan</button>
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
	</div>
</section>

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