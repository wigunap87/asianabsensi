<html>
	<head>
		<title>Asian Accessory Absensi System</title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- CSS Here -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-login.css" />
		
		<!-- Javascript Here -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tools.min.js"></script>
	</head>
	
	<body>
		<div id="container">
			<div id="content">
				<div class="content-head">
					<div class="ch-left">
						<img src="<?php echo base_url(); ?>assets/images/logo-green.png" alt="Asian Accessory New Manage" />
					</div>
					<!--<div class="ch-right"><img src="assets/images/icon-keys.png" alt="Sign In" title="Sign In" /></div>-->
					<div class="ch-right2">Sistem Absensi</div>
					<div class="clear"></div>
				</div>
				<div class="content-cont">
					<form method="post" action="<?php echo base_url(); ?>main/adminlogin" name="login" id="login" autocomplete="off" data-toggle="validator">
					<div class="cc-form">
						<div class="field">
							<div class="field-title">Email</div>
							<div class="field-info"><input type="text" name="_email" maxlength="30" required /></div>
							<div class="clear"></div>
						</div>
						<div class="fields">
							<div class="field-title">Password</div>
							<div class="field-info"><input type="password" name="_passwd" maxlength="20" required /></div>
							<div class="clear"></div>
						</div>
						<?php 
							echo $this->session->flashdata('loginadmin'); 
						?>
					</div>
					<div class="cc-submit">
						<div class="ccs-left">Powered by <a href="http://asian-accessory.com">asian-accessory.com</a> 2017</div>
						<div class="ccs-right"><input type="submit" name="submit" value="Sign In" /></div>
						<div class="clear"></div>
					</div>
					</form>
				</div>
			</div> <!-- End of content -->
		</div> <!-- End of Container -->
	</body>
</html>