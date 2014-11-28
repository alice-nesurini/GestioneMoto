<?php
	class Costo_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function getCosti() {
		    $this->db->select('*');
		    $this->db->from('Costo');
		    $this->db->join('Corso', 'Corso.IdCosto=Costo.Id');
		    $this->db->group_by('Corso.Tipo');
		    $query=$this->db->get();
		   	return $query->result();
		}
		public function setCosto($id, $costo){
			$data=array(
			   	'Costo'=>$costo
			);
			$this->db->where('Id', $id);
			$this->db->update('Costo', $data);
		}
		public function getCostoById($id){
			$this->db->select('*');
		    $this->db->from('Costo');
		    $this->db->where('Costo.Id', $id);
		    $query=$this->db->get();
		   	return $query->result();
		}
	}
?>