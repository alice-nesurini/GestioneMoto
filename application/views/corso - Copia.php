
<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Iscriviti</h2>
</div>
<script>
	$('.selectpicker').selectpicker();
</script>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open('corso/info')); ?>
		<label>Nome:</label>
		<input name='nome' type='text' class='form-control'/>
		<label>Cognome:</label>
		<input name='cognome' type='text' class='form-control'/>
		<label>Indirizzo:</label>
		<input name='indirizzo' type='text' class='form-control'/>
		<label>NIP:</label>
		<input name='nip' type='text' class='form-control'/>
		<label>Telefono:</label>
		<input name='telefono' type='text' class='form-control'/>
		<label>Email:</label>
		<input name='email' type='text' class='form-control'/>
		<label>Scadenza patentino:</label>
		<input name='scdenzaPatentino' type='text' class='form-control'/>
		<label>Categoria patentino:</label></br>
		<!--<input name='categoriaPatentino' type='text' class='form-control'/>-->
		<select name='categoriaPatentino' class="selectpicker">
			<option>A1</option>
			<option>A</option>
		</select>
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
        <!--<ul class="dropdown-menu" role="menu">
          <li><a href="#">A</a></li>
          <li><a href="#">A1</a></li>
        </ul>-->
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>
