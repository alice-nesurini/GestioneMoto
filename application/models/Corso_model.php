<?php
	class Corso_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function get_all() {
		   	$this->db->select('*');
		   	$this->db->from('Corso');
		   	$query=$this->db->get();

		   	$this->db->select('*');
		   	$this->db->from('Costo');
		   	$costi=$this->db->get();
		   	return array(
			    'corsi'=>$query->result(),
			    'costi'=>$costi->result()
			);
		}
		public function info($id){
			/*$this->db->select('Corso.Id AS corsoId, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	Corso.Tipo, Corso.PrimaData, Corso.SecondaData, Corso.TerzaData, Corso.Costo, Maestro.IdScuolaGuida, Maestro.Id, ScuolaGuida.Nome AS SGNome');*/
			$this->db->select('Corso.Id AS corsoId, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	Corso.Tipo, Corso.IdCosto, Maestro.IdScuolaGuida, Maestro.Id, ScuolaGuida.Nome AS SGNome, Lezione.IdCorso, Lezione.Data,
		    	Costo.Id, Costo.Costo');
			$this->db->from('Maestro');
			$this->db->join('Corso', 'Corso.IdMaestro=Maestro.Id');
			$this->db->join('Lezione', 'Corso.Id=Lezione.IdCorso');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.Id');
			$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
			$this->db->where('Corso.Id', $id);
			$query=$this->db->get();
    		return $query->result();
		}
		public function getById($id){
			$this->db->select('Costo.Id, Costo.Costo, Corso.Id, Corso.Tipo, Corso.IdMaestro');
		   	$this->db->from('Corso');
		   	$this->db->where('IdMaestro', $id);
		   	$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
		   	$query=$this->db->get();
		   	if ($query->num_rows()>0){
		   		return $query->result();
		   	}
		   	else{
		   		return false;
		   	}
		}
		public function delete($id){

			$this->db->select('*');
		   	$this->db->from('Lezione');
		   	$this->db->where('IdCorso', $id);
		   	$query=$this->db->get()->result();

		   	foreach ($query as $key){
		   		print ($key->Id);
				$this->db->where('IdLezione', $key->Id);
				$this->db->delete('Partecipazione');
			}

			$this->db->where('IdCorso', $id);
			$this->db->delete('Lezione');

			$this->db->where('Id', $id);
			$this->db->delete('Corso');
		}
		public function updateCorso($id, $tipo, $primaData, $secondaData, $terzaData, $costo){
			$data=array(
			   	'Tipo'=>$tipo
			);

			$dataCosto=array(
			   	'Costo'=>$costo
			);

			//SELECT IdCosto FROM Corso WHERE Id=$id
			$this->db->select("IdCosto");
			$this->db->from("Corso");
			$this->db->where('Id', $id);
			$idCosto=$this->db->get()->result();

			$this->db->where('Id', $idCosto[0]->IdCosto);
			$this->db->update('Costo', $dataCosto);

			$this->db->where('Id', $id);
			$this->db->update('Corso', $data);

			$data1=array(
			   	'IdCorso'=>$id,
			   	'Data'=>$primaData
			);
			$data2=array(
			   	'IdCorso'=>$id,
			   	'Data'=>$secondaData
			);
			$data3=array(
			   	'IdCorso'=>$id,
			   	'Data'=>$terzaData
			);

			$this->db->select("Id");
			$this->db->from("Lezione");
			$this->db->where('IdCorso', $id);
			$lezioni=$this->db->get()->result();

			$i=0;
			foreach($lezioni as $lezione){
				if($i==0){
					$this->db->where('Id', $lezione->Id);
					//print $i;
					$this->db->update('Lezione', $data1);
				}
				if($i==1){
					$this->db->where('Id', $lezione->Id);
					//print $i;
					$this->db->update('Lezione', $data2);
				}
				if($i==2){
					$this->db->where('Id', $lezione->Id);
					//print $i;
					$this->db->update('Lezione', $data3);
				}
				$i++;
		    }

			
		}
		public function newCorso($tipo, $primaData, $secondaData, $terzaData, $costo, $idMaestro){
			/*$dataCosto=array(
			   	'Costo'=>$costo
			);
			$this->db->insert('Costo', $dataCosto);

			$idCosto=$this->db->insert_id();*/
			//print $costo;
			$this->db->select('*');
		   	$this->db->from('Costo');
		   	$this->db->where('Id', $costo);
		   	$costi=$this->db->get()->result();

			$data=array(
			   	'Tipo'=>$tipo,
			   	'IdMaestro'=>$idMaestro,
			   	'IdCosto'=>$costi[0]->Id,
			);
			$this->db->insert('Corso', $data);

			$idCorso=$this->db->insert_id();
			$dataLezione1=array(
			   	'Data'=>$primaData,
			   	'IdCorso'=>$idCorso
			);
			$this->db->insert('Lezione', $dataLezione1);
			$dataLezione2=array(
			   	'Data'=>$secondaData,
			   	'IdCorso'=>$idCorso
			);
			$this->db->insert('Lezione', $dataLezione2);
			if($terzaData!=null){
				$dataLezione3=array(
			   	'Data'=>$terzaData,
			   	'IdCorso'=>$idCorso
			);
			$this->db->insert('Lezione', $dataLezione3);
			}
		}
		public function rowNumbers($id){
			$this->db->select('Corso.Id AS corsoId, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	Corso.Tipo, Corso.IdCosto, Maestro.IdScuolaGuida, Maestro.Id, ScuolaGuida.Nome AS SGNome, Lezione.IdCorso, Lezione.Data,
		    	Costo.Id, Costo.Costo');
			$this->db->from('Maestro');
			$this->db->join('Corso', 'Corso.IdMaestro=Maestro.Id');
			$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
			$this->db->join('Lezione', 'Corso.Id=Lezione.IdCorso');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.Id');
			$this->db->where('Corso.Id', $id);
			$query=$this->db->get();
    		return $query->num_rows();

    		/*$this->db->select('Corso.Id AS corsoId, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	Corso.Tipo, Corso.IdCosto, Maestro.IdScuolaGuida, Maestro.Id, ScuolaGuida.Nome AS SGNome, Lezione.IdCorso, Lezione.Data,
		    	Costo.Id, Costo.Costo');
			$this->db->from('Maestro');
			$this->db->join('Corso', 'Corso.IdMaestro=Maestro.Id');
			$this->db->join('Lezione', 'Corso.Id=Lezione.IdCorso');
			$this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.Id');
			$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
			$this->db->where('Corso.Id', $id);
			$query=$this->db->get();
    		return $query->result();*/
		}
		public function getCosti(){
			$this->db->select('*');
		   	$this->db->from('Corso');
		   	$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
		   	$query=$this->db->get();
		   	return $query->result();
		}
	}
?>