<?php
	class Administrator extends CI_Controller{

		public function index(){
           	//$this->load->model('Maestro_model');
            //$this->load->vars($maestri);
        }

		public function show() {
			$this->load->view('head');
			//$this->load->model('Maestro_model');
		    //$data['query']=$this->Maestro_model->get_all_sg();
		    $this->load->view('left');
			$this->load->view('administratorHome');
		}
	}
?>