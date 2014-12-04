<?php
	class LoginTest extends CI_Controller{

      //test variabile globale
      public $admin=false;

  		public function index(){
  			  $this->load->helper('url');
     			$this->load->model('User_model');
     			$this->load->library('form_validation');
     			$this->form_validation->set_rules('nickname', 'Nickname', 'required');
     			$this->form_validation->set_rules('password', 'Password', 'required|callback_check');
     			if ($this->form_validation->run()){

     			}
     			else{
     				 redirect('Login', 'refresh');
     			}
      }
      public function check($password){
          //libreria sessioni, non quella nativa di php
         	$this->load->library('session');
         	$nickname=$this->input->post('nickname');

          //set variabile sessione
          $this->session->set_userdata('nickname', $nickname);

          //LOAD MAESTRO PANEL
         	$result=$this->User_model->login_Maestro($nickname, $password);
         	if(!(empty($result))){
            $this->session->set_userdata('isMaestro', true);
            $data['nickname']=$this->session->userdata('nickname');
            $data['isAdmin']=$this->session->userdata('isAdmin');
            $data['isMaestro']=$this->session->userdata('isMaestro');

            //SET ID Maestro to SESSION
            $this->load->model('Maestro_model');
            $id=$this->Maestro_model->getByNickname($nickname);
            //print $id;
            $this->session->set_userdata('idMaestro', $id);

            $this->load->view('headLogin', $data);
            
            $this->load->model('ScuolaGuida_model');
            $scuolaGuida['scuolaGuida']=$this->ScuolaGuida_model->get_all();
            //$session['isMaestro']==true
            $this->load->view('leftMaestro');
            $this->load->view('maestroHome', $data);
    				return true;
      		}
      		else{
              $data['nickname']=$this->session->userdata('nickname');
      				$resultAd=$this->User_model->login_administrator($nickname, $password);
              $this->load->model('User_model');
              $id=$this->User_model->getAdminByNickname($nickname);
              $this->session->set_userdata('idAdmin', $id);
              if(!(empty($resultAd))){
                  $this->session->set_userdata('isAdmin', true);
                  $data['nickname']=$this->session->userdata('nickname');
                  $data['isAdmin']=$this->session->userdata('isAdmin');
                  $data['isMaestro']=$this->session->userdata('isMaestro');
                  $this->load->view('headLogin', $data);
                  
                  $this->load->model('ScuolaGuida_model');
                  $scuolaGuida['scuolaGuida']=$this->ScuolaGuida_model->get_all();

                  $this->load->library('session');
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
                  $data['path']="../img/ticino.jpg";
                  $this->load->view('home', $data);

                  return true;
                  //LOAD ADMINISTRATOR PANEL 
              }
              return false;
      		}
      }
	}
?>