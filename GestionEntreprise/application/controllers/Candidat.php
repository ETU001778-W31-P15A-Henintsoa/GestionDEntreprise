<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Africa/Nairobi');

class Candidat extends CI_Controller {


    // public function cv() {
    //     // $data['css'] = 'header.css'; 
    //     $data['css']='cv.css';
    //     $this->load->view('header',$data);
    //     $this->load->view('cv',$data);
    // }
                                                                                                                                                                                                                             

    public function FormulaireCV($idannonce) {
        $this->load->model('CV');
        $data['idannonce'] = $idannonce;
        $data['ville'] = $this->CV->avoirVille();
        $data['diplome'] = $this->CV->avoirDiplomes();
        $data['experience'] = $this->CV->avoirExperience();
        $data['nationnalite'] = $this->CV->avoirNationnalite();
        $data['langue'] = $this->CV->avoirLangue();
        $data['filiere'] = $this->CV->avoirFiliere();
        $data['situation'] = $this->CV->avoirSituationMatrimoile();
        $this->load->view('header');
        $this->load->view('candidatForm',$data);
    }

    public function upload($nom_image) {
        $config['upload_path'] = APPPATH . "../assets/img";
		$config['allowed_types'] = 'png|gif|jpg|jpeg|JPG|PNG|JPEG|GIF';
		$image="";
 
		$this->load->library('upload', $config);
 
		if (!$this->upload->do_upload($nom_image)) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('error', $error);
			$image=null;
		} else {
			$data = array('upload_data' => $this->upload->data());
			$d = $this->upload->data();
			$image = $d['file_name'];
		}
		return $image;
	}

    public function traitementForm() {
        $this->load->model('Candidats');
        $this->load->model('CV');

        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $adresse = $this->input->post('adresse');
        $email = $this->input->post('email');
        $dtn = $this->input->post('dtn');
        $timestamps = strtotime($dtn);
        $naissance = date("Y-m-d", $timestamps);
        $sexe = $this->input->post('sexe');
        $nationnalite = $this->input->post('nationnalite');
        $ville = $this->input->post('ville');
        $phone = $this->input->post('phone');

        $image = $this->upload('image');

        $diplome = $this->input->post('diplome');

        $diplomefile = $this->upload('diplomefile');

        $dateDiplome = $this->input->post('date');
        $timestamp = strtotime($dateDiplome);
        $obtensionDiplome = date("Y-m-d", $timestamp);

        $experience = $this->input->post('experience');
        $attestation = $this->upload('attestation');
        $certificat = $this->upload('certificat');

        $filiere = $this->input->post('filiere');
        $situation = $this->input->post('situation');
        $idannonce = $this->input->post('idannonce');

        $totalnote = $this->CV->calculNoteCandidat($idannonce,$sexe,$nationnalite,$diplome,$experience,$situation,$naissance,$filiere);
        $moyenne = $this->CV->calculerNoteMoyenne($idannonce);

        $etat;
        if($totalnote >= $moyenne) {
            $etat=1;
        }else{
            $etat=0;
        }

        $candidatID = $this->Candidats->insererCandidat($nom,$prenom,$naissance,$adresse,$email,$sexe,$ville,$phone,$image,$nationnalite,$diplome,
        $diplomefile,$obtensionDiplome,$experience,$attestation,$certificat,$filiere,$situation,$idannonce,$totalnote,$moyenne,$etat);

        $languesSelectionnees = $this->input->post('langue');
        foreach ($languesSelectionnees as $langue) {
            $this->Candidats->insererLangueCandidat($candidatID,$langue);
        }

        redirect("annonce_controller/afficherTous");

    }

    public function detailsCV($idCandidat) {
        $data['cv']=$this->Candidats->avoirCV($idCandidat);
        $this->load->view('header2');
        $this->load->view('DetailsCV',$data);
    }

}

?>