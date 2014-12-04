<?php
	class Info extends CI_Controller{
		public function show(){
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
			$data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');
			$this->load->view('head', $data);
		    if($this->session->userdata('isMaestro')){
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