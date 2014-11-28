<?php
	class Cambiamenti extends CI_Controller{
		public function show(){
			$this->load->view('head');
			$this->load->helper('form');
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Allievo_model');
		    $this->load->model('Corso_model');
		    $data['allieviNo']=$this->Allievo_model->getAllNo();
		    $data['allievi']=$this->Allievo_model->getAll();
		    $this->load->model('Corso_model');
		    $corsi=$this->Corso_model->get_all();
		    $data['partecipazioni']=$this->Allievo_model->getPartecipazioni();
		    $data['lezioni']=$this->Allievo_model->getLezioni();
		    $data['corsi']=$this->Corso_model->getById($session['idMaestro']);
		    $data['corsi']=$corsi['corsi'];
		    $data['costi']=$corsi['costi'];
			$this->load->view('cambiamenti', $data);
		}
		public function selectLezioneView(){
			$this->load->view('head');
			$this->load->helper('form');

			$idCorso=$this->input->post('corso');
			//print $idCorso;
			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Allievo_model');
		    $data['lezioni']=$this->Allievo_model->getLezioniByIds($session['idMaestro'], $idCorso);
			$this->load->view('cambiamentiLezioniView', $data);
		}
		public function dragAndDropView(){
			$this->load->view('head');
			$this->load->helper('form');

			$idLezione=$this->input->post('lezione');

			$this->load->library('session');
			$session=$this->session->all_userdata();
		    if($session['isMaestro']==true){
		    	$this->load->view('leftMaestro');
		    }
		    else{
		    	$this->load->view('left');
		    }
		    $this->load->model('Allievo_model');
		    //$data['lezioni']=$this->Allievo_model->getLezioniByIds($session['idMaestro'], $idCorso);
		    $data['allieviLezione']=$this->Allievo_model->getAllieviByLezioniId($idLezione);
		    $data['idLezione']=$idLezione;
		    $data['allieviNonFinitiA']=$this->Allievo_model->allieviNonFinitiA($idLezione); //COUNT partecipazione allievo che non hanno finito
		    $data['allieviNonFinitiAltri']=$this->Allievo_model->allieviNonFinitiAltri($idLezione);
			$this->load->view('dragAndDrop', $data);
		}
	}
?>