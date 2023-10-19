<?php
class gestionConge extends CI_Model {
    function verifierDateDemande($debutconge){ // demande doit être au moins 15 jours avant le permier jour de conge
        date_default_timezone_set('Africa/Nairobi');
        $aujourdui=date("Y-m-d");
        if($aujourdui->add(new DateInterval('P15D'))<=$debutconge){
            return true;
        }
        return false;
    }

    function donnerIndiceMois($date,$listeMois){
        $jour = $date->format("F"); // "F" donne le nom complet du mois
        for ($i=0; $i <count($listeMois) ; $i++) { 
            if(strtolower($jour)==strtolower($listeMois[$i]->nommois)){
                return $i;
            }
        }
        return null;
    }

    function creerConge($idEmploye,$reste,$totalPrix){
        $conge['idEmploye']=$idEmploye;
        $conge['nombreConge']= $dateDebut->diff($dateFin);
        $conge['type']=$type;
        $conge['idDemande']=$idDemande;
        $conge['dateDebut']=$dateDebut;
        $conge['dateFin']=$dateFin;
        $conge['reste']=$reste;
        $conge['totalPrix']=$totalPrix;
        return $conge;
    }

    function creerDateIntermediaire($date,$indice,$listeMois){
        date_default_timezone_set('Africa/Nairobi');
        $jour=$listeMois[$indice];
        $nouveau=$date->format('Y')."-".$date->format('m')."-".$jour->finjour;
        $str=date($nouveau);
        $dateFinale=new DateTime($str);
        return $dateFinale;
    }

    function creerDateMoisEntreDebFin($indice,$listeMois,$jour,$annee){//ho an'ilay eo ampovoany rehefa plus de 2 mois ilay mois
        date_default_timezone_set('Africa/Nairobi');
        $mois=$listeMois[$indice];
        $str=date(strval($annee)."-".strval($mois->moisennombre)."-".strval($jour));
        $date=new DateTime($str);//atao string ilay nombre anu am base
        return $date;
    }

    function nombreJourConge($dateDebut,$dateFin,$idEmploye,$type,$idDemande,$reste){
        $listeMois=$this->Generalisation->avoirTable("jourmois");
        $indiceDebut=$this->donnerIndiceMois($dateDebut,$listeMois);
        $indiceFin=$this->donnerIndiceMois($dateFin,$listeMois);
        $equart=$indiceFin-$indiceDebut;
        $conge=array();
        if($equart==0){
            $conge[0]=$this->creerConge($idEmploye,$type,$idDemande,$dateDebut,$dateFin,$reste);
        }else if($equart==1){
            $dateFin1=$this->creerDateIntermediaire($dateDebut,$indiceDebut,$listeMois);
            $dateDebut1=$this->creerDateIntermediaire($dateFin,$indiceFin,$listeMois);
            $conge[0]=$this->creerConge($idEmploye,$type,$idDemande,$dateDebut,$dateFin1);
            $conge[1]=$this->creerConge($idEmploye,$type,$idDemande,$dateDebut1,$dateFin);
        }else{
            $j=1;
            $dateFin1=$this->creerDateIntermediaire($dateDebut,$indiceDebut,$listeMois);
            $dateDebut1=$this->creerDateIntermediaire($dateFin,$indiceFin,$listeMois);
            $conge[0]=$this->creerConge($idEmploye,$type,$idDemande,$dateDebut,$dateFin1);
            for($i=$indiceDebut+1;$i<$indiceFin;$i++){
                $deb=$this->creerDateMoisEntreDebFin($i,$listeMois,"01",strval($dateDebut->format('Y')));
                $fin=$this->creerDateMoisEntreDebFin($i,$listeMois,"30",strval($dateDebut->format('Y')));
                $conge[$j]=$this->creerConge($idEmploye,$type,$idDemande,$deb,$fin);
                $j++;
            }
            $conge[$j+1]=$this->creerConge($idEmploye,$type,$idDemande,$dateDebut1,$dateFin);
        }
       return $conge;
    }

    public function insererConge($dateHeureDebut,$dateHeureFin,$idDemandeConge,$idTypeConge){
        // $dateDebut,$heureDebut,$dateFin,$heureFin
        $dateDebut = $dateHeureDebut->format('Y-m-d H:i:s');
        $dateFin = $dateHeureFin->format('Y-m-d H:i:s');
        $valeur="(default,'".$idDemandeConge."','".$dateDebut."','".$dateFin."','".$idTypeConge."')";
        $this->Generalisation->insertion("CongeEmploye",$valeur);
    }

    public function insererCongeEmploye($idCongeEmploye,$dateHeureDebut,$dateHeureFin){
        $demande=$this->Generalisation->avoirTableSpecifique("v_demandeCongeEmploye","*"," idCongeEmploye='".$idCongeEmploye."'");
        // var_dump($demande);
        
        $retraitConge=$this->Generalisation->avoirTableSpecifique("retraitConge","*"," idEmploye='".$demande[0]->idemploye."' and  idcongeemploye is not null order by idCongeEmploye desc limit 1");
        $nombreConge=$dateHeureFin->diff($dateHeureDebut)->d;
        $reste=($retraitConge[0]->resteconge)-$nombreConge;
        $totalPris=$retraitConge[0]->totalpris+$nombreConge;
        $valeur="(default,'".$idCongeEmploye."','".$reste."','".$totalPris."','".$demande[0]->idemploye."')";
        $this->Generalisation->insertion("retraitConge",$valeur);
    }

    public function insertionConge($dateDebut,$heureDebut,$dateFin,$heureFin,$idDemande,$idTypeConge){//insertion ao am congeEmploye sy retrait
        $dateHeureDebut=new DateTime($dateDebut." ".$heureDebut);
        $dateHeureFin=new DateTime($dateFin." ".$heureFin);
        $this->insererConge($dateHeureDebut,$dateHeureFin,$idDemande,$idTypeConge);
        $dernierCongeEmp=$this->Generalisation->avoirTableAutrement("congeEmploye","*"," order by idCongeEmploye desc limit 1");
        $this->insererCongeEmploye($dernierCongeEmp[0]->idcongeemploye,$dateHeureDebut,$dateHeureFin);
    }

    public function avoirTypeConge() {
        $sql = "SELECT * FROM typeConge";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function avoirDemandeConge() {
        $sql = "SELECT * FROM demandeconge";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}

// $date1 = new DateTime('2023-10-13');
// $date2 = new DateTime('2023-11-1');

// $difference = $date1->diff($date2);

// echo $difference->days; // Affiche le nombre de jours de différence

//$now = new DateTime();;
//$str_datetime = $now->format('Y-m-d H:i:s');