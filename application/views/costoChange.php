<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Cambiamento costo</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open('costo/cambiamento')); ?>
		<label>Nome:</label>
		<input name='costo' type='text' class='form-control' value="<?php echo($costo[0]->Costo); ?>"/>
		<button type="submit" name="id" value=<?php echo($idCosto); ?> class='btn btn-default'>Cambia</button>
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>