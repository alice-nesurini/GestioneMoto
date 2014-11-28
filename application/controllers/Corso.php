<?php
	class Corso extends CI_Controller{

		public function show(){
			$this->load->helper('form');
			$this->load->view('head');
			$this->load->model('Corso_model');
		    $returned=$this->Corso_model->get_all();
		    $data['corso']=$returned['corsi'];
		    $data['costo']=$returned['costi'];
		    //$this->load->view('left');
		    $this->load->library('session');
		    $session=$this->session->all_userdata();
		    if($this->session->userdata('isMaestro')){
			//if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    
			$this->load->view('Corso', $data);
		}

		public function info(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$id=$this->input->post('id');
			$this->load->view('head');
			$this->load->model('Corso_model');
		    $data['info']=$this->Corso_model->info($id);
		    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		    //$id caricato in una sessione se é l'utente
		    //si iscrive ad un corso
		    //tabella partecipazione
		    $this->load->library('session');
		    //$session=$this->session->all_userdata('idIscrizioneCorso', $id);
		   	$session=$this->session->all_userdata();
		   	$data['idCorso']=$id;
		    //$this->load->view('left');
		    
			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
			$this->load->view('CorsoInfo', $data);
		}
		public function iscriviti($idCorso){
			$this->load->helper('form');
			$this->load->view('headSecond');

			$this->load->library('session');
			$session=$this->session->all_userdata();
			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    //$this->load->view('left');
		    $data['idCorso']=$idCorso;
			$this->load->view('iscriviti', $data);
		}
		public function iscrizioneAllievo(){
			$this->load->helper('form');
			$this->load->library('form_validation');
     		$this->form_validation->set_rules('nome', 'Nome', 'required');
     		$this->form_validation->set_rules('cognome', 'Cognome', 'required');
     		$this->form_validation->set_rules('indirizzo', 'Indirizzo', 'required');
     		$this->form_validation->set_rules('nip', 'NIP', 'required|');
     		$this->form_validation->set_rules('telefono', 'Telefono', 'required');
     		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
     		$this->form_validation->set_rules('scadenzaPatentino', 'Scadenza Patentino', 'required');
     		$this->form_validation->set_rules('categoriaPatentino', 'Categoria Patentino', 'required|callback_check');
			$this->form_validation->run();
			$this->load->view('head');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    //$this->load->view('left');
		    //DA METTERE A POSTO RITORNA PAGINA CORSO
			//$this->load->view('iscriviti');
			$idCorso=$this->input->post('id');
			$this->load->model('Corso_model');
			$data['info']=$this->Corso_model->info($idCorso);
			$data['idCorso']=$idCorso;
			$this->load->view('corsoInfo', $data);
		}

		public function check(){
			$nome=$this->input->post('nome');
			$cognome=$this->input->post('cognome');
			$indirizzo=$this->input->post('indirizzo');
			$nip=$this->input->post('nip');
			$telefono=$this->input->post('telefono');
			$email=$this->input->post('email');
			$scadenzaPatentino=$this->input->post('scadenzaPatentino');
			$categoriaPatentino=$this->input->post('categoriaPatentino');
			//$idCorso=$this->input->post('id');

			$idCorso=$this->input->post('id');
			$this->load->model('Allievo_model');
			//print "Id corso".$idCorso;
		    $this->Allievo_model->newAllievo($nome, $cognome, $indirizzo, $nip, $email, $telefono, $scadenzaPatentino, $categoriaPatentino, $idCorso);
		}
		public function showEditMaestro(){
			$this->load->helper('form');
			$this->load->view('head');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$id=$session['idMaestro'];

			$this->load->model('Corso_model');
		    //$data['corso']=$this->Corso_model->getById($id);

			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $idMaestro=$session['idMaestro'];
		    $data['corso']=$this->Corso_model->getById($idMaestro);
			$this->load->view('corsoMaestro', $data);
		}
		public function delete(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$id=$this->input->post('deleteId');
			$this->load->view('head');
			$this->load->model('Corso_model');
		    $this->Corso_model->delete($id);

		    $this->load->library('session');
		    $session=$this->session->all_userdata();
			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Corso_model');
		    $idMaestro=$session['idMaestro'];
		    $data['corso']=$this->Corso_model->getById($idMaestro);
			$this->load->view('corsoMaestro', $data);
		}
		public function edit(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$id=$this->input->post('editId');
			$this->load->view('head');

		    $this->load->library('session');
		    $session=$this->session->all_userdata();
			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Corso_model');
		    $data['info']=$this->Corso_model->info($id);
		    //print $id;
		    $data['numberRows']=$this->Corso_model->rowNumbers($id);
			$this->load->view('corsoInfoMaestro', $data);
		}
		public function save(){
			$this->load->helper('form');
			$this->load->library('form_validation');
     		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
     		$this->form_validation->set_rules('data1', 'Prima Data', 'required');
     		$this->form_validation->set_rules('data2', 'Seconda Data', 'required');
     		//$this->form_validation->set_rules('Data3', 'Terza Data', 'required');
     		$this->form_validation->set_rules('costo', 'Costo', 'required');
			if($this->form_validation->run()==true){
				$tipo=$this->input->post('tipo');
				$primaData=$this->input->post('data1');
				$secondaData=$this->input->post('data2');
				$terzaData=$this->input->post('data3');
				$costo=$this->input->post('costo');
				$idSave=$this->input->post('idSave');

				$this->load->model('Corso_model');
			    $this->Corso_model->updateCorso($idSave, $tipo, $primaData, $secondaData, $terzaData, $costo);
			}
			else{
				print "error occurred";
			}
			$this->load->view('head');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			if($this->session->userdata('isMaestro')){
			//if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $data['session']=$session;
		    $this->load->model('Corso_model');
		    $data['info']=$this->Corso_model->info($idSave);
		    $data['numberRows']=$this->Corso_model->rowNumbers($idSave);
			$this->load->view('corsoInfoMaestro', $data);
		}
		public function newCorsoView(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->view('head');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			if($this->session->userdata('isMaestro')){
			//if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $data['session']=$session;
		    $this->load->model('Corso_model');
		    $data['costo']=$this->Corso_model->getCosti();
			$this->load->view('newCorso', $data);
		}
		public function newCorso(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$idMaestro=$session['idMaestro'];
     		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
     		$this->form_validation->set_rules('prima', 'Prima Data', 'required');
     		$this->form_validation->set_rules('seconda', 'Seconda Data', 'required');
     		//$this->form_validation->set_rules('terza', 'Terza Data', 'required');
     		$this->form_validation->set_rules('costo', 'Costo', 'required');
			if($this->form_validation->run()==true){
				$tipo=$this->input->post('tipo');
				$primaData=$this->input->post('prima');
				$secondaData=$this->input->post('seconda');
				$terzaData=$this->input->post('terza');
				$costo=$this->input->post('costo');
				$idSave=$this->input->post('idSave');

				
				$this->load->model('Corso_model');
			    $this->Corso_model->newCorso($tipo, $primaData, $secondaData, $terzaData, $costo, $idMaestro);
			}
			else{
				print "error occurred";
			}

			$this->load->view('head');
			//if($session['isMaestro']==true){
			if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $data['session']=$session;
		    $this->load->model('Corso_model');
			/*$data['corso']=$this->Corso_model->info($idMaestro);
			$this->load->view('corsoMaestro', $data);*/
			$data['corso']=$this->Corso_model->getById($idMaestro);
			$this->load->view('corsoMaestro', $data);
		}
	}
?>