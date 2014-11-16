<html>
	<head>
		<!--header after login with nickname-->
		<script src="../bootstrap/js/jquery.js"></script>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	</head>
	<body>
		<?php
			$this->load->helper('url');
			$loginClick=base_url()."index.php/Login";
		?>
		<div style="background-color:#5A5A70;" class="col-xs-12 col-md-4">
			<button type="submit" name="login" class="glyphicon glyphicon-user" onclick="window.location=('<?php echo($loginClick) ?>');">Login
			</button>
		</div>
		<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-xs-12 col-md-3">Logout</div>
		<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-xs-12 col-md-5"><?php echo($nickname) ?></div>
