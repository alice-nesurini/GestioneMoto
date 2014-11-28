
<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Lista corsi aperti per iscrizioni</h2>
</div>
<div class="col-xs-12 col-md-9">
	<ul>
		<?php
			echo("<table class='table table-striped'>");
			foreach($corso as $row){
				echo("<tr>");
				echo("<td>".$row->Tipo."</td>");
				/*OLD Corso
				echo("<td>".$row->PrimaData."</td>");
				echo("<td>".$row->SecondaData."</td>");
				echo("<td>".$row->TerzaData."</td>");*/
				foreach($costo as $costoRow){
					if($row->IdCosto==$costoRow->Id){
						echo("<td>".$costoRow->Costo."</td>");
					}
				}
				echo("<td>");
				echo(form_open('corso/info'));
				echo("<button name='id' type='submit' value='".$row->Id."' class='btn btn-default'>Info</button>");
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
