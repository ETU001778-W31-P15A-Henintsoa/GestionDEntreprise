<?php
class Login_modele extends CI_Model {
    public function verification_login($mail, $mdp){
        $error="";
		if ($mail == "" || $mdp == "") {
			$error['error'] = "Les Champs ne doivent pas etre vides.";
			$this->load->view('login', $error);
		} else {
			$users = $this->Generalisation->avoirTable('employe');
			$test = FALSE;
			foreach ($users as $user) {
				if ($user->mail == $mail && $user->mdp == $mdp) {
					// session_start();
					$_SESSION['utilisateur'] = $user->idemploye;
					$this->load->library('session');
					return true;
				}
			}

			if ($test == FALSE) {
				$error['error'] = "Mot de passe ou mail incorrect";
				$this->load->view('login', $error);
			}
            return $error;
		}
	}
}
?>
