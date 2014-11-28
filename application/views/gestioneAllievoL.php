<div class="col-md-4">
	<div class="col-md-4">
		<h2>Accettazione allievi</h2>
	</div>
	<div class="col-md-9">
		<?php
			//Caricare allievi ancora da accettare
			foreach($allieviCorsi as $row){
				echo("<ul class='list-group'>");
		    	echo("<li class='list-group-item'>Nome: ".$row->Nome."</li>");
		    	echo("<li class='list-group-item'>Cognome: ".$row->Cognome."</li>");
		    	echo("<li class='list-group-item'>Indirizzo: ".$row->Indirizzo."</li>");
		    	echo("<li class='list-group-item'>NIP: ".$row->NIP."</li>");
		    	echo("<li class='list-group-item'>Email: ".$row->Email."</li>");
		    	echo("<li class='list-group-item'>Scadenza Patentino: ".$row->ScadenzaPatentino."</li>");
		    	echo("<li class='list-group-item'>Categoria allievo: ".$row->TipoCategoria."</li>");

		    	echo("<li class='list-group-item'>Accettato: ".$row->Accettato."</li>");
		    	echo("<li class='list-group-item'>Tipo: ".$row->Tipo."</li>"); 
		    	/*OLD Corso 
		    	echo("<li class='list-group-item'>Prima data: ".$row->PrimaData."</li>");
		    	echo("<li class='list-group-item'>Seconda data: ".$row->SecondaData."</li>");
		    	echo("<li class='list-group-item'>Terza data: ".$row->TerzaData."</li>");*/
		    	echo("<li class='list-group-item'>Costo: ".$row->Costo."</li>");
		    	echo("</ul>");
		    	echo(form_open('gestioneAllievo/Accetta'));
		    	echo("<button name='id' type='submit' value='".$row->IdAllievo."' class='btn btn-default'>Accetta</button></form>");
		    }
		?>
	</div>
</div>
<div class="col-md-4">
	<?php
		$dataR['idMaestro']=$idMaestro;
		$dataR['corso']=$corso;
		$dataR['allieviNumbers']=$allieviNumbers;
		$this->view('gestioneAllievoR', $dataR);
	?>
</div>
