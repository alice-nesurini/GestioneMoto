<?php
	class Costo extends CI_Controller{
		public function show(){
			$this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Costo_model');
		    $data['costi']=$this->Costo_model->getCosti();
			$this->load->view('costo', $data);
		}
		public function cambiamentoView(){
			$this->load->library('form_validation');
		    $this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Costo_model');
		    $data['costo']=$this->Costo_model->getCostoById($this->input->post('id'));
		    $data['idCosto']=
		    $data['Costo']=$this->input->post('costo');
		    $data['idCosto']=$this->input->post('id');
			$this->load->view('costoChange', $data);
		}
		public function cambiamento(){
		    $this->load->library('form_validation');
		    $this->form_validation->set_rules('costo', 'Costo', 'required|numeric');
		    $costo=$this->input->post('costo');
		    $idCosto=$this->input->post('id');
		    $this->form_validation->run();
		    $this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Costo_model');
		    $this->Costo_model->setCosto($idCosto, $costo);
		    $data['costi']=$this->Costo_model->getCosti();
			$this->load->view('costo', $data);
		}
	}
?>