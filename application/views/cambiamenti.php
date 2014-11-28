<div class="col-md-3"></div>
<div class="col-md-8">
	<div class="col-md-8">
		<h2>Seleziona corso</h2>
	</div>
	<div class="col-md-6">
		<?php echo(form_open('cambiamenti/selectLezioneView')); ?>
			<select name='corso'>
				<?php
					foreach($corsi as $key) {
						echo("<option value=".$key->Id.">".$key->Tipo."</option>");
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