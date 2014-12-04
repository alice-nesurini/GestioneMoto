<?php
	echo validation_errors();
	$this->load->helper('url');
	$goBackClick=base_url()."index.php/gestioneMaestri/newMaestroView";
?>
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location=('<?php echo($goBackClick) ?>');">Torna indietro</button>