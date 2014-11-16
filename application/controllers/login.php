<?php
	class Login extends CI_Controller{

		public function index(){
           	$this->load->helper(array('form'));
   			$this->load->view('login');
        } 
	}
?>