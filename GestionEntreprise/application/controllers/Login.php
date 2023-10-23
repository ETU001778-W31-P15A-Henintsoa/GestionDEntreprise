<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {
		public function index(){
			$this->load->view('login');
		}
		
        public function traitementlogin()
		{
<<<<<<< Updated upstream
			
=======
>>>>>>> Stashed changes
			$mail = $this->input->post('mail');
			$mdp = $this->input->post('mdp');

			$reponse = $this->Login_modele->verification_login($mail, $mdp);


			if($reponse==true){
<<<<<<< Updated upstream
					redirect("listeController/listeEmploye");
=======
				$this->load->view('formulaireCandidat');
				echo $reponse;
>>>>>>> Stashed changes
			}
		}

		public function accueil(){
			$data['id']=$_SESSION['utilisateur'];
			$this->load->view('accueil',$data);
		}

		public function deconnection(){
			session_destroy();
<<<<<<< Updated upstream
			$this->load->view('index');
			// redirection('index.php');
		}
=======
			$this->load->view('login');
		}

		// public function hafa(){
		// 	$mail = $this->input->post('mail');
		// 	$mdp = $this->input->post('mdp');

		// 	$reponse = $this->Login_modele->verification_login($mail, $mdp);


		// 	if($reponse==true){
		// 		$this->load->view('formulaireCandidat');
		// 		echo $reponse;
		// 	}
		// 	// echo "tonga";
		// }
>>>>>>> Stashed changes
    }
?>