<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {
		public function index(){
			$this->load->view('login');
		}
		
        public function traitementlogin()
		{
			$data['cv']=$this->Candidats->avoirCV("");
			$mail = $this->input->post('mail');
			$mdp = $this->input->post('mdp');

			$reponse = $this->Login_modele->verification_login($mail, $mdp);


			if($reponse==true){
				$this->load->view('header2',$data);
				$this->load->view('CV',$data);
				// echo $reponse;
				// echo "tongasoa";
			}
		}

		public function accueil(){
			$data['id']=$_SESSION['utilisateur'];
			$this->load->view('accueil',$data);
		}

		public function deconnection(){
			session_destroy();
			$this->load->view('login');
		}
    }
?>