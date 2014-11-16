<?php
	class Allievo_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function newAllievo($nome, $cognome, $indirizzo, $nip, $email, $scadenzaPatentino, $categoriaPatente, $idCorso){
			$data=array(
				'Id'=>NULL,
			   	'Nome'=>$nome,
			   	'Cognome'=>$cognome,
			   	'Indirizzo'=>$indirizzo,
			   	//'Telefono'=>$telefono,
			   	'Nip'=>$nip,
			   	'Email'=>$email,
			   	'ScadenzaPatentino'=>$scadenzaPatentino,
			   	'TipoCategoria'=>$categoriaPatente,
			   	'Accettato'=>1
			);

			$this->db->insert('Allievo', $data);

			$idAllievo=$this->db->insert_id();
			$dataPartecipazione=array(
				'IdCorso'=>$idCorso,
				'IdAllievo'=>$idAllievo
			);
			$this->db->insert('Partecipazione', $dataPartecipazione);
		}
	}
?>