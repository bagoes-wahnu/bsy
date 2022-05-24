<!DOCTYPE html>
<html lang="en">
<?php
$role = $this->session->userdata('role');
$kota = $this->session->userdata('kota');
?>
 		  <!--  <option value="1">Admin</option>
                <option value="2">Kinerja Keuangan</option>
                <option value="3">Pembukuan</option>
                <option value="4">Personalia</option>
                <option value="5">Sekertaris</option>
                <option value="6">Android</option> -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<?php
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.
	?>
	<title>Aplikasi - Bank Surya Yudha</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vendor.bundle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.bundle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-a.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/home.css">

	<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.png');?>" />

	<!-- cssload-loader -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/loader/cssload-loader.css">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<script type="text/javascript">
		var baseUrl = '<?php echo base_url(); ?>';
		var siteUrl = '<?php echo site_url(); ?>';
	</script>
</head>

<body>


	<script src="<?php echo base_url();?>assets/js/vendor.bundle.js"></script>
	<script src="<?php echo base_url();?>assets/js/app.bundle.js"></script>

	<!-- App Wrapper -->
	<div id="app_wrapper">

		<!-- Top Menu Bar Wrapper -->
		<header id="app_topnavbar-wrapper">
			<nav role="navigation" class="navbar topnavbar">
				<div class="nav-wrapper">
					<ul class="nav navbar-nav pull-left left-menu">
						<li class="app_menu-open">
							<a href="javascript:void(0)" data-toggle-state="app_sidebar-left-open" data-key="leftSideBar">
								<i class="zmdi zmdi-menu"></i>
							</a>
						</li>
					</ul>
					<!-- <ul class="nav navbar-nav left-menu hidden-xs">
						<li>
							<table>
								<tr>
									<td><img src="<?php echo base_url();?>assets/img/logo_atas.png"></td>
									<td><div>Aplikasi Bank Surya Yudha.</div></td>
								</tr>
							</table>
						</li>
					</ul> -->
					<ul class="nav navbar-nav pull-right" style="margin-right:5vmin">
						<li>
							<a href="<?php echo site_url('auth/logout');?>">
								KELUAR
							</a>
						</li>
					</ul>
				</div>
				<form role="search" action="" class="navbar-form" id="navbar_form">
					<div class="form-group">
						<input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
						<i data-navsearch-close class="zmdi zmdi-close close-search"></i>
					</div>
					<button type="submit" class="hidden btn btn-default">Submit</button>
				</form>
			</nav>
		</header>
		<!--/ Top Menu Bar Wrapper -->

		<!-- Left Sidebar Menu -->
		<aside id="app_sidebar-left">
			<div id="logo_wrapper">
				<ul>
					<li class="logo-icon">
						<a href="<?php echo site_url();?>">
							<div class="logo">
								<img src="<?php echo base_url();?>assets/img/logo-new.svg">
							</div>
							<h1 class="brand-text">Surya Yudha</h1>
						</a>
					</li>
					<!-- <li class="menu-icon">
						<a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
							<i class="mdi mdi-backburger"></i>
						</a>
					</li> -->
				</ul>
			</div>
			<nav id="app_main-menu-wrapper" class="scrollbar">
				<div class="sidebar-inner sidebar-push">
					<ul class="nav nav-pills nav-stacked">
						<!-- <li class="sidebar-header">NAVIGATION</li> -->
						<?php if ($role==1){  ?>
						<li class="nav-dropdown">
							<a href="#"><img src="<?php echo base_url();?>assets/icons/icon-db.png"></img>  Master</a>
							<ul class="nav-sub">
								<!--
								<li><a href="<?php echo site_url('kota/grid');?>">Master Kota</a></li>
								<li><a href="<?php echo site_url('wilayah/grid');?>">Master Wilayah</a></li>
								<li><a href="<?php echo site_url('cabang/grid');?>">Master Cabang</a></li>
								-->

								<li><a href="<?php echo site_url('direksi/grid');?>">Master SDM</a></li>
								<li><a href="<?php echo site_url('jabatan/grid');?>">Master Kategori Jabatan</a></li>
								<li><a href="<?php echo site_url('kantor');?>">Master Kantor</a></li>
								<!-- <li><a href="<?php echo site_url('pendidikan/grid');?>">Master Pendidikan</a></li> -->
								<?php if($kota == 1) { ?>
								<li><a href="<?php echo site_url('user/grid/1');?>">Master User</a></li>
								<?php } else { ?>
								<li><a href="<?php echo site_url('user/grid/2');?>">Master User</a></li>
								<?php } ?>
							</ul>
						</li>
						<?php } ?>

						<li class="nav-dropdown">
							<a href="#"><img src="<?php echo base_url();?>assets/icons/icon-bank.png"></img>  Company Profile</a>
							<ul class="nav-sub">
								<?php if (($role==1) || ($role==3)){  ?>
								<li><a href="<?php echo site_url('struktur/struk');?>">Struktur Modal</a></li>
								<?php } ?>
								<?php if (($role==1) || ($role==4)){  ?>
								<li><a href="<?php echo site_url('struktur/bagan');?>">Bagan Struktur Organisasi</a></li>
								<?php } ?>
								<?php if (($role==1) || ($role==4)){  ?>
								<li><a href="<?php echo site_url('struktur_organisasi/grid');?>">Pengurus & Pejabat Eksekutif</a></li>
								<?php } ?>
								<?php if (($role==1) || ($role==5)){  ?>
								<?php if($kota == 1) { ?>
								<li><a href="<?php echo site_url('wilayah/grid_baru/1');?>">Jaringan Kantor</a></li>
								<?php } else { ?>
								<li><a href="<?php echo site_url('wilayah/grid_baru/2');?>">Jaringan Kantor</a></li>
								<?php } ?>
								<?php } ?>
								<?php if (($role==1) || ($role==4)){  ?>
								<li><a href="<?php echo site_url('pendidikan/sdm');?>">SDM Profil</a></li>
								<?php } ?>
								<?php if (($role==1) || ($role==3)){  ?>
								<li><a href="<?php echo site_url('linkage/grid');?>">Linkage Program</a></li>
								<?php } ?>
								<?php if (($role==1) || ($role==5)){  ?>
								<li><a href="<?php echo site_url('award/grid');?>">Award</a></li>
								<?php } ?>

							</ul>
						</li>
						<?php if (($role==1) || ($role==2)){  ?>
						<li><a href="<?php echo site_url('beranda');?>"><img src="<?php echo base_url();?>assets/icons/icon-rocket.png"></img>  Kinerja Keuangan</a></li>
						<?php } ?>
						<?php if (($role==1) || ($role==2)){  ?>
						<li><a href="<?php echo site_url('produk');?>"><img src="<?php echo base_url();?>assets/icons/icon-bio.png"></img>  Produk</a></li>
						<?php } ?>
						<!--
							<li><a href="<?php echo site_url('Tocify');?>"><i class="zmdi zmdi-view-list-alt"></i>Tocify</a></li>
						-->
						<!-- <li><a href="<?php echo site_url('import');?>"><img src="<?php echo base_url();?>assets/icons/icon-download.png"></img>  Import Kinerja Keuangan</a></li> -->

						<li class="nav-dropdown">
							<a href="#"><img src="<?php echo base_url();?>assets/icons/icon-download.png"></img>  Import Kinerja Keuangan</a>
							<ul class="nav-sub">
								<li><a href="<?php echo site_url('import/keuangan_target');?>">Target</a></li>
								<li><a href="<?php echo site_url('import/keuangan_realisasi');?>">Realisasi</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</aside>
		<!--/ Left Sidebar Menu -->

		<!-- Main Content Wrapper -->
		<?php
			echo $content;
		?>
		<!--/ Main Content Wrapper -->
	</div>
</body>
</html>
