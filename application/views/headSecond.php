<html>
	<head>
		<!--head second-->
		<script src="../../../bootstrap/js/jquery.js"></script>
		<link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
		<script src="../../../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css">
	</head>
	<body>
		<?php
			$this->load->helper('url');
			$loginClick=base_url()."index.php/Login";
		?>
		<div style="background-image:url('../../../img/background_blue.jpg')" class="col-xs-12 col-md-4">
			<button type="submit" name="login" class="glyphicon glyphicon-user" onclick="window.location=('<?php echo($loginClick) ?>');">Login
			</button>
		</div>
		<div style="background-image:url('../../../img/background_blue.jpg'); text-align: center; color: white;" class="col-xs-12 col-md-3">Logout</div>
		<div style="background-image:url('../../../img/background_blue.jpg'); text-align: center; color: white;" class="col-xs-12 col-md-5">Name</div>
