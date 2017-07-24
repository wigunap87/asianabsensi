<html>
	<head>
		<meta name="viewport" content="initial-scale=1">
		<title><?php echo $title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- CSS Here -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tabs-accordion.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/calendar.css" />
		
		<!-- Javascript Here -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/highchart/highcharts.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/highchart/highcharts-3d.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/highchart/modules/exporting.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toggle.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tooltips.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/calendar.js"></script>
		
	</head>
	
	<body>
		<p id="back-top">
			<a href="#top"><span></span></a>
		</p>
		<div id="container">
			<div id="header">
				<div class="header-left"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Asian Accessory" title="Asian Accessory" height="33px" /></div>
				<div class="header-right">
					
					<!--<div class="hr1"><img src="<?php echo base_url(); ?>assets/images/cog.png" alt="Setting" title="Setting"/></div>
					<div class="hr2"><a href="#" title="Setting">Setting</a></div>-->
					
					<div class="hr3"><img src="<?php echo base_url(); ?>assets/images/193.png" alt="Logout" title="Logout"/></div>
					<div class="hr4"><a href="<?php echo base_url(); ?>main/logout" title="Logout">Logout</a></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div> <!-- End of header -->
			
			<div id="content">
				<div class="content-info">
					<div class="content-left">
						<div class="cl-top">
							<div class="clt-left"><img src="<?php echo base_url(); ?>assets/images/user.png" alt="user" /></div>
							<div class="clt-right">
								<h4><?php echo $this->session->userdata('userid'); ?></h4>
								Last Login : <?php echo date("d F Y H:i:s", $this->session->userdata('userlastlogin')); ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="content-right">
						<div class="cr-top">
							<div class="crt-left">
								<h4>Dashboard</h4>
								<div class="breadcrumb">
									<a href="<?php echo base_url(); ?>dashboard">Home</a> -&#187; <?php echo $name; ?>
								</div> <!-- End of breadcrumb -->
							</div>
							<div class="crt-right">
								<div class="content-menu">
									<ul>
										<li><a href='<?php echo base_url(); ?>dashboard'>Dashboard</a></li>
										<li><a href='<?php echo base_url(); ?>absensi/today'>Today Absensi</a></li>
										<li><a href='<?php echo base_url(); ?>absensi'>All Absensi</a></li>
										<li><a href='<?php echo base_url(); ?>worker'>List Worker</a></li>
										<li><a href='<?php echo base_url(); ?>report'>Report</a></li>
									</ul>
								</div>
							</div> <!-- End of crt-right -->
							<div class="clear"></div>
						</div> <!-- End of cr-top -->
					</div> <!-- End of content-right -->
					<div class="clear"></div>
				</div>
				
				
				<div class="content-text">
					
					<?php
						$this->load->view($content);
					?>
				</div> <!-- End of content-right -->
			</div>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function(){
				// hide #back-top first
				$("#back-top").hide();
				// fade in #back-top
				$(function () {
					$(window).scroll(function () {
						if ($(this).scrollTop() > 100) {
							$('#back-top').fadeIn();
						} else {
							$('#back-top').fadeOut();
						}
					});
					// scroll body to 0px on click
					$('#back-top a').click(function () {
						$('body,html').animate({
							scrollTop: 0
						}, 800);
						return false;
					});
				});
			});
		</script>
	</body>
</html>