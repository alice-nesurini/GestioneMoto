<div class="col-md-3"></div>
<div class="col-md-3">
	<h2>Lista maestri</h2>
</div>
<div class="col-md-9">
	<ul>
		<?php
			echo("<table style='table-layout: fixed; word-wrap: break-word;' class='table table-striped'>");
				?>
				<thead>
				   	<tr>
				      	<th>Nome</th>
				      	<th>Cognome</th>
				      	<th>Citta</th>
				      	<th>Regione</th>
				      	<th>Indirizzo</th>
				      	<th>Email</th>
				      	<th>Scuola guida</th>
				   	</tr>
				</thead>
				<?php
				foreach($query as $row){
				echo("<tr>");
				//echo("<p>".$row->Id." ");
				echo("<td>".$row->Nome."</td>");
				echo("<td>".$row->Cognome."</td>");
				echo("<td>".$row->Citta."</td>");
				echo("<td>".$row->Regione."</td>");
				echo("<td>".$row->Indirizzo."</td>");
				echo("<td>".$row->Email."</td>");
				echo("<td>".$row->NomeSG."</td>");
			}
			echo("</table>");
		?>
	</ul>
</div>
<?php
	$this->view('foot');
?>