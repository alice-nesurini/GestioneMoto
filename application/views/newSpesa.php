<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Nuova spesa</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open('spese/addSpesa')); ?>
		<label>Tipo spesa:</label>
		<input name='nome' type='text' class='form-control'/>
		<label>Prezzo:</label>
		<input name='prezzo' type='text' class='form-control'/></br>
		<select name='lezione'>
			<?php
				foreach($lezione as $key) {
					echo("<option value=".$key->idLezione.">".$key->Data."</option>");
				}
			?>
		</select>
		</br>
		</br>
		<button type="submit" name="id" class='btn btn-default'>Salva</button>
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>