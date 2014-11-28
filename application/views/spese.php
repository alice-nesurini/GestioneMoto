<div class="col-md-3"></div>
<div class="col-md-8">
	<h2>Spese</h2>
	<?php echo(form_open('spese/newSpeseView')); ?>
		<button type="submit" class="btn btn-default glyphicon glyphicon-plus" name="newSpesa">Spesa</button>
	</form>
	<?php
		echo("<table class='table table-striped'>");
			foreach($spese as $row){
				echo('<tr>');
				echo("<td>".$row->TipoSpesa."</td>");
				echo("<td>".$row->Prezzo."</td>");
				echo("<td>".$row->Data."</td>");
				echo("</tr>");
			}
		echo("</table>");
	?>
</div>