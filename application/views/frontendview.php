<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="author" content="http://asian-accessory.com" />
		<title>Frontend Absensi</title>
		
		<!-- Load Favicon -->
		<link rel="shorcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-57x57-iphone.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72-ipad.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114-iphone4.png" />
		
		<!-- Load CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/frontend.css" />
		
		<!-- Load Jquery -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	</head>
	
	<body ng-app="myApp">
		<div id="content">
			<div class="content-content">
				<div class="content-images">
					<img src="<?php echo base_url(); ?>assets/images/logo-asian.png" alt="Asian Accessory" />
				</div>
				<div class="content-form" ng-controller="myController">
					{{errorMsg}}
					<form name="myForm" novalidate>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Barcode ID</span>
							<input type="text" class="form-control" ng-model="modelbarcode" name="barcodeid" aria-describedby="basic-addon1" required />
						</div>
						<!--<br/>
						<input type="submit" name="submit" value="Submit" class="btn btn-info" />-->
					</form>
				</div>
				<div class="alert alert-info notes" role="alert" align=center>
					Tampilan di atas merupakan salah satu media untuk menginputkan data absensi pegawai yang didapat dari scan barcode dan otomatis langsung insert ke dalam database.
					Sebagai catatan, jika jam menunjukkan di bawah pukul 12.00, maka akan masuk absensi pagi dan tidak akan terjadi double data.
				</div>
			</div>
		</div>
		<div id="footer">
			Copyright &copy; 2017. Asian Accessory. Sistem Absensi versi 1.0
		</div>
	</body>
</html>