<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Corsi maestro</h2>
</div>
</br>
<div class="col-md-3"></div>
	<div class="col-md-2">
	<?php echo(form_open('corso/newCorsoView')); ?>
		<button type="submit" class="btn btn-default glyphicon glyphicon-plus" name="newCorso">Crea corso</button>
	</form>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php
			echo("<table class='table table-striped'>");
			foreach($corso as $row){
				echo("<tr>");
				echo("<td>".$row->Tipo."</td>");
				echo("<td>".$row->PrimaData."</td>");
				echo("<td>".$row->SecondaData."</td>");
				echo("<td>".$row->TerzaData."</td>");
				echo("<td>".$row->Costo."</td>");
				echo("<td>");
				//EDIT
				echo(form_open('corso/edit'));
				echo("<button name='editId' type='submit' value='".$row->Id."' class='btn btn-default glyphicon glyphicon-edit'>Edit</button>");
				echo("</form>");
				echo("</td>");
				echo("<td>");
				//DELETE
				echo(form_open('corso/delete'));
				echo("<button name='deleteId' type='submit' value='".$row->Id."' class='btn btn-default glyphicon glyphicon-remove'>Delete</button>");
				echo("</form>");
				echo("</td>");
				echo("</tr>");
			}
			echo("</table>");
		?>
	</ul>
</div>
<?php
	$this->view('foot');
?>
