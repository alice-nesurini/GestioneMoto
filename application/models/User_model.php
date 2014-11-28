<?php
	class User_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function login_Maestro($nickname, $password) {
		   	$this->db->select('Id, Nickname, Password');
		   	$this->db->from('Maestro');
		   	$this->db->where('Nickname', $nickname);
		   	$this->db->where('Password', $password);
		   	$query=$this->db->get();
		   	if ($query->num_rows()>0){
		   		return $query->result();
		   	}
		   	else{
		   		return false;
		   	}
		}
		public function login_Administrator($nickname, $password) {
		   	$this->db->select('Id, Nickname, Password');
		   	$this->db->from('Administrator');
		   	$this->db->where('Nickname', $nickname);
		   	$this->db->where('Password', $password);
		   	$query=$this->db->get();
		   	if ($query->num_rows()>0){
		   		return $query->result();
		   	}
		   	else{
		   		return false;
		   	}
		}
		public function searchMaestro($nome, $cognome, $idScuolaGuida){
			$this->db->select('Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	ScuolaGuida.Nome AS NomeSG');
			$this->db->from('Maestro');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.id');
			$this->db->like('Maestro.Nome', $nome);
			$this->db->like('Cognome', $cognome);
		   	$this->db->where('IdScuolaGuida', $idScuolaGuida);
			$query=$this->db->get();
    		return $query->result();
		}
		public function searchMaestroRegion($region){
			$this->db->select('Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	ScuolaGuida.Nome AS NomeSG');
			$this->db->from('Maestro');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.id');
			$this->db->like('Maestro.Regione', $region);
			$query=$this->db->get();
    		return $query->result();
		}

		public function getAdminByNickname($nickname){
			$this->db->select('Id');
			$this->db->from('Administrator');
			$this->db->where('Nickname', $nickname);
			$query=$this->db->get();
    		return $query->row('Id');
		}	
	}
?>