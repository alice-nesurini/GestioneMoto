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
			$logoutClick=base_url()."index.php/Logout/index";
		?>
		<div style="background-color:#5A5A70;" class="col-md-12">
			<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-md-4">
				<img src="../../../img/moto2.png" height="40px"/>
			</div>
			<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-md-4"></div>
			
			<div style="background-color:#5A5A70; text-align: center; color: white;" class="col-md-4">
				<div style="background-color:#5A5A70; text-align: right; color: white; line-height: 45px;" class="col-md-6"><font size="4px"><?php echo("Utente: ".$nickname) ?></font></div>
				<?php
					if($isAdmin!=null || $isMaestro!=null){
				?>
				<button type="submit" name="logout" class="glyphicon glyphicon-user btn btn-default" class="col-md-6" onclick="window.location=('<?php echo($logoutClick) ?>');">Logout
				</button>
				<?php
					}
					else{
				?>
				<button type="submit" name="login" class="glyphicon glyphicon-user btn btn-default" class="col-md-6" onclick="window.location=('<?php echo($loginClick) ?>');">Login
				</button>
				<?php
					}
				?>
			</div>
		</div>