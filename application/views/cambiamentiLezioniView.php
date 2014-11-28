<div class="col-md-3"></div>
<div class="col-md-8">
	<div class="col-md-8">
		<h2>Seleziona lezione</h2>
	</div>
	<div class="col-md-6">
		<?php echo(form_open('cambiamenti/dragAndDropView')); ?>
			<select name='lezione'>
				<?php
					foreach($lezioni as $key) {
						echo("<option value=".$key->idLezione.">".$key->Data."</option>");
					}
				?>
			</select>
			<button type="submit" class="btn btn-success">Avanti</button>
		</form>
	</div>
</div>
<?php
	$this->view('foot');
?>