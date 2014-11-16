<div>
	<div class="col-md-3"></div>
	<div class="col-md-4">
		<h2>Home - Ricerca Maestro</h2>
	</div>
	<div class="col-md-3">
		<!--<ul>
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Link vari</a>
			</li>
		</ul>-->
		<div class="btn-group pull-left">
			<ul style="list-style-type: none;">
				<li>
					<h3>Ricerca per nome</h3>
					<?php echo validation_errors(); ?>
		            <?php echo form_open('home/search'); ?>
			            <label for="name">Name:</label>
			            <input type="text" size="20" name="name" class="form-control"/>
			            </br>
			            <label for="cognome">Cognome:</label>
			            <input type="text" size="20" name="cognome" class="form-control"/>
			            </br>
			            <!--<label for="citta">Citt&agrave;:</label>
			            <input type="text" size="20" name="citta" class="form-control"/>
			            </br>-->
			        
				        <?php
					        $options=array(/*DATI da scuola guida*/);
					        foreach($scuolaGuida as $row){
								$id=$row->Id;
								$nome=$row->NomeSG;
								$options[$id]=$nome;
							}
							echo form_dropdown('scuolaGuida', $options, 'large');
						?>
						<input type="submit" value="Search" class="btn"/>
					</form>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-6">
		<!--</br></br>-->
		<?php
			$mendrisiottoClick=base_url()."index.php/home/region/Mendrisotto";
			$luganeseClick=base_url()."index.php/home/region/Luganese";
			$bellinzoneseClick=base_url()."index.php/home/region/Bellinzonese";
			$locarneseClick=base_url()."index.php/home/region/Locarnese";
			$valleMaggiaClick=base_url()."index.php/home/region/Vallemaggia";
			$leventinaClick=base_url()."index.php/home/region/Leventina";
			$rivieraClick=base_url()."index.php/home/region/Riviera";
			$blenioClick=base_url()."index.php/home/region/Blenio";
		?>
		<h3>Ricerca regione</h3>
		<img src="<?php echo($path); ?>" usemap="#ticinoMap"/>
		<map id="imgmap201411516753" name="ticinoMap">
			<area shape="poly" alt="" title="" coords="460,670,456,617,432,621,431,627,419,624,413,626,420,642,396,627,385,641,397,664,379,691,443,706,477,637,441,609,432,630,428,643,424,636,476,638" 
				onclick="window.location=('<?php echo($mendrisiottoClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="348,490,371,439,385,427,394,462,438,447,475,455,472,500,433,534,442,563,426,578,445,609,431,624,402,610,381,632,362,576,358,584,328,555,306,553,333,524,334,514,345,502,344,490" 
				onclick="window.location=('<?php echo($luganeseClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="474,453,458,430,515,417,470,359,469,328,453,360,432,343,425,312,387,345,389,357,399,368,386,422,395,434,397,454,414,438,413,458,430,442,451,447,466,440" 
				onclick="window.location=('<?php echo($bellinzoneseClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="343,489,365,425,376,421,389,427,394,361,384,356,369,295,339,281,351,265,326,228,285,212,280,254,252,271,257,288,272,295,311,353,311,387,296,393,281,379,264,378,258,365,230,356,210,333,184,325,122,347,126,354,158,364,186,411,204,419,206,443,215,448,228,445,240,459,266,467,282,451,288,463,303,473,324,471,337,484" 
				onclick="window.location=('<?php echo($locarneseClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="308,390,314,357,277,298,246,279,284,236,280,207,256,154,216,137,193,133,176,155,166,163,136,165,125,181,123,280,102,303,116,324,115,341,123,348,184,326,213,335,229,357,259,366,265,380,281,379,294,394,310,390" 
				onclick="window.location=('<?php echo($valleMaggiaClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="369,296,408,253,400,239,352,162,351,137,316,113,303,122,310,77,268,76,250,67,230,79,222,68,202,73,170,66,153,100,105,139,85,142,76,172,114,167,123,175,137,176,136,161,163,157,173,160,198,133,222,139,261,161,285,210,327,231,353,270,345,282,355,287,361,291,362,292"
				onclick="window.location=('<?php echo($leventinaClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="471,330,458,348,450,355,434,340,440,325,421,311,384,343,376,294,364,295,412,245,401,235,411,224,414,234,429,239,428,224,440,216,458,230,481,226,480,256,466,286,472,290,461,317,467,324" 
				onclick="window.location=('<?php echo($rivieraClick) ?>');" target="" />
			<area shape="poly" alt="" title="" coords="484,224,481,172,471,149,458,151,437,104,455,62,432,44,411,49,398,28,396,35,373,47,375,69,341,78,321,78,307,81,303,113,305,119,320,117,347,135,400,234,406,225,424,238,424,223,441,215,454,226,479,222" 
				onclick="window.location=('<?php echo($blenioClick) ?>');" target="" />
		</map>
	</div>
	<?php
		$this->view('foot');
	?>
</div>