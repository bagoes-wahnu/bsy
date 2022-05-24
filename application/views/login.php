<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>Aplikasi Dashboard i-BSY</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/vendor.bundle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.bundle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-a.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,600" rel="stylesheet">
</head>

<body>
	<script src="<?php echo base_url();?>assets/js/vendor.bundle.js"></script>
	<script src="<?php echo base_url();?>assets/js/app.bundle.js"></script>

	<!-- <div class="atas">
		<div class="isi_atas">
            <span>APLIKASI DASHBOARD BANK SURYA YUDHA</span>
            <img class="pull-left" src="<?php echo base_url();?>assets/img/logo-new.png">
		</div>
        <div class="isi_atas" style="width:50%">
            <span>APLIKASI DASHBOARD BANK SURYA YUDHA</span>
            <img class="pull-right" src="<?php echo base_url();?>assets/img/logo-2.png" >
		</div>
	</div> -->

	<div class="row">
		<div class="col-lg-6 kiri">
			<div class="row">
				<div class="col-lg-6 text-left">
					<img class="img-logo" src="<?php echo base_url();?>assets/img/logo-new.svg">
				</div>
				<div class="col-lg-6 text-right">
					<img class="img-logo-bsy" src="<?php echo base_url();?>assets/img/sy.png">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<img class="img-illustrator" src="<?php echo base_url();?>assets/img/illustration.svg">
					<p><span class="red">Dashboard i-BSY</span> adalah aplikasi yang digunakan untuk <br/>memonitoring kinerja dari bank Surya Yudha, untuk mempermudah<br/> analisa dan pemetaan terhadap bank tersebut.</p>
				</div>
			</div>
		</div>
		<div class="col-lg-6 kanan">
			<span>MASUK APLIKASI</span>
			<p>Isilah Username dan Password Aplikasi Dashboard<br/> Bank Surya Yudha, dengan benar !</p><br/>
			<form action="<?php echo site_url('auth/login');?>" id="form-horizontal" method="post">
				<div class="form-group">
					<!-- <label class="control-label lbl">USERNAME : </label> -->
					<input id="userInput" type="text" name="username" placeholder="Masukan Username" data-rule-required="true" class="form-control" aria-required="true" autocomplete="off">
				</div>
				<div class="form-group mt-2">
					<!-- <label class="control-label lbl">PASSWORD : </label> -->
					<input id="passInput" type="password" name="password" placeholder="Masukan Password" data-rule-required="true" class="form-control" aria-required="true" autocomplete="off">
				</div>
				<div class="has-success">
					<div class="checkbox ceks">
						<label>
							<input type="checkbox" id="checkboxSuccess" value="option1">
							Ingat Selalu Akun Saya
						</label>
					</div>
				</div>
                <br/>


				<button type="submit" class="btn btn-default btn-block oke">
					LOGIN
				</button>
			</form>
			<!-- <div class="smal">
				Copyright 2017 - Aplikasi Dashboard Bank Surya Yudha
			</div> -->
		</div>
	</div>

	<!-- <div class="bawah">
		<div class="isi">
			Copyright © 2017 - <span>Aplikasi Dashboard Bank Surya Yudha</span>
		</div>
	</div> -->
	<?php
	if($this->session->flashdata('alerts')){
		$alerts = $this->session->flashdata('alerts');
    // var_dump($alerts);
		?>
		<script type="text/javascript">
			swal('Oops!!', '<?php echo $alerts[0][1]; ?>', 'error');
		</script>
		<?php
	}
	?>
</body>

</html>
