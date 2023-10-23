<?php 
    class annonce_controller extends CI_Controller {
        public function index(){
            $session=$_SESSION['utilisateur'];
            $data['id']=$session;

            $data['besoins']=$this->Generalisation->avoirtablespecifique("v_BesoinPersonnelleAnnonceDetails","*"," texte is null and idDepartement=(select idDepartement from employe where idEmploye='".$session."')");
            $this->load->view('header2');
            $this->load->view('genererAnnonce',$data);
        }
        
        public function generer(){
            $idBesoin=$_POST['idBesoin'];
            $data['annonce']=$this->Annonce->getAllAnnonce($idBesoin);
            $this->load->view('header2');
            $this->load->view('accueil');
        }

        public function afficherTous(){
            $idemploye=$_SESSION['utilisateur'];
            $emp=$this->Generalisation->avoirTableSpecifique("v_employePoste","*", " idemploye='".$idemploye."' ");
            $this->load->view('header2');
            $data['annonces']=$this->Annonce->afficher($emp[0]->iddepartement);
            $this->load->view('afficherannonce',$data);
        }

    }

?>