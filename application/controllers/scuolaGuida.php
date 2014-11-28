<?php
	class ScuolaGuida extends CI_Controller{

		public function index(){
           	$this->load->model('ScuolaGuida_model');
            $this->load->vars($scuolaGuida);
        }

		public function show(){
			$this->load->library('session');
			$this->load->view('head');
			$this->load->model('ScuolaGuida_model');
		    $scuolaGuida['scuolaGuida']=$this->ScuolaGuida_model->get_all();
		   // $session=$this->session->all_userdata();
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
			$this->load->view('scuolaGuida', $scuolaGuida);
		}
		public function show_id($id) {
			$this->load->library('session');
			$this->load->view('head');
			$this->load->model('ScuolaGuida_model');
		    $scuolaGuida['scuolaGuida']=$this->ScuolaGuida_model->get_by_id($id);
		    //$this->load->view('left');
		    $session=$this->session->all_userdata();
		    //if(isset($session['isMaestro'])==true){
		    if($this->session->userdata('isMaestro')){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
			$this->load->view('scuolaGuida', $scuolaGuida);
		}
	}
?>