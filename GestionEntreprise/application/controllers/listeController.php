<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    date_default_timezone_set('Africa/Nairobi');
    class listeController extends CI_Controller {

        public function formulaireListe(){
            $idemploye=$_SESSION['utilisateur'];
            $emp=$this->Generalisation->avoirTableSpecifique("v_brancheDepartementEmploye","*", " idemploye='".$idemploye."'");
            $data['annonce']=$this->Annonce->afficher($emp[0]->iddepartement);
            $this->load->view('header2');
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

        public function listeEmploye(){
            $idemploye=$_SESSION['utilisateur'];
            $emp=$this->Generalisation->avoirTableSpecifique("v_employePoste","*", " idemploye='".$idemploye."' ");
            $data['employe']=$this->Employe->avoirListeEmploye($emp[0]->iddepartement);
            $this->load->view('header2',$data);
            $this->load->view('listeEmploye',$data);
        }

        // public function listeConge(){
        //     $data['conge']=$this->gestionConge->avoirLesConges();
        //     $this->load->view('header2');
        //     $this->load->view('listeConge',$data);
        // }

        public function formulaireConge() {
            $data['typeConge'] = $this->gestionConge->avoirTypeConge();
            $data['demande'] = $this->gestionConge->avoirDemandeConge();
            $this->load->view('header2');
            $this->load->view('insertionConge',$data);
        }

        public function insertionConge() {
            $Debut = $this->input->post('debut');
            list($dateDebut, $heureDebut) = explode('T', $Debut);

            $Fin = $this->input->post('fin');
            list($dateFin, $heureFin) = explode('T', $Fin);

            $idDemande = $this->input->post('iddemande');
            $idTypeConge = $this->input->post('typeconge');

            $this->gestionConge->insertionConge($dateDebut,$heureDebut,$dateFin,$heureFin,$idDemande,$idTypeConge);

            redirect('listeController/listeConge/');
        }

        public function versFichePoste() {
            $idemploye = $this->input->get('idemploye');
            $data['ficheposte'] = $this->Fiche->avoirFichePoste($idemploye);
            $this->load->view('header2');
            $this->load->view('fichePoste',$data);
        }
    }
?>  