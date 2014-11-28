<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Iscriviti</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php echo(form_open('corso/newCorso')); ?>
		<script>
			function check(select){
			    if(select[select.selectedIndex].value=="A1" ){
			        document.getElementsByName("terza")[0].style.display="none";
			        document.getElementsByName("terzaLabel")[0].style.display="none";
			    }
			    else{
			        document.getElementsByName("terza")[0].style.display="inline";
			        document.getElementsByName("terzaLabel")[0].style.display="inline";
			    }
			}
		</script>
		<label>Tipo:</label></br>
		<select onchange="check(this)" name='tipo'>
			<option value="A">A</option>
			<option value="A1">A1</option>
			<option value="Passaggio A1 ad A">Passaggio A1 ad A</option>
		</select></br></br>
		<!--<label>Costo:</label>
		<input name='costo' type='number' step="0.05" class='form-control'/>-->
		<label>Costo:</label>
		<select name='costo'>
			<?php
				foreach($costo as $key) {
					echo("<option value=".$key->Id.">".$key->Costo."</option>");
				}
			?>
		</select>
		</br></br>
		<label>Prima Data:</label>
		<input name='prima' type='datetime-local' class='form-control'/>
		<label>Seconda Data:</label>
		<input name='seconda' type='datetime-local' class='form-control'/>
		<label name="terzaLabel">Terza Data:</label>
		<input name='terza' type='datetime-local' class='form-control'/>
		</br>
		<input type="submit" value="Crea" class='btn btn-default'/>
	</form>
	</ul>
</div>
<?php
	$this->view('foot');
?>
