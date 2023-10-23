<?php
class Employe extends CI_Model {
    public function verifierRetraite($employe){
        date_default_timezone_set('Africa/Nairobi');
        $aujourdui=date('Y-m-d');
     //   $datesuivant=$date->add(new DateInterval('PT' . $duree . 'M')); // ilay heure ampiana ny duree entretien iray
       // $emp=$this->Generalisation->avoirTableSpecifique("employe","*","idEmploye='".$idEmploye."'");
        $dn=$employe->datenaissance;
        $dateNaissance=new DateTime($dn);
        $retraite=new DateTime($dateNaissance->format('Y')."-".$dateNaissance->format('m')."-".$dateNaissance->format('d'));
        $retraite->add(new DateInterval('P60Y'));
        $emp['employe']=$employe;
        $emp['dateRetraite']=$retraite;
        $aujourdui=new DateTime(date("Y-m-d"));
        if($retraite<$aujourdui){
            $emp['messageRetraite']="cette Employe devrait etre en retraite";
        }else{
           $diff = $retraite->diff($aujourdui);
            $emp['messageRetraite']="";
        }
        return $emp;
    }

    public function avoirListeEmploye($iddepartement){
        $tousLesEmployes=$this->Generalisation->avoirTableSpecifique("v_employePoste","*","iddepartement='".$iddepartement."'");
        $affichageEmp=array();
        for($i=0;$i<count($tousLesEmployes);$i++){
            $affichageEmp[$i]=$this->verifierRetraite($tousLesEmployes[$i]);
        }
        return $affichageEmp;
    }

}
