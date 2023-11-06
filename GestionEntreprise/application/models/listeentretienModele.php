<?php
class listeentretienModele extends CI_Model {
    public function getIndiceJour($listeJour,$datestr){//ilay ao am tableau , mbola string
       // $date = "2023-10-06"; // Votre date au format "YYYY-MM-DD"
      date_default_timezone_set('Africa/Nairobi');
       $date=new DateTime($datestr);
        $jour = date("l", strtotime($datestr)); // "l" donne le nom complet du jour
        for ($i=0; $i <count($listeJour) ; $i++) { 
            if(strtolower($jour)==strtolower($listeJour[$i]->nomjour)){
                return $i;
            }
        }
        return null;
    }

    public function controlerDateAvecLesPauses($listePause,$date){
        for ($i=0; $i <count($listePause) ; $i++) {
            $dateDebutPause=new DateTime($listePause[$i]->heuredebut );
            $datefinPause=new DateTime($listePause[$i]->heurefin);
            $nouveau=$date->format('Y')."-".$date->format('m')."-".$date->format('d');
            $strdebut=date($nouveau." ".$dateDebutPause->format('H:i:s'));
            $strfin=date($nouveau." ".$datefinPause->format('H:i:s'));
            $debut=new DateTime($strdebut);
            $fin=new DateTime($strfin);
           // $heureDate=$date->format('H:i:s');
            // echo $heureDebut."debut .....";
            // echo $heureFin."fin    ";
            // echo $heureDate."date";
            if($date<$debut && $date>$fin){
                return $i;
            }
            else if($date==$debut){
                return $i;
            }
        }
        return -1;
    }
    
    public function ajouterIndice($indiceMaintenant){
        if($indiceMaintenant<6){
            return $indiceMaintenant+1;
        }
        else{
            return 0;
        }
    }
    
    
    public function insererEntretien($entretien){
        $debut=$entretien['date']->format("Y-m-d")." ".$entretien['heureDebut'];
        $fin=$entretien['date']->format("Y-m-d")." ".$entretien['heureFin'];
        $valeur="(default,'".$entretien['candidat']->idcandidat."','".$debut."','".$fin."')";
        $this->Generalisation->insertion("entretien",$valeur);
    }

    public function creerUnEntretien($date,$heureDebut,$heureFin,$candidat){
        $entretien['candidat']=$candidat;
        $entretien['date']=$date;
        $entretien['heureDebut']=$heureDebut;
        $entretien['heureFin']=$heureFin;
        $this->insererEntretien($entretien);
        return $entretien;
    }

    public function changerParametre($indice,$date,$jourEntretien,$listeJour){
        $indiceJour1=$this->ajouterIndice($indice);
        $date->add(new DateInterval('P1D'));
        $jourEntretien=$listeJour[$indiceJour1];
        $datesuivant=$date->add(new DateInterval('PT' . $duree . 'M')); // ilay heure ampiana ny duree entretien iray
        $firavana=new DateTime($premierJourEntretien." ".$jourEntretien['heureFin']);
    }

    public function initierEmploiDuTemps($premierJourEntretien,$listeJour){
        $indiceJour1=$this->getIndiceJour($listeJour,$premierJourEntretien);
        $jourEntretien=$listeJour[$indiceJour1];
        $date=new DateTime($premierJourEntretien." ".$jourEntretien->heureentre);//ilay date mihitsy
        $firavana=new DateTime($premierJourEntretien." ".$jourEntretien->heurefin);
    }

    public function getEmploiDuTemps($idDepartement,$premierJourEntretien,$duree,$listeCandidat){//string ny premier jour entretien
        $listeJour=$this->Generalisation->avoirTableSpecifique("programme","*"," idDepartement='".$idDepartement."'"); //programme ao aùmpiasana; //programme ao aùmpiasana
        $pause=$this->Generalisation->avoirTable("pause","*"," idDepartement='".$idDepartement."'");
        //$this->initierEmploiDuTemps($premierJourEntretien,$listeJour);
        $indiceJour1=$this->getIndiceJour($listeJour,$premierJourEntretien);
        $jourEntretien=$listeJour[$indiceJour1];
        $date=new DateTime($premierJourEntretien." ".$jourEntretien->heureentre);//ilay date mihitsy
        $datesuivant=new DateTime($premierJourEntretien." ".$jourEntretien->heureentre);
        $firavana=new DateTime($premierJourEntretien." ".$jourEntretien->heurefin);
        $entretien=array();
        for ($i=0; $i <count($listeCandidat) ; $i++) {
            $datesuivant->add(new DateInterval('PT' . $duree . 'M')); // ilay heure ampiana ny duree entretien iray
            echo $this->controlerDateAvecLesPauses($pause,$datesuivant);
            if($datesuivant<=$firavana){
                if($this->controlerDateAvecLesPauses($pause,$datesuivant)==-1){
                    $entretien[$i]=$this->creerUnEntretien($date,$date->format('H:i:s'),$datesuivant->format('H:i:s'),$listeCandidat[$i]);
                    $date->add(new DateInterval('PT' . $duree . 'M')); // ilay heure ampiana ny duree entretien iray
                }else{
                    $p=$pause[$this->controlerDateAvecLesPauses($pause,$datesuivant)];
                    $nouveau=$date->format('Y')."-".$date->format('m')."-".$date->format('d');
                    $strdate=date($nouveau." ".$p->heurefin);
                    $date=new DateTime($strdate);
                    if($date<=$firavana){
                        $datesuivant->add(new DateInterval('PT' . $duree . 'M')); // ilay heure ampiana ny duree entretien iray
                        $entretien[$i]=$this->creerUnEntretien($date,$date->format('H:i:s'),$datesuivant->format('H:i:s'),$listeCandidat[$i]);
                        $nouveau=$date->format('Y')."-".$date->format('m')."-".$date->format('d');
                        $strdate=date($nouveau." ".$datesuivant->format('H:i:s'));
                        $date=new DateTime($strdate);
                    }else{
                        $this->changerParametre($indice,$date,$jourEntretien,$listeJour);
                        $entretien[$i]=$this->creerUnEntretien($date,$date->format('H:i:s'),$datesuivant->format('H:i:s'),$listeCandidat[$i]);         
                    }
                }
            } else{
                $this->changerParametre($indice,$date,$jourEntretien,$listeJour);
                $entretien[$i]=$this->creerUnEntretien($date,$date->format('H:i:s'),$datesuivant->format('H:i:s'),$listeCandidat[$i]);
            }
        }
        return $entretien;
    }

}
