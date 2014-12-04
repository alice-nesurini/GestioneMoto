<?php
	class GestioneMaestri extends CI_Controller{
		public function show(){
			
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Maestro_model');
		    $data['maestri']=$this->Maestro_model->get_all_sg();
			$this->load->view('gestioneMaestri', $data);
		}
		public function newMaestroView(){
			
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('ScuolaGuida_model');
		    $data['scuolaGuida']=$this->ScuolaGuida_model->get_all();
			$this->load->view('newMaestroView', $data);
		}
		public function save(){

			$this->load->helper('url');
     		$this->load->model('User_model');
     		$this->load->library('form_validation');
     		$this->form_validation->set_rules('nome', 'Nome', 'required');
     		$this->form_validation->set_rules('cognome', 'Cognome', 'required');
     		$this->form_validation->set_rules('indirizzo', 'Indirizzo', 'required');
     		$this->form_validation->set_rules('telefono', 'Telefono', 'required');
     		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
     		if ($this->form_validation->run()){
     			//DEFAULT PASSWORD
	     		$nome=$this->input->post('nome');
				$cognome=$this->input->post('cognome');
				$indirizzo=$this->input->post('indirizzo');
				$citta=$this->input->post('citta');
				$email=$this->input->post('email');
				$telefono=$this->input->post('telefono');
				$idScuolaGuida=$this->input->post('scuolaGuida');
				$regione=$this->input->post('regione');
				$osservazioni=$this->input->post('osservazioni');
				$password=$nome;
				if(($_FILES['image']['size'])==0) {
			    	print '<p>Seleziona un file Immagine</p>';
			    }
				else{
					$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
					if(exif_imagetype($_FILES['image']['tmp_name'])){
					  	$this->load->model('Maestro_model');
					    $this->Maestro_model->newMaestro($nome, $cognome, $indirizzo, $citta, $regione, $email, $telefono, $idScuolaGuida, $password, $image, $osservazioni);
						$this->load->helper('form');
						$this->load->library('session');
						$data['nickname']=$this->session->userdata('nickname');
			            $data['isAdmin']=$this->session->userdata('isAdmin');
			            $data['isMaestro']=$this->session->userdata('isMaestro');
						$this->load->view('head', $data);
						$session=$this->session->all_userdata();
					    if($this->session->userdata('isMaestro')){
					    	$this->load->view('leftMaestro');
					    }
					    else if($this->session->userdata('isAdmin')){
			                $this->load->view('leftAdmin');
			            }
					    else{
					    	$this->load->view('left');
					    }
					    $this->load->model('Maestro_model');
					    $data['maestri']=$this->Maestro_model->get_all_sg();
						$this->load->view('gestioneMaestri', $data);
					}
				}
     		}	
     		else{
     			/*$this->load->library('email');
     			
     			$this->email->from('alice.nesurini@gmail.com', 'Name');
     			$this->email->to('alice.nesurini@gmail.com');
     			$this->email->subject('subject');
     			$this->email->message('message');
     			//$this->smpt_pass();
     			$this->email->send();
     			echo $this->email->print_debugger();*/
     			$this->load->helper('form');
				$this->load->library('session');
				$session=$this->session->all_userdata();
			    if($this->session->userdata('isMaestro')){
			    	$this->load->view('leftMaestro');
			    }
			    else if($this->session->userdata('isAdmin')){
	                $this->load->view('leftAdmin');
	            }
			    else{
			    	$this->load->view('left');
			    }
     			$data['nickname']=$this->session->userdata('nickname');
	            $data['isAdmin']=$this->session->userdata('isAdmin');
	            $data['isMaestro']=$this->session->userdata('isMaestro');
				$this->load->view('head', $data);
     			$this->form_validation->set_message('required', 'I campi elencati sono RICHIESTI');
     			$this->load->view('errorMessage');
     		}
		}
		public function deleteMaestro(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$id=$this->input->post('deleteId');

			$this->load->model('Maestro_model');
		    $this->Maestro_model->delete($id);

			$this->load->library('session');
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Maestro_model');
		    $data['maestri']=$this->Maestro_model->get_all_sg();
			$this->load->view('gestioneMaestri', $data);
		}
		public function editMaestro(){
			//prendere i dati del maestro tramite l'id
			$this->load->helper('form');
			$this->load->library('form_validation');
			$id=$this->input->post('editId');
			//caricare le view
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Maestro_model');
		    $data['maestri']=$this->Maestro_model->get_by_id($id);
		   	$this->load->model('ScuolaGuida_model');
		    $data['scuolaGuida']=$this->ScuolaGuida_model->get_all();
			//
			$this->load->view('editMaestro', $data);
		}
		public function updateMaestro(){
			//librerie
			$this->load->library('session');
			$this->load->library('form_validation');
			//variabili form
			$nome=$this->input->post('nome');
			$cognome=$this->input->post('cognome');
			$idScuolaGuida=$this->input->post('scuolaGuida');
			$osservazioni=$this->input->post('osservazioni');
			$indirizzo=$this->input->post('indirizzo');
			$citta=$this->input->post('citta');
			$regione=$this->input->post('regione');
			$telefono=$this->input->post('telefono');
			$email=$this->input->post('email');
			$nickname=$this->input->post('nickname');
			$password=$this->input->post('password');
			$id=$this->input->post('idSave');
			$image=NULL;
			$this->load->model('Maestro_model');
			//update nel database in base all'immagine
			if(($_FILES['image']['size'])!=0){
				$imageTemp=addslashes(file_get_contents($_FILES['image']['tmp_name']));
				if(exif_imagetype($_FILES['image']['tmp_name'])){
					$image=$imageTemp;
					$this->Maestro_model->update($id, $image, $nome, $cognome, $indirizzo, $citta, $regione, $telefono, $email, $idScuolaGuida, $osservazioni, $nickname, $password);
				}
			}
			else{
				$this->Maestro_model->updateSenzaImage($id, $nome, $cognome, $indirizzo, $citta, $regione, $telefono, $email, $idScuolaGuida, $osservazioni, $nickname, $password);
			}
			//caricare view
			
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Maestro_model');
		    $data['maestri']=$this->Maestro_model->get_all_sg();
			$this->load->view('gestioneMaestri', $data);
		}
	}
?>