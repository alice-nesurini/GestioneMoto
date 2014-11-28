<?php
	class GestioneMaestri extends CI_Controller{
		public function show(){
			$this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
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
			$this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
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
     		$this->form_validation->set_rules('nome', 'Nome', 'required|alpha');
     		$this->form_validation->set_rules('cognome', 'Cognome', 'required|alpha');
     		$this->form_validation->set_rules('indirizzo', 'Indirizzo', 'required|alpha');
     		$this->form_validation->set_rules('telefono', 'Telefono', 'required');
     		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
     		if ($this->form_validation->run()){
     			//DEFAULT PASSWORD
	     		$nome=$this->input->post('nome');
				$cognome=$this->input->post('cognome');
				$indirizzo=$this->input->post('indirizzo');
				$email=$this->input->post('email');
				$telefono=$this->input->post('telefono');
				$idScuolaGuida=$this->input->post('scuolaGuida');
				$password=$nome;
				if(!isset($_FILES['image'])) {
			    	print '<p>Please select a file</p>';
			    }
				else{
					$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
					if(exif_imagetype($_FILES['image']['tmp_name'])){
					  	print $image;
					  	$this->load->model('Maestro_model');
					    $this->Maestro_model->newMaestro($nome, $cognome, $indirizzo);
						//$this->load->view('newMaestroView', $data);
					}
				}
     		}	
     		else{
     			$this->load->library('email');
     			
     			$this->email->from('alice.nesurini@gmail.com', 'Name');
     			$this->email->to('alice.nesurini@gmail.com');
     			
     			$this->email->subject('subject');
     			$this->email->message('message');
     			
     			$this->email->send();
     			
     			echo $this->email->print_debugger();
     		}
		}
	}
?>