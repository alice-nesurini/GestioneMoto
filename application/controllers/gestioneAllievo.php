<?php
	class GestioneAllievo extends CI_Controller{

		public function show(){
			$this->load->view('head');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
			$this->load->view('gestioneAllievoL');
			$this->load->view('gestioneAllievoR');
        }
    }
?>