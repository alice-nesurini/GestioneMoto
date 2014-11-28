<div class="col-md-3"></div>
<div class="col-md-8">
	<div class="col-md-8">
		<h2>Gestione assegnazione/cambiamento allievi</h2>
	</div>
	<div class="col-md-6">
		<?php
			$n=0;
			echo("<table class='table table-striped'>");
				foreach($allieviNo as $row){
					echo('<tr id='.$n.' draggable="true" ondragstart="drag(event)">');
					echo("<td>".$row->Nome."</td>");
					echo("<td>".$row->Cognome."</td>");
					echo("</tr>");
					$n++;
				}
			echo("</table>");
		?>
	</div>
	<div class="col-md-6">
		<?php
			$n=0;
			echo("<table class='table table-striped'>");
				foreach($corsi as $row){
					echo('<tr height="200px" id='.$n.' ondrop="drop(event)" ondragover="allowDrop(event)">');
					echo("<td>".$row->Tipo."</td>");
					foreach($costi as $costoRow){
						if($row->IdCosto==$costoRow->Id){
							echo("<td>".$costoRow->Costo."</td>");
						}
					}
					
					foreach($lezioni as $lezioneRow){
						//ALLIEVO
						//PARTECIPAZIONE
						//LEZIONE
						//CORSO

						if($row->Id==$lezioneRow->IdCorso){
							foreach($partecipazioni as $partecipazioniRow){
								if($lezioneRow->Id==$partecipazioniRow->IdLezione){
									foreach($allievi as $allieviRow){
										if($partecipazioniRow->IdAllievo==$allieviRow->Id){
											echo("<tr>");
											echo("<td>".$allieviRow->Nome."<td>");
											echo("<td>".$allieviRow->Cognome."<td>");
											echo("</tr>");
										}
									}
								}	
							}
						}
					}
					echo("</tr>");
					$n++;
				}
			echo("</table>");
		?>
	</div>
	<div class="col-md-8" ondrop="drop(event)" ondragover="allowDrop(event)">
	</div>
</div>
<script>
	function drop(ev) {
	   	ev.preventDefault();
	    var data=ev.dataTransfer.getData("text");
	    ev.target.appendChild(document.getElementById(data));
	}

	function drag(ev) {
	    ev.dataTransfer.setData("text", ev.target.id);
	}

	function allowDrop(ev) {
	    ev.preventDefault();
	}

</script>
<?php
	$this->view('foot');
?>