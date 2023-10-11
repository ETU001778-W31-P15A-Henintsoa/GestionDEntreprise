<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class CV extends CI_Model{

        public function avoirLangue() {
            $sql = "SELECT * FROM langue";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirNationnalite() {
            $sql = "SELECT * FROM nationnalite";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirVille() {
            $sql = "SELECT * FROM Ville";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirDiplomes() {
            $sql = "SELECT * FROM diplome";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirExperience() {
            $sql = "SELECT * FROM experience";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirFiliere() {
            $sql = "SELECT * FROM filiere";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirSituationMatrimoile() {
            $sql = "SELECT * FROM situationmatrimoniale";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirCV() {
            $sql = "SELECT * FROM v_candidat";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function avoirCVCandidat($idCandidat) {
            $sql = "SELECT * FROM v_candidat where idcandidat= ?";
            $query = $this ->db->query($sql, array($idCandidat));
            $result = $query->row_array();
            return $result;
        }

        public function avoirLangueCandidat($idCandidat) {
            $sql = "SELECT * from v_languecandidat where idcandidat= ?";
            $query = $this->db->query($sql, array($idCandidat));
            $result = $query->row_array();
            return $result;
        }

        public function avoirBesoinAnnonce($idannonce) {
            $sql = "SELECT * from v_besoinpersonnelleAnnonce where idannonce=?";
            $query = $this->db->query($sql,array($idannonce));
            $result = $query->row_array();
            return $result;
        }

        public function avoirCritereBesoin($idBesoin) {
            $sql = "SELECT * from v_criterecoefficient where idbesoin=?";
            $query = $this->db->query($sql,array($idBesoin));
            $result = $query->row_array();
            return $result;
        }

        public function avoirEtatDiplome($iddiplome) {
            $sql = "SELECT * FROM diplome where iddiplome=?";
            $query = $this->db->query($sql,array($iddiplome));
            $result = $query->row_array();
            return $result;
        }

        public function avoirEtatExperience($idexperience) {
            $sql = "SELECT * FROM experience where idexperience=?";
            $query = $this->db->query($sql,array($idexperience));
            $result = $query->row_array();
            return $result;
        }

        public function calculeAge($dtn) {
            $now = new DateTime();
            $dateNaissance = new DateTime($dtn);
            $diff = $now->diff($dateNaissance);
            $age = $diff->y;
            return $age;
        }

        public function verifierAge($dtn,$idbesoin){
            $critere = $this->avoirCritereBesoin($idbesoin);
            $age = $this->calculeAge($dtn);
            $ageMin= $critere['agemin'];
            $ageMax= $critere['agemax'];
            if($age >= $ageMin && $age <= $ageMax) {
                return $critere['noteage'];
            }else{
                return 0;
            }
        }

        public function verifierSexe($sexe,$idbesoin) {
            $critere = $this->avoirCritereBesoin($idbesoin);
            if($sexe == $critere['sexe']) {
                return $critere['notesexe'];
            }else{
                return 0;
            }
        }

        public function verifierNationnalite($nationnalite,$idbesoin) {
            $critere = $this->avoirCritereBesoin($idbesoin);
            if($nationnalite == $critere['idnationnalite']) {
                return $critere['notenationnalite'];
            }else {
                return 0;
            }
        }

        public function verifierDiplome($diplome,$idbesoin) {
            $critere = $this->avoirCritereBesoin($idbesoin);
            $critereDiplome = $this->avoirEtatDiplome($critere['iddiplome']);
            $diplomeCandidat = $this->avoirEtatDiplome($diplome);
            if( $diplomeCandidat['etat'] >= $critereDiplome['etat'] ) {
                return $critere['notediplome'];
            }else {
                return 0;
            }
        }

        public function verifierExperience($experience,$idbesoin) {
            $critere = $this->avoirCritereBesoin($idbesoin);
            $critereExperience = $this->avoirEtatExperience($critere['idexperience']);
            $experiencecandidat = $this->avoirEtatExperience($experience);
            if($experiencecandidat['etat'] >= $critereExperience['etat']) {
                return $critere['noteexperience'];
            }else {
                return 0;
            }
        }

        public function verifierSituation($situation,$idbesoin) {
            $critere = $this->avoirCritereBesoin($idbesoin);
            $critereSituation = $critere['idsituation'];
            if($situation == $critereSituation) {
                return $critere['notesituation'];
            }else {
                return 0;
            }
        }

        public function verifierFiliere($filiere,$idbesoin) {
            $critere = $this->avoirCritereBesoin($idbesoin);
            $critereFiliere = $critere['idfiliere'];
            if($filiere == $critereFiliere) {
                return $critere['notefiliere'];
            }else {
                return 0;
            }
        }

        public function calculNoteCandidat($idannonce,$sexe,$nationnalite,$diplome,$experience,$situation,$dtn,$filiere) {
            $totalNote ;
            $datePostulation = date("Y-m-d");
            $besoin = $this->avoirBesoinAnnonce($idannonce);
            $idbesoin = $besoin['idbesoin'];
            $critere = $this->avoirCritereBesoin($idbesoin);
            $findepot = $critere['datefindepot'];

            $sexeNote=$this->verifierSexe($sexe,$idbesoin);
            $ageNote=$this->verifierAge($dtn,$idbesoin);
            $nationnaliteNote = $this->verifierNationnalite($nationnalite,$idbesoin);
            $diplomeNote = $this->verifierDiplome($diplome,$idbesoin);
            $experienceNote = $this->verifierExperience($experience,$idbesoin);
            $situationNote = $this->verifierSituation($situation,$idbesoin);
            $filiereNote = $this->verifierFiliere($filiere,$idbesoin);
            if($findepot < $datePostulation) {
                $totalNote = 0;
            } else {
                $totalNote = $sexeNote + $ageNote + $nationnaliteNote + $diplomeNote + $experienceNote + $situationNote + $filiereNote ;
            }

            return $totalNote;
        }

        public function calculerTotalCoefficient($idannonce) {
            $totalCoefficient;
            $besoin = $this->avoirBesoinAnnonce($idannonce);
            $idbesoin = $besoin['idbesoin'];
            $critere = $this->avoirCritereBesoin($idbesoin);
            $totalCoefficient = $critere['notesexe'] + $critere['noteage'] + $critere['notenationnalite'] + $critere['notediplome'] + 
            $critere['noteexperience'] + $critere['notesituation'] + $critere['notefiliere'];
            return $totalCoefficient;
        }

        public function calculerNoteMoyenne($idannonce) {
            $totalCoefficient = $this->calculerTotalCoefficient($idannonce);
            $besoin = $this->avoirBesoinAnnonce($idannonce);
            $idbesoin = $besoin['idbesoin'];
            $critere = $this->avoirCritereBesoin($idbesoin);
            $pourcentage = $critere['pourcentagenote'];
            $moyenne = $totalCoefficient * ($pourcentage/100);
            return $moyenne;
        }
    }
?>