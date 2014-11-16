<?php
	class ScuolaGuida_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function get_all() {
		    //$query=$this->db->get('ScuolaGuida');
		    $this->db->select('Id, Nome AS NomeSG');
		    $query = $this->db->get('ScuolaGuida');
		   	return $query->result();
		}

		public function get_by_id($id) {
		    $query=$this->db->get_where('ScuolaGuida', array('Id' => $id));
    		return $query->row_array();
		}
	}
?>