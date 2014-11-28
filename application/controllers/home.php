<?php
	class Home extends CI_Controller{

		public function show() {
			$this->load->library('session');
			$this->load->view('head');
			$this->load->model('ScuolaGuida_model');
		    $data['scuolaGuida']=$this->ScuolaGuida_model->get_all();
		    $this->load->library('form_validation');
		    //$this->load->view('left');
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
		    $data['path']="../../img/ticino.jpg";
			$this->load->view('home', $data);
		}
		public function search(){
			$this->load->library('session');
			$this->load->view('head');
		    $this->load->library('form_validation');
		    //$this->load->view('left');
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
			//callback_check
		    $this->load->helper('url');
     		$this->load->model('User_model');
     		$this->form_validation->set_rules('name', 'Name', 'max_length[255]');
     		$this->form_validation->set_rules('cognome', 'Cognome', 'max_length[255]');
     		$this->form_validation->set_rules('scuolaGuida', 'ScuolaGuida', 'required|callback_check');
     		if ($this->form_validation->run()){
     			//already redirected
     		}
     		else{
     			$this->load->model('ScuolaGuida_model');
		    	$data['scuolaGuida']=$this->ScuolaGuida_model->get_all();
     			$this->load->view('home', $data);
     		}
		}
		//funzione richiamata con i dati completi dal form
		public function check(){
		    $scuolaGuida=$this->input->post('scuolaGuida');
		    //print $scuolaGuida;
			$this->load->model('User_model');
			$this->load->model('ScuolaGuida_model');
		    $name=$this->input->post('name');
		    $cognome=$this->input->post('cognome');
		    if(empty($name)){
		    	$name="";
		    }
		    if(empty($cognome)){
		    	$cognome="";
		    }
         	$result=$this->User_model->searchMaestro($name, $cognome, $scuolaGuida);
         	$data['result']=$result;
         	$this->load->view('testView', $data);
		}

		public function region($region){
			$this->load->library('session');
			$this->load->view('headSecond');
		    //$this->load->view('left');
		    $session=$this->session->all_userdata();
		    if($this->session->userdata('isMaestro')){
		    //if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else if($this->session->userdata('isAdmin')){
                $this->load->view('leftAdmin');
            }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('User_model');
			$result=$this->User_model->searchMaestroRegion($region);
         	$data['result']=$result;
         	$this->load->view('testView', $data);
		}

		//Funzione caricata a loclahost/GestionMoto
		//con gli header corretti
		//Pagina caricata carico isMaestro=false
		public function showHeader(){
			$this->load->library('session');
			$session=$this->session->all_userdata();

			error_reporting(0);
			//prima pagina a caricare carica le sessioni
			//if($session['isMaestro']){
			//if($this->session->userdata('isMaestro')){
			if($this->session->userdata('isMaestro')){
				$this->session->set_userdata('isMaestro', false);
			}
			if($session['isAdmin']){
				$this->session->set_userdata('isAdmin', false);
			}
			$this->load->view('headFirst');
			$this->load->model('ScuolaGuida_model');
		    $data['scuolaGuida']=$this->ScuolaGuida_model->get_all();
		    $this->load->library('form_validation');
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
		    $data['path']="img/ticino.jpg";
			$this->load->view('home', $data);
		}
	}
?>