<h2>Corsi - Allievi</h2>
<div class="col-md-12">
	<?php
		//serve id maestro
		echo("<table class='table table-striped'>");
	?>
		<thead>
		   	<tr>
		      	<th>Tipo</th>
		      	<th>Costo</th>
		      	<th>Allievi</th>
		   	</tr>
		</thead>
	<?php
	//print_r($allieviNumbers);
		foreach($allieviNumbers as $row){
			echo("<tr>");
			echo("<td>".$row->Tipo."</td>");
			echo("<td>".$row->Costo."</td>");
			echo("<td>".$row->Res."</td>");
			echo("</tr>");
		}
		echo("</table>");
	?>
</div>