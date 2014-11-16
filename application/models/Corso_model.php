<?php
	class Corso_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function get_all() {
		   	$this->db->select('*');
		   	$this->db->from('Corso');
		   	$query=$this->db->get();
		   	if ($query->num_rows()>0){
		   		return $query->result();
		   	}
		   	else{
		   		return false;
		   	}
		}
		public function info($id){
			$this->db->select('Corso.Id AS corsoId, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	Corso.Tipo, Corso.PrimaData, Corso.SecondaData, Corso.TerzaData, Corso.Costo, Maestro.IdScuolaGuida, Maestro.Id, ScuolaGuida.Nome AS SGNome');
			$this->db->from('Maestro');
			$this->db->join('Corso', 'Corso.IdMaestro=Maestro.id');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.Id');
			$this->db->where('Corso.Id', $id);
			$query=$this->db->get();
    		return $query->result();
		}
		public function getById($id){
			$this->db->select('*');
		   	$this->db->from('Corso');
		   	$this->db->where('IdMaestro', $id);
		   	$query=$this->db->get();
		   	if ($query->num_rows()>0){
		   		return $query->result();
		   	}
		   	else{
		   		return false;
		   	}
		}
		public function delete($id){
			$this->db->where('Id', $id);
			$this->db->delete('Corso');
		}
		public function updateCorso($id, $tipo, $primaData, $secondaData, $terzaData, $costo){
			$data=array(
			   	'Tipo'=>$tipo,
			   	'PrimaData'=>$primaData,
			   	'SecondaData'=>$secondaData,
			   	'TerzaData'=>$terzaData,
			   	'Costo'=>$costo
			);
			$this->db->where('Id', $id);
			$this->db->update('Corso', $data); 
		}
		public function newCorso($tipo, $primaData, $secondaData, $terzaData, $costo, $idMaestro){
			$data=array(
			   	'Tipo'=>$tipo,
			   	'PrimaData'=>$primaData,
			   	'SecondaData'=>$secondaData,
			   	'TerzaData'=>$terzaData,
			   	'IdMaestro'=>$idMaestro,
			   	'Costo'=>$costo
			);
			$this->db->insert('Corso', $data);  
		}
	}
?>