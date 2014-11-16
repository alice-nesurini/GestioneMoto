<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Iscriviti</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open('corso/newCorso')); ?>
		<label>Costo:</label>
		<input name='costo' type='number' step="0.05" class='form-control'/>
		<label>Prima Data:</label>
		<input name='prima' type='datetime-local' class='form-control'/>
		<label>Seconda Data:</label>
		<input name='seconda' type='datetime-local' class='form-control'/>
		<label>Terza Data:</label>
		<input name='terza' type='datetime-local' class='form-control'/>
		<label>Tipo:</label></br>
		<select name='tipo'>
			<option>A1</option>
			<option>A</option>
		</select></br></br>
		<input type="submit" value="Crea" class='btn btn-default'/>
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>
