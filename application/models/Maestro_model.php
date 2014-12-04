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
		    //$query=$this->db->get_where('Maestro', array('Id' => $id));
		    $this->db->select('Maestro.Id, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	ScuolaGuida.Nome AS NomeSG, Maestro.Foto, Maestro.Nickname, Maestro.Password, TelefonoMaestro.Numero, TelefonoMaestro.IdMaestro, Maestro.Osservazioni');
		    $this->db->from('Maestro');
		    $this->db->where('Maestro.Id', $id);
		    $this->db->join('ScuolaGuida', 'Maestro.IdScuolaGuida=ScuolaGuida.Id');
		    $this->db->join('TelefonoMaestro', 'TelefonoMaestro.IdMaestro=Maestro.Id');
		    $query=$this->db->get();
    		return $query->result();
		}
		public function get_all_sg() {
		    //$query=$this->db->get_where('Maestro', array('id' => $id));
		    $this->db->select('Maestro.Id, Maestro.Nome, Maestro.Cognome, Maestro.Indirizzo, Maestro.Regione, Maestro.Citta, Maestro.Email,
		    	ScuolaGuida.Nome AS NomeSG, Maestro.Foto, Maestro.Osservazioni');
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
		public function newMaestro($nome, $cognome, $indirizzo, $citta, $regione, $email, $telfono, $idScuolaGuida, $password, $foto, $osservazioni){
			$data=array(
				'Nome'=>$nome,
				'Nickname'=>$nome,
				'Cognome'=>$cognome,
				'Indirizzo'=>$indirizzo,
				'Citta'=>$citta,
				'Email'=>$email,
				'IdScuolaGuida'=>$idScuolaGuida,
				'Password'=>$password,
				'Email'=>$email,
				'Foto'=>$foto,
				'Regione'=>$regione,
				'Osservazioni'=>$osservazioni
			);
			$this->db->insert('Maestro', $data);
			//INSERT TELEFONO
			$idMaestro=$this->db->insert_id();
			$dataTel=array(
				'Numero'=>$telfono,
				'IdMaestro'=>$idMaestro
			);
			$this->db->insert('TelefonoMaestro', $dataTel);
		}
		public function delete($id){
			$this->db->where('IdMaestro', $id);
			$this->db->delete('TelefonoMaestro');
			//DELETE TELEFONO (foreign key)
			$this->db->where('Id', $id);
			$this->db->delete('Maestro');
		}
		public function updateSenzaImage($id, $nome, $cognome, $indirizzo, $citta, $regione, $telefono, $email, $idScuolaGuida, $osservazioni, $nickname, $password){
			$data=array(
			   	'Nome'=>$nome,
				'Nickname'=>$nome,
				'Cognome'=>$cognome,
				'Indirizzo'=>$indirizzo,
				'Citta'=>$citta,
				'Email'=>$email,
				'IdScuolaGuida'=>$idScuolaGuida,
				'Password'=>$password,
				'Email'=>$email,
				'Regione'=>$regione,
				'Osservazioni'=>$osservazioni
			);

			$dataTel=array(
				'Numero'=>$telefono,
				'IdMaestro'=>$id
			);
			$this->db->where('IdMaestro', $id);
			$this->db->update('TelefonoMaestro', $dataTel);

			$this->db->where('Id', $id);
			$this->db->update('Maestro', $data);
		}
		public function update($id, $image, $nome, $cognome, $indirizzo, $citta, $regione, $telefono, $email, $idScuolaGuida, $osservazioni, $nickname, $password){
			$data=array(
			   	'Nome'=>$nome,
				'Nickname'=>$nome,
				'Cognome'=>$cognome,
				'Indirizzo'=>$indirizzo,
				'Citta'=>$citta,
				'Email'=>$email,
				'IdScuolaGuida'=>$idScuolaGuida,
				'Password'=>$password,
				'Email'=>$email,
				'Foto'=>$image,
				'Regione'=>$regione,
				'Osservazioni'=>$osservazioni
			);

			$dataTel=array(
				'Numero'=>$telefono,
				'IdMaestro'=>$id
			);
			$this->db->where('IdMaestro', $id);
			$this->db->update('TelefonoMaestro', $dataTel);

			$this->db->where('Id', $id);
			$this->db->update('Maestro', $data);
		}
	}
?>