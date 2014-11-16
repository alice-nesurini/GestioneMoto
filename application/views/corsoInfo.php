<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Maggiori informazioni</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php
			foreach($info as $row){
				echo("<ul class='list-group'>");
		    	echo("<li class='list-group-item'>Tipo corso: ".$row->Tipo."</li>");
		    	echo("<li class='list-group-item'>Prima data: ".$row->PrimaData."</li>");
		    	echo("<li class='list-group-item'>Seconda data: ".$row->SecondaData."</li>");
		    	echo("<li class='list-group-item'>Terza data: ".$row->TerzaData."</li>");
		    	echo("<li class='list-group-item'>Terza data: ".$row->Costo."</li>");
		    	echo("<li class='list-group-item'>Nome maestro: ".$row->Nome."</li>");
		    	echo("<li class='list-group-item'>Cognome maestro: ".$row->Cognome."</li>");
		    	echo("<li class='list-group-item'>Regione maestro: ".$row->Regione."</li>");
		    	echo("<li class='list-group-item'>Nome scuola guida: ".$row->SGNome."</li>");
		    	echo("<li class='list-group-item'>Contatto maestro: ".$row->Email."</li>");
		    	echo("</ul>");
		    }
		?>
	</ul>
</div>
<div class="col-md-8">
	<div class="col-md-5"></div>
	<div class="col-md-5">
		<?php
			$this->load->helper('url');
			$backClick=base_url()."index.php/corso/show";
			$iscrivitiClick=base_url()."index.php/corso/iscriviti";
		?>
		<button type="button" class="btn btn-default" onclick="window.location=('<?php echo($backClick) ?>');">Torna Indietro</button>
		<button type="button" class="btn btn-default" onclick="window.location=('<?php echo($iscrivitiClick) ?>');">Iscriviti</button></br>
	</div>
</div>
<?php
	$this->view('foot');
?>
