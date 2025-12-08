<?php
if($this->session->userdata('id_users')=='')
{
    redirect('auth/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />

	<title>Home | SPD</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>xenon/images/favicon.png"/>
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-core.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-components.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-skins.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-my.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/custom.css">
	

	<script src="<?php echo base_url();?>xenon/js/jquery-1.11.1.min.js"></script>
	<style>
		.title { color:#000;font-weight:bold;}
		.navbar-nav li a:hover {background-color:#F5F5F5;}
		
		.panel-title{font-weight:bold;}
		.active a {background-color:#F5F5F5;border-bottom:solid 1px #DDDDDD;}
		.active .title {color:#95c54e;}
	</style>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body" style="background-color:#FFF;">
	<nav class="navbar horizontal-menu navbar-minimal" style="background-color:#F5F5F5;border-bottom:solid 1px #DDDDDD;"><!-- set fixed position by adding class "navbar-fixed-top" -->
		<div class="navbar-inner">
			<!-- Navbar Brand -->
			<div class="navbar-brand">
				<a href="<?php echo site_url('dashboard');?>" class="logo">
					<img src="<?php echo base_url();?>xenon/images/logo_bulog.png" width="100" alt="" class="hidden-xs" />
					<img src="<?php echo base_url();?>xenon/images/logo_bulog.png" width="100" alt="" class="visible-xs" />
				</a>
			</div>
			<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<a href="#" data-toggle="user-info-menu-horizontal">
						<i class="fa-bell-o"></i>
						<span class="badge badge-success">7</span>
					</a>
					<!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
					<!-- data-toggle="mobile-menu" will show sidebar menu links only -->
					<!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
					<a href="#" data-toggle="mobile-menu-horizontal">
						<i class="fa-bars"></i>
					</a>
				</div>
			</div>
			<div class="navbar-mobile-clear"></div>
			<!-- main menu -->
			<ul class="navbar-nav nav-userinfo nav ">
				<li class="<?php //echo ($activeTab=="dashboard")?"active":""; ?>">
					<a href="<?php echo site_url('dashboard');?>" class="notification-icon">
						<i class="fa-bookmark-o"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url('sppd');?>" class="notification-icon">
						<i class="fa-circle-o-notch"></i>
						<span class="title">SPPD</span>
					</a>
				</li>
				<li>
					<a href="#" class="notification-icon">
						<i class="fa-file-o"></i>
						<span class="title">SKPD</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo site_url('request_skpd');?>">
								<i class="fa-check"></i>
								<span class="title">Permintaan SKPD</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('skpd');?>">
								<i class="fa-usd"></i>
								<span class="title">Lihat SKPD</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo site_url('notaintern');?>" class="notification-icon">
						<i class="fa-lemon-o"></i>
						<span class="title">NOTA INTERN</span>
					</a>
				</li>
				<li>
					<a href="#" class="notification-icon">
						<i class="fa-bars"></i>
						<span class="title">Master</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo site_url('users');?>">
								<i class="fa-user"></i>
								<span class="title">User Aplikasi</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa-user-md"></i>
								<span class="title">Pelaksana</span>
							</a>
							<ul>
								<li>
									<a href="<?php echo site_url('pegawai');?>">
										<span class="title">Pegawai</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('pengikut');?>">
										<span class="title">Pengikut</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('pengemudi');?>">
										<span class="title">Pengemudi</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="fa-money"></i>
								<span class="title">Biaya</span>
							</a>
							<ul>
								<li>
									<a href="<?php echo site_url('golongan');?>">
										<span class="title">Golongan & Biaya</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('repres');?>">
										<span class="title">Uang Repres.</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('bahanbakar');?>">
										<span class="title">Bahan Bakar</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="fa-gear"></i>
								<span class="title">Setting</span>
							</a>
							<ul>
								<li>
									<a href="<?php echo site_url('setting');?>">
										<span class="title">Setting</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('ttd');?>">
										<span class="title">TTD</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('unitkerja');?>">
										<span class="title">Unit Kerja</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('lokasi');?>">
										<span class="title">Lokasi</span>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('pagu');?>">
										<span class="title">PAGU</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo site_url('hitung_jarak');?>" class="notification-icon">
						<i class="fa-car"></i>
						<span class="title">Hitung Jarak</span>
					</a>
				</li>
				<li>
					<a href="#" class="notification-icon">
						<i class="fa-lemon-o"></i>
						<span class="title">Laporan</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo site_url('rekap_skpd');?>">
								<i class="fa-file-excel-o"></i>
								<span class="title">Rekap SKPD</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('laporan');?>">
								<i class="fa-file-excel-o"></i>
								<span class="title">Rekap Faks & Akomodasi Tamu</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('rekap_pajak');?>">
								<i class="fa-file-excel-o"></i>
								<span class="title">Rekap Pajak</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('rekap_bbm');?>">
								<i class="fa-car"></i>
								<span class="title">Rekap BBM</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
					
			<!-- notifications and other links -->
			<ul class="nav nav-userinfo navbar-right">
				<li class="dropdown xs-left">
					<a href="#" data-toggle="dropdown" class="notification-icon notification-icon-messages">
						<i class="fa-bell-o"></i>
						<span class="badge badge-purple"></span>
					</a>
						
					<ul class="dropdown-menu notifications">
						<li class="top">
							<p class="small">
								<a href="#" class="pull-right">Mark all Read</a>
								You don't have <strong></strong> new notifications.
							</p>
						</li>
					</ul>
				</li>
		
				<li class="dropdown user-profile">
					<a href="#" data-toggle="dropdown">
						<img src="<?php echo base_url();?>xenon/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span>
							<?php echo ucwords($this->session->userdata('username'));?>
							<i class="fa-angle-down"></i>
						</span>
					</a>
					<ul class="dropdown-menu user-profile-menu list-unstyled">
						<li>
							<a href="<?php echo site_url('users/profile');?>" style="color:#000;">
								<i class="fa-user"></i>
								Akun
							</a>
						</li>
						<li class="last">
							<a href="<?php echo site_url('auth/logout');?>" style="color:#000;">
								<i class="fa-lock"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<?php echo $contents; ?> 
	</div>
	
	<div style="border-top:solid 1px #B7B7B7;">
		<!-- Add your copyright text here -->
		<div class="footer-text" style="float:left; padding:10px;">
			&copy; 2020 
			<strong>Sekumhum | Kanwil Jabar.</strong>
		</div>
		<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
		<div class="go-up" style="float:right; padding:10px;">
			<a href="#" rel="go-top">
				<i class="fa-angle-up"></i>
			</a>
		</div>
	</div>
	
	<!-- Bottom Scripts -->
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/js/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/js/select2/select2.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/js/multiselect/css/multi-select.css">
	
	<script src="<?php echo base_url();?>xenon/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/resizeable.js"></script>
	<script src="<?php echo base_url();?>xenon/js/joinable.js"></script>
	<script src="<?php echo base_url();?>xenon/js/xenon-api.js"></script>
	<script src="<?php echo base_url();?>xenon/js/xenon-toggles.js"></script>
	<script src="<?php echo base_url();?>xenon/js/moment.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/datatables/dataTables.fixedColumns.min.js"></script>
	
	<script src="<?php echo base_url();?>xenon/js/datatables/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url();?>xenon/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
	<script src="<?php echo base_url();?>xenon/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
	
	<script src="<?php echo base_url();?>xenon/js/inputmask/jquery.inputmask.bundle.js"></script>
	
	<script src="<?php echo base_url();?>xenon/js/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>xenon/js/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>xenon/js/select2/select2.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/typeahead.bundle.js"></script>
	<script src="<?php echo base_url();?>xenon/js/handlebars.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/multiselect/js/jquery.multi-select.js"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url();?>xenon/js/xenon-custom.js"></script>
</body>
</html>