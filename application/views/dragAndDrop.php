<div class="col-md-3"></div>
<div class="col-md-8">
	<div class="col-md-8">
		<h2>Gestione assegnazione/cambiamento allievi</h2>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<h2>Allievi Lezioni</h2>
			<div style="border:2 solid;" ondrop="dropNonFinito(event)" ondragover="allowDrop(event)">
				<?php
					echo("<table class='table table-striped'>");
					foreach($allieviLezione as $row){
						echo('<tr id="'.$row->Id.'" draggable="true" ondragstart="drag(event, this)">');
						echo("<td>".$row->Nome."</td>");
						echo("<td>".$row->Cognome."</td>");
						echo("<td>".$row->Indirizzo."</td>");
						echo("</tr>");
					}
					echo("</table>");
				?>
			</div>
		</div>
		<div class="col-md-6">
			<h2>Elimina</h2>
			<img src="../../img/delete.png" width="100px" ondrop="drop(event)" ondragover="allowDrop(event)"/>
		</div>
		<div class="col-md-12">
			<h2>Allievi che non hanno completato corsi</h2>
			<?php
				echo("<table class='table table-striped'>");
				foreach($allieviNonFinitiA as $row){
					echo('<tr id="'.$row->IdAllievo.'" draggable="true" ondragstart="drag(event, this)">');
					echo("<td>".$row->Nome."</td>");
					echo("<td>".$row->Cognome."</td>");
					echo("<td>".$row->Indirizzo."</td>");
					echo("</tr>");
				}
				echo("</table>");
			?>
			<?php
				echo("<table class='table table-striped'>");
				//print_r($allieviNonFinitiAltri);
				foreach($allieviNonFinitiAltri as $row){
					echo('<tr id="'.$row->IdAllievo.'" draggable="true" ondragstart="drag(event, this)">');
					echo("<td>".$row->Nome."</td>");
					echo("<td>".$row->Cognome."</td>");
					echo("<td>".$row->Indirizzo."</td>");
					echo("</tr>");
				}
				echo("</table>");
			?>
		</div>
		<div id="idLezione" style="visibility:hidden;" value="<?php echo($idLezione); ?>">
			<?php echo($idLezione); ?>
		</div>
	<div class="col-md-8" ondrop="drop(event)" ondragover="allowDrop(event)">
	</div>
</div>
<script>
	var cellDragged;
	
	function dropNonFinito(ev){
		ev.preventDefault();
	    var data=ev.dataTransfer.getData("text");
	    ev.target.appendChild(document.getElementById(data));
	    var idLezione=document.getElementById('idLezione').getAttribute('value');
	    //AJAX delete relazione dalla tabella partecipazione
	    var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest;
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				//alert(xmlhttp.responseText);
				location.reload();
				/*$.ajax({
		            type:'POST',
		            url:'dragAndDropView'
		        });*/
			}
		}
		xmlhttp.open("GET", "../../AJAX/moveNewPartecipazione.php?IdLezione="+idLezione+"&IdAllievo="+cellDragged, true);
		xmlhttp.send();
	}

	function drop(ev) {
	   	ev.preventDefault();
	    var data=ev.dataTransfer.getData("text");
	    ev.target.appendChild(document.getElementById(data));
	    var idLezione=document.getElementById('idLezione').getAttribute('value');
	    //AJAX delete relazione dalla tabella partecipazione
	    var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest;
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				//alert(xmlhttp.responseText);
				location.reload();
			}
		}

		xmlhttp.open("GET", "../../AJAX/deleteFromPartecipazione.php?IdLezione="+idLezione+"&IdAllievo="+cellDragged, true);
		xmlhttp.send();
	}

	function drag(ev, cell) {
	    ev.dataTransfer.setData("text", ev.target.id);
	    cellDragged=cell.id;
	}

	function allowDrop(ev) {
	    ev.preventDefault();
	}
</script>
<?php
	$this->view('foot');
?>