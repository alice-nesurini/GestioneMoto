<?php
	class Administrator extends CI_Controller{

		public function index(){
           	//$this->load->model('Maestro_model');
            //$this->load->vars($maestri);
        }

		public function show() {
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
			//$this->load->model('Maestro_model');
		    //$data['query']=$this->Maestro_model->get_all_sg();
		    $this->load->view('left');
			$this->load->view('administratorHome');
		}
	}
?>