
		<div class="col-md-3"></div>
		<div class="col-md-4">
			<h2>Lista scuole guide</h2>
		</div>
		<div class="col-xs-12 col-md-9">
			<ul>
				<?php
					echo("<table class='table table-striped'>");
					foreach($scuolaGuida as $row){
						echo("<tr>");
						echo("<td>".$row->Id."</td>");
						echo("<td>".$row->NomeSG."</td>");
						echo("</tr>");
					}
					echo("</table>");
				?>
			</ul>
		</div>
		<?php
			$this->view('foot');
		?>
