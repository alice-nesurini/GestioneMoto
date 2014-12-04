<?php
	class Spese extends CI_Controller{
		public function show(){
			$this->load->helper('form');
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
		    $this->load->model('Spese_model');
		    $data['spese']=$this->Spese_model->getSpese($session['idMaestro']);
			$this->load->view('spese', $data);
		}
		public function newSpeseView(){
			$this->load->library('form_validation');
			$this->load->helper('form');
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
		    $this->load->model('Allievo_model');
		    $data['lezione']=$this->Allievo_model->getLezioniById($session['idMaestro']);
			$this->load->view('newSpesa', $data);
		}
		public function addSpesa(){
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->library('session');

			$this->form_validation->set_rules('nome', 'Nome', 'required|alpha');
			$this->form_validation->set_rules('prezzo', 'Prezzo', 'required|numeric');
			$this->form_validation->set_rules('lezione', 'Lezione', 'required');
		    $nome=$this->input->post('nome');
		    $prezzo=$this->input->post('prezzo');
		    $idLezione=$this->input->post('lezione');

		    //print $idLezione;

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
			$this->load->model('Spese_model');
			$this->Spese_model->newSpesa($nome, $prezzo, $session['idMaestro'], $idLezione);
		    $data['spese']=$this->Spese_model->getSpese($session['idMaestro']);
			$this->load->view('spese', $data);
		}
	}
?>