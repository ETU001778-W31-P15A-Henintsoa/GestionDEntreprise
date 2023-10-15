<?php 
    class annonce_controller extends CI_Controller {
        public function index(){
            $session=$_SESSION['utilisateur'];
            $data['id']=$session;

            $data['besoins']=$this->Generalisation->avoirtablespecifique("v_BesoinPersonnelleAnnonceDetails","*"," texte is null and idDepartement=(select idDepartement from employe where idEmploye='".$session."')");
            $this->load->view('genererAnnonce',$data);
        }
        
        public function generer(){
            $idBesoin=$_POST['idBesoin'];
            $data['annonce']=$this->Annonce->getAllAnnonce($idBesoin);
            $this->load->view('accueil');
        }

        public function afficherTous(){
            $this->load->view('header');
            $data['annonces']=$this->Annonce->afficher("");
            $this->load->view('afficherannonce',$data);
        }

    }

?>