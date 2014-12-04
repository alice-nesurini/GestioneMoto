<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Nuovo Maestro</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open_multipart('gestioneMaestri/save')); ?>
		<label>Foto:</label>
		<input type="file" name='image'/>
		<label>Nome:</label></br>
		<input name='nome' type='text' class='form-control'/>
		<label>Cognome:</label>
		<input name='cognome' type='text' class='form-control'/>
		<label>Citta:</label>
		<input name='citta' type='text' class='form-control'/>
		<label>Indirizzo:</label>
		<input name='indirizzo' type='text' class='form-control'/>
		<label>Regione:</label>
		</br>
		<select name="regione">
			<option value="Luganese">Luganese</option>
			<option value="Mendrisiotto">Mendrisiotto</option>
			<option value="Bellinzonese">Bellinzonese</option>
			<option value="Locarnese">Locarnese</option>
			<option value="Vallemaggia">Vallemaggia</option>
			<option value="Leventina">Leventina</option>
			<option value="Riviera">Riviera</option>
			<option value="Blenio">Blenio</option>
		</select>
		</br>
		<label>Telefono:</label>
		<input name='telefono' type='text' class='form-control'/>
		<label>Email:</label>
		<input name='email' type='email' class='form-control'/>
		<label>Scuola guida:</label>
		</br>
		<select name="scuolaGuida">
			<?php
				foreach($scuolaGuida as $key) {
					echo("<option value=".$key->Id.">".$key->NomeSG."</option>");
				}
			?>
		</select>
		</br>
		<label>Osservazioni:</label>
		<textarea name='osservazioni'></textarea>
		<input type="submit" value="Save" class='btn btn-default'/>
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>