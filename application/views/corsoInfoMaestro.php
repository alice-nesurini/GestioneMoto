<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Edit</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php
		$count=0;
			echo(validation_errors());
	        echo(form_open('corso/save'));
			foreach($info as $row){
				
				echo("<ul class='list-group'>");
				if($count==0){
					echo("<li class='list-group-item'>Numero Lezioni: ".$numberRows."</li>");
			    	echo("<li class='list-group-item'>Tipo corso: <input name='tipo' type='text' value='".$row->Tipo."'/></li>");
			    	/*echo("<li class='list-group-item'>Prima data: <input name='primaData' type='text' value='".$row->PrimaData."'/></li>");
			    	echo("<li class='list-group-item'>Seconda data: <input name='secondaData' type='text' value='".$row->SecondaData."'/></li>");
			    	echo("<li class='list-group-item'>Terza data: <input name='terzaData' type='text' value='".$row->TerzaData."'/></li>");*/
			    	echo("<li class='list-group-item'>Costo: <input name='costo' type='text' value='".$row->Costo."'/></li>");
			    	echo("<li class='list-group-item'>Nome maestro: ".$row->Nome."</li>");
			    	echo("<li class='list-group-item'>Cognome maestro: ".$row->Cognome."</li>");
			    	echo("<li class='list-group-item'>Regione maestro: ".$row->Regione."</li>");
			    	echo("<li class='list-group-item'>Nome scuola guida: ".$row->SGNome."</li>");
			    	echo("<li class='list-group-item'>Contatto maestro: ".$row->Email."</li>");
			    	$count=1;
			    }
			    echo("</ul>");
			    echo("<li class='list-group-item'>Data lezione ".$count.": <input name='data".$count++."' type='text' value='".$row->Data."'/></li>"); 
		    }
		   	echo('<div class="col-md-5"></div>');
		    //print $row->corsoId;
			echo("<button type='submit' name='idSave' class='btn btn-default' value='".$row->corsoId."'>Salva</button>");
			echo("</form>");
			echo("</br>");
		?>
	</ul>
</div>
<div class="col-md-8">
	<div class="col-md-10"></div>
	<div class="col-md-2">
		<?php
			$this->load->helper('url');
			$backClick=base_url()."index.php/corso/showEditMaestro";
		?>
		<button type="button" class="btn btn-default" onclick="window.location=('<?php echo($backClick) ?>');">Torna Indietro</button>
	</div>
</div>
<?php
	$this->view('foot');
?>