<?php
	class Spese_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function getSpese($idMaestro) {
		    $this->db->select('*');
		    $this->db->from('Spese');
		    $this->db->join('Maestro', 'Spese.IdMaestro=Maestro.Id');
		    $this->db->join('Lezione', 'Spese.IdLezione=Lezione.Id');
		    $query=$this->db->get();
		   	return $query->result();
		}
		public function newSpesa($nome, $prezzo, $idMaestro, $idLezione){
			$data=array(
				'TipoSpesa'=>$nome,
				'Prezzo'=>$prezzo,
				'IdMaestro'=>$idMaestro,
				'IdLezione'=>$idLezione
			);
			$this->db->insert('Spese', $data);
		}
	}
?>