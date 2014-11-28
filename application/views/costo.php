<div class="col-md-3"></div>
<div class="col-md-8">
	<div class="col-md-8">
		<h2>Gestione costi</h2>
	</div>
	<div class="col-md-8">
		<?php
		echo("<table class='table table-striped'>");
			$n=0;
			foreach($costi as $row){
				echo("<tr>");
				echo("<td>Tipo corso: ".$row->Tipo."</td>");
				echo("<td id=".$n." onclick='update(this.id)'>".$row->Costo."</td>");
				echo(form_open('costo/cambiamentoView'));
				echo("<td><button name='id' type='submit' value='".$row->IdCosto."' class='btn btn-default'>Cambia</button></td>");
				echo("</form>");
				$n++;
				echo("</tr>");
			}
		echo("</table>");
		?>
	</div>
</div>
<?php
	$this->view('foot');
?>