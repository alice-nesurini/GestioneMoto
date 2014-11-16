<?php
	class Maestro extends CI_Controller{

		public function index(){
           	$this->load->model('Maestro_model');
            $this->load->vars($maestri);
        }

		public function show() {
			$this->load->library('session');
			$this->load->view('head');
			$this->load->model('Maestro_model');
		    $data['query']=$this->Maestro_model->get_all_sg();
		    //$this->load->view('left');
		    $session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
			$this->load->view('maestro', $data);
		}
		public function show_id($id) {
			$this->load->library('session');
			$this->load->view('head');
			$this->load->model('Maestro_model');
		    $maestri['query']=$this->Maestro_model->get_by_id($id);
		    //$this->load->view('left');
		    $session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
			$this->load->view('maestro', $maestri);
		}
	}
?>