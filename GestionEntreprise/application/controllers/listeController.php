<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class listeController extends CI_Controller {

        public function formulaireListe(){
            $idemploye=$_SESSION['utilisateur'];
            $emp=$this->Generalisation->avoirTableSpecifique("v_brancheDepartementEmploye","*", " idemploye='".$idemploye."'");
            $data['annonce']=$this->Annonce->afficher($emp[0]->iddepartement);
            $this->load->view('genererentretien',$data);
        }
        public function genererlisteentretien(){
            $idemploye=$_SESSION['utilisateur'];
            $idannonce=$_POST['idannonce'];
            $duree=$_POST['duree'];
            $datedebut=$_POST['datedebutentretien'];
            $iddepartement=$this->Generalisation->avoirTableSpecifique("v_brancheDepartementEmploye","*", " idemploye='".$idemploye."'");
            $candidat=$this->Generalisation->avoirTableSpecifique("v_candidatentretien","*"," iddepartement='".$iddepartement[0]->iddepartement."' and idannonce='".$idannonce."' and jour is null");
            //$listeJour=$this->Generalisation->avoirTableSpecifique("programme","*"," idDepartement='".$iddepartement[0]->iddepartement."'"); //programme ao aùmpiasana
          //  $entretien=$this->listeentretien_modele->getIndiceJour($listeJour,$datedebut);
            $entretien=$this->listeentretienModele->getEmploiDuTemps($iddepartement[0]->iddepartement,$datedebut,$duree,$candidat);
            $data["entretien"]=$entretien;
            $this->load->view('Vlisteentretien',$data);
        }

        public function listeEmploye($idDepartement){
            $idUtilisateur=$_SESSION['utilisateur'];
            $iddepartement=$this->Generalisation->avoirTableSpecifique("v_brancheDepartementEmploye"," idEmploye='".$idUtilisateur."'");
            $data['employe']=$this->Generalisation->avoirTableSpecifique("","*"," idDepartement='".$iddepartement[0]->iddepartement."'");
            $this->load->view('listeEmploye',$data);
        }

        public function listeConge(){
            date_default_timezone_set('Africa/Nairobi');
            $dateDebut=new DateTime("2023-09-12");
            $dateFin=new DateTime("2023-12-12");
            $data['conge']=$this->gestionConge->nombreJourConge($dateDebut,$dateFin,null,null,null,null);
            $this->load->view('listeConge',$data);
        }
    }
?>  