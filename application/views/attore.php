<html>
	<body>
		<p>Data</p>
		<div>
			<ul>
				<?php
					foreach($query as $row){
						echo("<p>".$row->Nome." ");
						echo($row->Cognome."</p>");
					}
				?>
			</ul>
		</div>
		<?php
			$this->view('foot');
		?>
	</body>
</html>