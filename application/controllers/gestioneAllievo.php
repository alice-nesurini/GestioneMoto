<?php
	class GestioneAllievo extends CI_Controller{

		public function show(){
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
			
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->helper('form');
			$this->load->model('Allievo_model');
			$this->load->model('Corso_model');
		    $data['allieviCorsi']=$this->Allievo_model->allieviJoinCorsi();
		    $session=$this->session->all_userdata();
			$data['idMaestro']=$session['idMaestro'];
			$data['allieviNumbers']=$this->Allievo_model->allieviNumbers($session['idMaestro']);
			$data['corso']=$this->Corso_model->getById($session['idMaestro']);
			$this->load->view('gestioneAllievoL', $data);
			//$this->load->view('gestioneAllievoR', $data);
        }
        public function accetta(){
        	$this->load->library('session');
			$session=$this->session->all_userdata();
        	$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
			
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->helper('form');
			$this->load->model('Allievo_model');
			//if($this->form_validation->run()==true){
				$id=$this->input->post('id');
				print $id;
			//}
		    $data['allieviCorsi']=$this->Allievo_model->accettato($id);
		    $this->load->helper('form');
			$this->load->model('Allievo_model');
			$this->load->model('Corso_model');
		    $data['allieviCorsi']=$this->Allievo_model->allieviJoinCorsi();
		    $session=$this->session->all_userdata();
			$data['idMaestro']=$session['idMaestro'];
			$data['allieviNumbers']=$this->Allievo_model->allieviNumbers($session['idMaestro']);
			$data['corso']=$this->Corso_model->getById($session['idMaestro']);
			$this->load->view('gestioneAllievoL', $data);
        }
    }
?>