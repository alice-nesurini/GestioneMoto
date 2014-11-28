<?php
	class Info extends CI_Controller{
		public function show(){
			$this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
			$this->load->view('info');
		}
	}
?>