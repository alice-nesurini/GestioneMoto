<?php
	class Attore extends CI_Controller{

		public function index(){
           	$this->load->model('Attore_model');
		    $attori['query']=$this->Attore_model->get_attore();
            $this->load->vars($attori);
        }

		public function show() {
			$this->load->view('head');
			$this->load->model('Attore_model');
		    $attori['query']=$this->Attore_model->get_attore();
		    $this->load->view('left');
			$this->load->view('attore', $attori);
			//$this->load->view('foot');
		}
		public function show_id($id) {
			$this->load->view('head');
			$this->load->model('Attore_model');
		    $attori['query']=$this->Attore_model->get_attore_id($id);
		    $this->load->view('left');
			$this->load->view('attore', $attori);
			//$this->load->view('foot');
		}
	}
?>