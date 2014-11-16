<div class="col-md-3"></div>
<div class="col-md-4">
	<h2>Maestri</h2>
</div>
<div class="col-xs-12 col-md-9">
<?php
	echo("<table class='table table-striped'>");
	if(!empty($result)){
		foreach($result as $row){
			echo("<tr>");
			echo("<td>".$row->Nome."</td>");
			echo("<td>".$row->Cognome."</td>");
			echo("<td>".$row->Citta."</td>");
			echo("<td>".$row->Regione."</td>");
			echo("<td>".$row->Indirizzo."</td>");
			echo("<td>".$row->Email."</td>");
			echo("<td>".$row->NomeSG."</td>");
			echo("</tr>");
		}
		echo("</table>");
	}
	else{
		echo("<h3>No result</h3>");
		echo("</table>");
	}
?>
</div>
<?php
	$this->view('foot');
?>