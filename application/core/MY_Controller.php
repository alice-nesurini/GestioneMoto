<?php if (! defined('BASEPATH')) exit('No direct script access');

	/*
	????????????????????????????????????
	 */
	class MY_Controller extends CI_Controller {

		function __construct() {
		    parent::__construct();
		    $this->_check_auth();
		}

		private function _check_auth(){
		    $this->load->library('session');
		    $this->session->set_userdata('isMaestro', false);
		    $this->session->set_userdata('isAdmin', false);
		}
	}
?>