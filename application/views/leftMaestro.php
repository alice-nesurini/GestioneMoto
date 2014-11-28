<?php
	$this->load->helper('url');
	$maestriClick=base_url()."index.php/maestro/show";
	$scuolaClick=base_url()."index.php/scuolaGuida/show";
	$homeClick=base_url()."index.php/home/show";
	$corsoClick=base_url()."index.php/corso/show";
	$corsiClick=base_url()."index.php/corso/showEditMaestro";
	$costiClick=base_url()."index.php/costo/show";
	$allieviGestioneClick=base_url()."index.php/gestioneAllievo/show";
	$cambiamentiClick=base_url()."index.php/cambiamenti/show";
	$speseClick=base_url()."index.php/spese/show";
?>
<nav style="margin: 0; border: 0; padding:0;" class="navbar nav-pills nav-stacked col-md-3" role="navigation">
	<div style="/*height: 94%; background-color:#85FFAD;*/ text-align: center; color: white;" class="col-md-12"></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($homeClick) ?>');">Home</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($scuolaClick) ?>');">Scuole di guida</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($corsoClick) ?>');">Corsi</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($maestriClick) ?>');">Maestri</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($allieviGestioneClick) ?>');">Iscrizioni</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($cambiamentiClick) ?>');">Cambiamenti corsi</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($costiClick) ?>');">Gestione Costi</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($corsiClick) ?>');">Gestione Corsi</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($speseClick) ?>');">Spese Lezioni</button></br>
		<button type="button" class="btn btn-primary btn-lg btn-block">Info</button></br>
	</div>
</nav>
<div class="col-md-8"></div>