<?php
	class Maestro_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function get_all() {
		    $query=$this->db->get('Maestro');
		   	return $query->result();
		}

		public function get_by_id($id) {
		    /*$query=$this->db->get_where('Maestro', array('id' => $id));
    		return $query->row_array();*/
		}
		public function get_all_sg() {
		    //$query=$this->db->get_where('Maestro', array('id' => $id));
		    $this->db->select('Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	ScuolaGuida.Nome AS NomeSG');
			$this->db->from('Maestro');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.id');
			$query=$this->db->get();
    		return $query->result();
		}
		public function getByNickname($nickname){
			$this->db->select('Id');
			$this->db->from('Maestro');
			$this->db->where('Nickname', $nickname);
			$query=$this->db->get();
    		//return $query->result();
    		return $query->row('Id');
		}	
	}
?>