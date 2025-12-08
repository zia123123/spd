<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />

	<title>SPD | Log in</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>xenon/images/favicon.png"/>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-core.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-components.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-skins.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/custom.css">
	<link rel="stylesheet" href="<?php echo base_url();?>xenon/css/xenon-my.css">
	
	<script src="<?php echo base_url();?>xenon/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-light">
	<!--<div style="margin:0px auto;float:center;width:40%;"> -->
	
	<div class="" style="border:solid 0px #000;">
		
		<table border="0" width="100%">
		<tr>
			<td width="35%"> &nbsp; </td>
			<td>
			<!-- Errors container -->
			<div class="errors-container">	
					<?php if (isset($message)) echo '<div class="alert alert-danger" style="width:100%;line-height:15px;">'.$message.'</div>'; ?>
			</div>
		
		
			<!-- Add class "fade-in-effect" for login form effect -->
			<form method="post" action="<?php echo site_url('auth/login');?>" role="form" class="login-form" style="background-color:#FFF;border:solid 0px #0C56AF;">
				<div class="login-header">
					<a href="<?php echo site_url('auth/login');?>" class="logo" style="text-align:center;">
						<img src="<?php echo base_url();?>xenon/images/logo_bulog.png" alt="" width="150" />
					</a>
					<!--<p align="left" style="color:#000;"><b>Aplikasi Perjalanan Dinas Divre Jateng</b></p>-->
					<h5 align="center" style="color:#000;font-weight:bold;">Aplikasi Sekumhum CERIA</h5>
				</div>
				<div class="form-group">
					<label class="control-label" for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" autocomplete="off" autofocus="" />
					<?php echo form_error('username', '<label class="text-danger">', '</label>'); ?>
				</div>
				<div class="form-group">
					<label class="control-label" for="passwd">Password</label>
					<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" />
					<?php echo form_error('password', '<label class="text-danger">', '</label>'); ?>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-blue  btn-block text-left">
						<i class="fa-lock"></i>
						<b>Log In</b>
					</button>
				</div>
			</form>
			</td>
			<td width="35%"> &nbsp; </td>
		</tr>
		</table>
	</div>
	
	
	<!-- Bottom Scripts -->
	<script src="<?php echo base_url();?>xenon/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/resizeable.js"></script>
	<script src="<?php echo base_url();?>xenon/js/joinable.js"></script>
	<script src="<?php echo base_url();?>xenon/js/xenon-api.js"></script>
	<script src="<?php echo base_url();?>xenon/js/xenon-toggles.js"></script>
	<script src="<?php echo base_url();?>xenon/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>xenon/js/toastr/toastr.min.js"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url();?>xenon/js/xenon-custom.js"></script>
</body>
</html>