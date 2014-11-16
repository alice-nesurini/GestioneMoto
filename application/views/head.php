<html>
	<head>
		<!--Jquery-->
		<script src="../../bootstrap/js/jquery.js"></script>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css">
	</head>
	<body>
		<?php
			$this->load->helper('url');
			$loginClick=base_url()."index.php/Login";
			$logoutClick=base_url()."index.php/Logout/index";
		?>
		<div style="background-color:#5A5A70;" class="col-xs-12 col-md-4">
			<button type="submit" name="login" class="glyphicon glyphicon-user btn btn-default" onclick="window.location=('<?php echo($loginClick) ?>');">Login
			</button>
		</div>
		<button type="submit" name="logout" class="glyphicon glyphicon-user btn btn-default" onclick="window.location=('<?php echo($logoutClick) ?>');">Logout
		</button>
		<!--<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-xs-12 col-md-3">Logout</div>-->
		<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-xs-12 col-md-5">Name</div>
