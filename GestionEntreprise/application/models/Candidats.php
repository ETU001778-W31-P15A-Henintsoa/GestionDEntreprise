<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class Candidats extends CI_Model{

        public function avoirIdCandidat($candidat) {
            $sql = "SELECT idcandidat FROM candidat WHERE nom = ?";
            $query = $this->db->query($sql, array($candidat));
            $row = $query->row();
        
            if ($row) {
                return $row->idcandidat;
            } else {
                return null;
            }
        }

        public function insererCandidat($nom,$prenom,$dtn,$adresse,$email,$sexe,$ville,$telephone,$photo,$nationnalite,$diplome,
        $diplomefile,$dateDiplome,$experience,$attestation,$certificat,$filiere,$situation,$idannonce,$totalnote,$moyenne,$etat) {

            $data = array (
                'nom' => $nom,
                'prenom' => $prenom,
                'datenaissance' => $dtn,
                'adresse' => $adresse,
                'email' => $email,
                'sexe' => $sexe,
                'idville' => $ville,
                'telephone' => $telephone,
                'photo' => $photo,
                'idnationnalite' => $nationnalite,
                'iddiplome' => $diplome,
                'idexperience' => $experience,
                'diplomefile' => $diplomefile,
                'datediplome' => $dateDiplome,
                'attestation' => $attestation,
                'certificat' => $certificat,
                'idfiliere' => $filiere,
                'idsituation' => $situation,
                'idannonce' => $idannonce,
                'totalnote' => $totalnote,
                'moyenne' => $moyenne,
                'etat' => $etat
            );

            if ($this->db->insert('candidat', $data)) {
                $candidatID = $this->avoirIdCandidat($nom);
                return $candidatID;
            } else {
                return NULL;
            }
        }

        public function insererLangueCandidat($candidatID,$langue) {
            $data = array (
                'idcandidat' => $candidatID,
                'idlangue' => $langue
            );

            $this->db->insert('languecandidat', $data);
        }

        public function avoirCandidatParID($idCandidat) {
            $sql = "SELECT * FROM Candidat where idcandidat= ?";
            $query = $this ->db->query($sql, array($idCandidat));
            $result = $query->row_array();
            return $result;
        }
        
    }
?>