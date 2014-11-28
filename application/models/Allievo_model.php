<?php
	class Allievo_model extends CI_Model{
		public function __construct(){
  			$this->load->database(); 
		}

		public function newAllievo($nome, $cognome, $indirizzo, $nip, $email, $telefono, $scadenzaPatentino, $categoriaPatente, $idCorso){
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
			print $idAllievo;
			//SELECT * FROM Lezione WHERE IdCorso=$idCorso
			
			$this->db->select('*');
			$this->db->from('Lezione');
			$this->db->where('Lezione.IdCorso', $idCorso);
			$lezioni=$this->db->get()->result();

			$n=0;
			foreach($lezioni as $lezione){
				$idLezione=$lezione->Id;
				if($n==0){
					$dataPartecipazione1=array(
						'IdLezione'=>$idLezione,
						'IdAllievo'=>$idAllievo
					);
				}
				if($n==1){
					$dataPartecipazione2=array(
						'IdLezione'=>$idLezione,
						'IdAllievo'=>$idAllievo
					);
				}
				if($n==2){
					$dataPartecipazione3=array(
						'IdLezione'=>$idLezione,
						'IdAllievo'=>$idAllievo
					);
				}
				$n++;
			}
			$this->db->insert('Partecipazione', $dataPartecipazione1);
			$dataTelefono=array(
				'Numero'=>$telefono,
				'IdAllievo'=>$idAllievo
			);
			$this->db->insert('Partecipazione', $dataPartecipazione2);
			$dataTelefono=array(
				'Numero'=>$telefono,
				'IdAllievo'=>$idAllievo
			);
			if(!empty($dataPartecipazione3)){
				$this->db->insert('Partecipazione', $dataPartecipazione3);
				$dataTelefono=array(
					'Numero'=>$telefono,
					'IdAllievo'=>$idAllievo
				);
			}
			$this->db->insert('TelefonoAllievo', $dataTelefono);
		}
		public function allieviJoinCorsi() {
		    $this->db->select('Allievo.Id, Allievo.Nome, Allievo.Email, Allievo.Cognome, Allievo.Indirizzo, Allievo.NIP, Allievo.ScadenzaPatentino, Allievo.Email,
		    	Allievo.TipoCategoria, Lezione.IdCorso AS IdLezioneCorso, Allievo.Accettato, Costo.Id, Costo.Costo, Corso.IdCosto, Corso.Tipo, Corso.Id AS IdCorso, 
		    	Partecipazione.IdAllievo, Partecipazione.IdLezione');
			$this->db->from('Allievo');
			$this->db->join('Partecipazione', 'Allievo.Id=Partecipazione.IdAllievo');
			$this->db->join('Lezione', 'Lezione.Id=Partecipazione.IdLezione');
			$this->db->join('Corso', 'Lezione.IdCorso=Corso.Id');
			$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
			$this->db->where('Allievo.Accettato', 1);
			$this->db->group_by('Allievo.Id');
			$query=$this->db->get();
    		return $query->result();
		}
		public function accettato($id){
			$data=array('Accettato'=>0);
			$this->db->where('Id', $id);
			$this->db->update('Allievo', $data);
		}
		public function allieviNumbers($idMaestro){
			$this->db->select('Allievo.Id, Lezione.IdCorso AS IdLezioneCorso, Corso.IdCosto, Costo.Id, Costo.Costo, Corso.Tipo, Corso.Id AS IdCorso, 
		    	Partecipazione.IdAllievo, Partecipazione.IdLezione, COUNT(Corso.Id) AS Res');
			$this->db->from('Corso');
			$this->db->join('Lezione', 'Lezione.IdCorso=Corso.Id');
			$this->db->join('Partecipazione', 'Lezione.Id=Partecipazione.IdLezione');
			$this->db->join('Costo', 'Corso.IdCosto=Costo.Id');
			$this->db->join('Allievo', 'Partecipazione.IdAllievo=Allievo.Id');
			$this->db->group_by('Corso.Id');
			$query=$this->db->get();
    		return $query->result();
		}
		public function getAll(){
			$this->db->select("*");
			$this->db->from("Allievo");
			$query=$this->db->get();
    		return $query->result();
		}
		public function getAllNo(){
			$this->db->select("*");
			$this->db->from("Allievo a");
			$this->db->join("Partecipazione p", "a.Id !=p.IdAllievo");
			$this->db->group_by("a.Id");
			$query=$this->db->get();
    		return $query->result();
		}
		public function getPartecipazioni(){
			$this->db->select("*");
			$this->db->from("Partecipazione");
			$query=$this->db->get();
    		return $query->result();
		}
		public function getLezioni(){
			$this->db->select("*");
			$this->db->from("Lezione");
			$query=$this->db->get();
    		return $query->result();
		}
		public function getLezioniById($idMaestro){
			$this->db->select("Lezione.Id AS idLezione, Lezione.Data, Lezione.IdCorso, Corso.Id, Corso.IdMaestro");
			$this->db->from("Lezione");
			$this->db->join("Corso", "Corso.Id=Lezione.IdCorso");
			$this->db->where("Corso.IdMaestro", $idMaestro);
			$query=$this->db->get();
    		return $query->result();
		}
		public function getLezioniByIds($idMaestro, $idCorso){
			$this->db->select("Lezione.Id AS idLezione, Lezione.Data, Lezione.IdCorso, Corso.Id, Corso.IdMaestro");
			$this->db->from("Lezione");
			$this->db->where("Lezione.IdCorso", $idCorso);
			$this->db->join("Corso", "Corso.Id=Lezione.IdCorso");
			$this->db->where("Corso.IdMaestro", $idMaestro);
			$query=$this->db->get();
    		return $query->result();
		}
		public function getAllieviByLezioniId($idLezione){
			$this->db->select("*");
			$this->db->from("Allievo");
			$this->db->join("Partecipazione", "Allievo.Id=Partecipazione.IdAllievo");
			//print $idLezione;
			$this->db->where("Partecipazione.IdLezione", $idLezione);
			$query=$this->db->get();
    		return $query->result();
		}
		public function allieviNonFinitiA($idLezione){
			$this->db->select("*");
			$this->db->from("Allievo");
			$this->db->join("Partecipazione", "Allievo.Id=Partecipazione.IdAllievo");
			$this->db->join("Lezione", "Lezione.Id=Partecipazione.IdLezione");
			$this->db->join("Corso", "Corso.Id=Lezione.IdCorso");
			$this->db->where("Corso.Tipo", "A");
			//$this->db->where("Lezione.Id", $idLezione);
			//$this->db->where("Partecipazione.IdAllievo", null);
			$this->db->group_by("Partecipazione.IdAllievo");
			$this->db->having("COUNT(Partecipazione.IdAllievo)<", "3");
			$query=$this->db->get();
    		return $query->result();
		}
		public function allieviNonFinitiAltri($idLezione){
			$this->db->select("*");
			$this->db->from("Allievo");
			$this->db->join("Partecipazione", "Allievo.Id=Partecipazione.IdAllievo");
			$this->db->join("Lezione", "Lezione.Id=Partecipazione.IdLezione");
			$this->db->join("Corso", "Corso.Id=Lezione.IdCorso");
			//$this->db->where("Lezione.Id", $idLezione);
			$this->db->where("Corso.Tipo", "A1");
			//$this->db->where("Partecipazione.IdAllievo", null);
			$this->db->or_where('Corso.Tipo', "Passaggio A1 ad A"); 
			$this->db->group_by("Partecipazione.IdAllievo");
			$this->db->having("COUNT(Partecipazione.IdAllievo)<", "3");
			//$this->db->having("Partecipazione.IdLezione", $idLezione);
			$query=$this->db->get();
    		return $query->result();
		}
	}
?>