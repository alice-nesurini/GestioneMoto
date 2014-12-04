<div class="col-md-3"></div>
<div class="col-md-8">
	<div class="col-md-12">
		<h2>Gestione maestri</h2>
	</div>
	<?php echo(form_open('gestioneMaestri/newMaestroView')); ?>
		<button type="submit" class="btn btn-default glyphicon glyphicon-plus" name="newMaestro">Maestro</button>
	</form>
	<div class="col-md-12">
		<?php
			echo("<table style='table-layout: fixed; word-wrap: break-word;' class='table table-striped'>");
		?>
		<thead>
		   	<tr>
		      	<th>Nome</th>
		      	<th>Cognome</th>
		      	<th>Citta</th>
		      	<th>Regione</th>
		      	<th>Indirizzo</th>
		      	<th>Email</th>
		      	<th>Scuola guida</th>
		   	</tr>
		</thead>
		<?php
			foreach($maestri as $row){
				echo("<tr>");
				if($row->Foto!=null){
					echo('<td><img src="data:image/jpeg;base64,'.base64_encode(stripslashes($row->Foto)).'" width="60"></td>');
				}
				else{
					echo("<td></td>");
				}
				echo("<td id='".$row->Nome."".$row->Id."'>".$row->Nome."</td>");
				echo("<td id='".$row->Cognome."".$row->Id."'>".$row->Cognome."</td>");
				echo("<td id='".$row->Citta."".$row->Id."'>".$row->Citta."</td>");
				echo("<td id='".$row->Regione."".$row->Id."'>".$row->Regione."</td>");
				echo("<td id='".$row->Indirizzo."".$row->Id."'>".$row->Indirizzo."</td>");
				echo("<td id='".$row->Email."".$row->Id."'>".$row->Email."</td>");
				echo("<td id='".$row->NomeSG."".$row->Id."'>".$row->NomeSG."</td>");
				echo(form_open('gestioneMaestri/deleteMaestro'));
				echo("<td><button type='submit' name='deleteId' value='".$row->Id."' class='glyphicon glyphicon-remove btn btn-default'>Elimina</button></td>");
				echo("</form>");
				echo(form_open('gestioneMaestri/editMaestro'));
				echo("<td><button type='submit' name='editId' value='".$row->Id."' class='glyphicon glyphicon-edit btn btn-default'>Edit</button></td>");
				echo("</form>");
			}
		echo("</table>");
		?>
	</div>
</div>
<?php
	$this->view('foot');
?>