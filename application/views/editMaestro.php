<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Edit</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php
			echo(validation_errors());
	        echo(form_open_multipart('gestioneMaestri/updateMaestro'));
	        echo("<ul class='list-group'>");
			foreach($maestri as $row){
				if($row->Foto!=NULL){
					echo('<td><img name="originalImage" src="data:image/jpeg;base64,'.base64_encode(stripslashes($row->Foto)).'" width="60"></td>');
				}
				echo('<input type="file" name="image"/>');
				echo("<li class='list-group-item'>Nome: <input name='nome' type='text' value='".$row->Nome."'/></li>");
				echo("<li class='list-group-item'>Cognome: <input name='cognome' type='text' value='".$row->Cognome."'/></li>");
				echo("<li class='list-group-item'>Citta: <input name='citta' type='text' value='".$row->Citta."'/></li>");
				?>
				<select name="regione">
					<?php
						if($row->Regione=='Luganese'){
							echo('<option selected value="Luganese">Luganese</option>');
						}
						else{
							echo('<option value="Luganese">Luganese</option>');
						}
						if($row->Regione=='Mendrisiotto'){
							echo('<option selected value="Mendrisiotto">Mendrisiotto</option>');
						}
						else{
							echo('<option value="Mendrisiotto">Mendrisiotto</option>');
						}
						if($row->Regione=='Bellinzonese'){
							echo('<option selected value="Bellinzonese">Bellinzonese</option>');
						}
						else{
							echo('<option value="Bellinzonese">Bellinzonese</option>');
						}
						if($row->Regione=='Locarnese'){
							echo('<option selected value="Locarnese">Locarnese</option>');
						}
						else{
							echo('<option value="Locarnese">Locarnese</option>');
						}
						if($row->Regione=='Vallemaggia'){
							echo('<option selected value="Vallemaggia">Vallemaggia</option>');
						}
						else{
							echo('<option value="Vallemaggia">Vallemaggia</option>');
						}
						if($row->Regione=='Leventina'){
							echo('<option selected value="Leventina">Leventina</option>');
						}
						else{
							echo('<option value="Leventina">Leventina</option>');
						}
						if($row->Regione=='Riviera'){
							echo('<option selected value="Riviera">Riviera</option>');
						}
						else{
							echo('<option value="Riviera">Riviera</option>');
						}
						if($row->Regione=='Blenio'){
							echo('<option selected value="Blenio">Blenio</option>');
						}
						else{
							echo('<option value="Blenio">Blenio</option>');
						}
					?>
				</select>
				<?php
				echo("<li class='list-group-item'>Indirizzo: <input name='indirizzo' type='text' value='".$row->Indirizzo."'/></li>");
				echo("<li class='list-group-item'>Email: <input name='email' type='text' value='".$row->Email."'/></li>");
				echo("<li class='list-group-item'>Telefono: <input name='telefono' type='text' value='".$row->Numero."'/></li>");
				?>
				<select name="scuolaGuida">
					<?php
						foreach($scuolaGuida as $key) {
							if($key->NomeSG==$row->NomeSG){
								echo("<option selected value=".$key->Id.">".$key->NomeSG."</option>");
							}
							else{
								echo("<option value=".$key->Id.">".$key->NomeSG."</option>");
							}
						}
					?>
				</select>
				<?php
				echo("<li class='list-group-item'>Nickname: <input name='nickname' type='text' value='".$row->Nickname."'/></li>");
				echo("<li class='list-group-item'>Password: <input name='password' type='text' value='".$row->Password."'/></li>");
				echo("<li class='list-group-item'>Osservazioni: <textarea name='osservazioni'>".$row->Osservazioni."</textarea></li>");
		    }
			echo("</ul>");
		   	echo('<div class="col-md-5"></div>');
			echo("<button type='submit' name='idSave' class='btn btn-default' value='".$row->Id."'>Salva</button>");
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
			$backClick=base_url()."index.php/gestioneMaestri/show";
		?>
		<button type="button" class="btn btn-default" onclick="window.location=('<?php echo($backClick) ?>');">Torna Indietro</button>
	</div>
</div>
<?php
	$this->view('foot');
?>