
<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Iscriviti</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open('corso/iscrizioneAllievo')); ?>
		<label>Nome:</label>
		<input name='nome' type='text' class='form-control'/>
		<label>Cognome:</label>
		<input name='cognome' type='text' class='form-control'/>
		<label>Indirizzo:</label>
		<input name='indirizzo' type='text' class='form-control'/>
		<label>NIP:</label>
		<input name='nip' type='number' step="1" class='form-control'/>
		<label>Telefono:</label>
		<input name='telefono' type='text' class='form-control'/>
		<label>Email:</label>
		<input name='email' type='text' class='form-control'/>
		<label>Scadenza patentino:</label>
		<input name='scadenzaPatentino' type='text' class='form-control'/>
		<label>Categoria patentino:</label></br>
		<!--<input name='categoriaPatentino' type='text' class='form-control'/>-->
		<select name='categoriaPatentino'>
			<option>A1</option>
			<option>A</option>
		</select></br></br>
		<input style="display:none;" name='idCorso' value=<?php echo($idCorso); ?> type='button' class='form-control'/>
		<button type="submit" name="id" value=<?php echo($idCorso); ?> class='btn btn-default'>Iscriviti</button>
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>
