<?php
	class Logout extends CI_Controller{

		public function index(){
			//unset login variable
			$this->load->library('form_validation');
			$this->load->library('session');
   			$this->session->set_userdata('isMaestro', false);
   			$this->session->set_userdata('isAdmin', false);
   			$this->session->set_userdata('nickname', "-");

   			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    $session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }

   			$this->load->model('ScuolaGuida_model');
		    $data['scuolaGuida']=$this->ScuolaGuida_model->get_all();
		    $data['path']="../../img/ticino.jpg";
     		$this->load->view('home', $data);
        } 
	}
?>