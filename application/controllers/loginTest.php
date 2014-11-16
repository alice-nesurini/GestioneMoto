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
            $data['nickname']=$this->session->userdata('nickname');

            //SET ID Maestro to SESSION
            $this->load->model('Maestro_model');
            $id=$this->Maestro_model->getByNickname($nickname);
            //print $id;
            $this->session->set_userdata('idMaestro', $id);

            $this->load->view('headLogin', $data);
            $this->session->set_userdata('isMaestro', true);
            $this->load->model('ScuolaGuida_model');
            $scuolaGuida['scuolaGuida']=$this->ScuolaGuida_model->get_all();
            //$session['isMaestro']==true
            $this->load->view('leftMaestro');
            $this->load->view('maestroHome', $data);
    				return true;
      		}
      		else{
      				$resultAd=$this->User_model->login_administrator($nickname, $password);
              if(!(empty($resultAd))){
                  $data['nickname']=$this->session->userdata('nickname');
                  $this->load->view('headLogin', $data);
                  $this->load->model('ScuolaGuida_model');
                  $scuolaGuida['scuolaGuida']=$this->ScuolaGuida_model->get_all();
                  $this->load->view('administratorHome', $data);
                  return true;
                  //LOAD ADMINISTRATOR PANEL 
              }
              return false;
      		}
      }
	}
?>