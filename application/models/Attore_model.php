<?php
	class Attore_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function get_attore() {
		    $query=$this->db->get('attore');
		   	return $query->result();
		}

		public function get_attore_id($id) {
		    $query=$this->db->get_where('attore', array('id' => $id));
    		return $query->row_array();
		}
	}
?>