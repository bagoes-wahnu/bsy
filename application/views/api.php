<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Dokumentasi API - Aplikasi QC</title>

	<link rel="icon" href="<?php echo base_url();?>assets/neon/images/Asset 1.png">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">

	<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Raleway:500,600" rel="stylesheet">

	<!--[if lt IE 9]><script src="<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


	</head>
	<body class="page-body" data-url="http://neon.dev">

		<div class="page-container tosify">
			<div class="main-content">
				<ol class="breadcrumb bc-3" >
					<li>
						<a href="<?php echo base_url() ?>"><i class="fa-home"></i>Beranda</a>
					</li>
					<li class="active">
						<strong>Dokumentasi API</strong>
					</li>
				</ol>
				<h1>Dokumentasi API.</h1>
				<p>
					Berikut ini adalah informasi seputar dokumentasi API terkait Aplikasi QC (Quality Control)
				</p>

				<div class="row">
					<div class="col-md-3">
						<div id="toc"></div>
					</div>

					<div class="col-md-9 tocify-content">

						<h2>Pendahuluan</h2>

						<p>
							API - QCA merupakan <i>middleware</i> dari <strong>Quality Control Application</strong> agar dapat digunakan di platform lain layaknya <i>Android</i>.
						</p>

						<br />

						<h2>Tipe-tipe Kembalian</h2>

						<p>
							Setiap transaksi menggunakan API pada Aplikasi QC akan ada respon berupa <code>json</code> yang berisi <code>status</code> dimana status ini memiliki beberapa tipe sebagai berikut:
						</p>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Tipe Status</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><code>OK</code></td>
									<td>Proses transaksi berhasil</td>
								</tr>
								<tr>
									<td>2</td>
									<td><code>ERROR</code></td>
									<td>Proses transaksi tidak berhasil</td>
								</tr>
								<tr>
									<td>3</td>
									<td><code>DATA_ALREADY_EXIST</code></td>
									<td>Data yang diinputkan sudah ada di <i>database</i></td>
								</tr>
								<tr>
									<td>4</td>
									<td><code>NOT_FOUND</code></td>
									<td>Data yang diminta tidak ditemukan</td>
								</tr>
								<tr>
									<td>5</td>
									<td><code>DATA_IS_REQUIRED</code></td>
									<td>Data yang dikirim, wajib diisi semua</td>
								</tr>
								<tr>
									<td>6</td>
									<td><code>MISSING_KEY</code></td>
									<td><code>key</code> wajib diisi</td>
								</tr>
								<tr>
									<td>7</td>
									<td><code>ACCESS_DENIED</code></td>
									<td>Akses ditolak. Bisa disebabkan oleh beberapa alasan.<br>(1) <code>key</code> tidak sesuai dengan yang ada di <i>database</i>, atau (2) hak akses dari <code>key</code> tidak sesuai</td>
								</tr>
								<tr>
									<td>8</td>
									<td><code>PASSWORD_INCORRECT</code></td>
									<td>Password yang diinputkan tidak benar</td>
								</tr>
								<tr>
									<td>9</td>
									<td><code>ACCOUNT_INACTIVE</code></td>
									<td>Akun sudah di-non-atif-kan oleh <strong>Admin</strong></td>
								</tr>
							</tbody>
						</table>

						<br />

						<h2>API - Login</h2>

						<p>
							Transaksi <i>Login</i> merupakan transaksi autentikasi data untuk mengetahui jejak rekam pengguna. Adapun ketentuan yang harus dipenuhi dalam melakukan transaksi <i>Login</i>
						</p>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Parameter</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Auth/login</a></u></td>
									<td>Url untuk mengakses API</td>
								</tr>
								<tr>
									<td>2</td>
									<td><code>username</code></td>
									<td>Merupakan nama parameter yang harus dikirim beserta nilainya (username) dengan metode <code>POST</code></td>
								</tr>
								<tr>
									<td>3</td>
									<td><code>password</code></td>
									<td>Merupakan nama parameter yang harus dikirim beserta nilainya (password) dengan metode <code>POST</code></td>
								</tr>
								<tr>
									<td>4</td>
									<td><code>token</code></td>
									<td>Merupakan nama parameter yang harus dikirim beserta nilainya (token) dengan metode <code>POST</code> yang mana token merupakan hasil <i>generate</i> dari platform pengguna</td>
								</tr>
							</tbody>
						</table>	

						<br />

						<h2>API - Company Profile</h2>

						<p>
							Berikut ini adalah bagaimana cara menerapkan API Project pada salah satu project yang akan dikerjakan terkait Aplikasi Quality Control.
						</p>

						<h3>Mendapatkan List Struktur Modal dan Bagan Struktur Organisasi</h3>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Parameter</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Struktur_modal</a></u></td>
									<td>Url untuk mengakses API</td>
								</tr>
								<tr>
									<td>2</td>
									<td><code>key</code></td>
									<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
								</tr>
							</tbody>
						</table>

						<br>

						<h3>Mendapatkan Struktur Organisasi</h3>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Parameter</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Struktur_organisasi</a></u></td>
									<td>Url untuk mengakses API</td>
								</tr>
								<tr>
									<td>2</td>
									<td><code>key</code></td>
									<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
								</tr>
							</tbody>
						</table>

						<br />

						<h3>Mendapatkan List Wilayah Jaringan Kantor</h3>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Parameter</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Jaringan_kantor/</a></u></td>
									<td>Url untuk mengakses API</td>
								</tr>
								<tr>
									<td>2</td>
									<td><code>key</code></td>
									<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
								</tr>
								
						</tbody>
					</table>

					<br />

					<h3>Mendapatkan Jumlah Kantor Cabang dan Kas</h3>

					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Parameter</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Jaringan_kantor/jumlah_kantor</a></u></td>
								<td>Url untuk mengakses API</td>
							</tr>
							<tr>
								<td>2</td>
								<td><code>key</code></td>
								<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
							</tr>
							<tr>
								<td>3</td>
								<td><code>id_kota</code></td>
								<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_kota) dengan metode <code>POST</code></td>
							</tr>
							
						
					</tbody>
				</table>

				<br />

				<h3>Mendapatkan List Kantor Cabang</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Jaringan_kantor/get_cabang</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_wilayah</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_wilayah) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan List Kas</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Jaringan_kantor</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_cabang</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_cabang) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan SDM profil</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Sdm_profil</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_fitur</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_fitur) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan List Fitur</h3>
				<label style="color: #ee4749">
					Mendapatkan list fitur juga bisa dilakukan dengan mengakses API detail project
				</label>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/fitur</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_project</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_project) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan list semua Developer</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/developer</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan list Project Developer</h3>

				<label style="color: #ee4749">
					Mendapatkan list Project Developer juga bisa dilakukan dengan mengakses API detail project
				</label>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/developer/project</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_project</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_project) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Menambahkan Project Developer</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/developer/add_to_project</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_project</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_project) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>4</td>
							<td><code>id_developer</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (ID_USER) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Menghapus Project Developer</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/developer/remove_from_project</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_project</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_project) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>4</td>
							<td><code>id_developer</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (ID_USER) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h2>API - Testing</h2>

				<p>
					Berikut ini adalah bagaimana cara menerapkan API Testing pada salah satu project yang akan dikerjakan terkait Aplikasi Quality Control.
				</p>

				<h3>Mendapatkan List Testing</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/testing</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_project</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_project) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan Detail Testing</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/testing/detail</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_testing</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_testing) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Mendapatkan File Testing</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/testing/path_file</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_testing</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_testing) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h2>API - Notifikasi</h2>

				<p>
					Berikut ini adalah bagaimana cara menerapkan API Notofokasi pada salah satu project yang akan dikerjakan terkait Aplikasi Quality Control.
				</p>

				<h3>Mendapatkan List Notifikasi</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/notifikasi</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Memperbarui Notifikasi baru</h3>


				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/notifikasi/update_new</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_target_notif</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (ID_USER) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>

				<br>

				<h3>Tandai Sudah Dibaca</h3>

				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Parameter</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/aplikasi_qc/api/notifikasi/mark_read</a></u></td>
							<td>Url untuk mengakses API</td>
						</tr>
						<tr>
							<td>2</td>
							<td><code>key</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>3</td>
							<td><code>id_target_notif</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (ID_USER) dengan metode <code>POST</code></td>
						</tr>
						<tr>
							<td>4</td>
							<td><code>id_notif</code></td>
							<td>Merupakan nama parameter yang harus dikirim beserta nilainya (id_notif) dengan metode <code>POST</code></td>
						</tr>
					</tbody>
				</table>
				<hr>
			</div>

		</div>
	</div>
</div>

<!-- Bottom scripts (common) -->
<script src="<?php echo base_url();?>assets/js/gsap/TweenMax.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/joinable.js"></script>
<script src="<?php echo base_url();?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-api.js"></script>

<!-- Imported scripts on this page -->
<script src="<?php echo base_url();?>assets/js/tocify/jquery.tocify.min.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-chat.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url();?>assets/js/neon-custom.js"></script>

<!-- Demo Settings -->
<script src="<?php echo base_url();?>assets/js/neon-demo.js"></script>

</body>
</html>