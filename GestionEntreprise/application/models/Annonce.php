<?php
class Annonce extends CI_Model {
  public function getDescriptionAnnonce($annonceParDefaut,$brancheDepartement,$entreprise){
    $annonce=$annonceParDefaut->texte;
    // var_dump($brancheDepartement);
        $annonce=str_replace("NomEntrepriseIci", $entreprise[0]->nom, $annonce);
        $annonce=str_replace("titreDuPoste", $brancheDepartement->branche, $annonce);
        $annonce=str_replace("NomPosteIci", $brancheDepartement->branche, $annonce);
        $annonce=str_replace("descriptionIci", $brancheDepartement->descriptionpost, $annonce);
        $annonce=str_replace("departementIci", $brancheDepartement->departement, $annonce);
        $annonce=str_replace("missionIci", $brancheDepartement->mission, $annonce);
        return $annonce;
  }

  public function genererDescriptionPoste($brancheDepartement,$nombrePersonne){//besoin
      $annonceParDefaut=$this->Generalisation->avoirTable("annoncepardefaut");
     // $brancheDepartement=$this->Generalisation->avoirTableSpecifique("v_besoinPersonnelle","*"," dateInsertion='".$date."' and iddepartement='".$idDepartement."'");
      $entreprise=$this->Generalisation->avoirTable("entreprise");
      $critere=$this->Generalisation->avoirTableSpecifique("v_Critere","*"," dateInsertion='".$brancheDepartement->dateinsertion."' and iddepartement='".$brancheDepartement->iddepartement."'");
      $annonceDescri=$this->getDescriptionAnnonce($annonceParDefaut[0],$brancheDepartement,$entreprise);
    //  $avantage=explode(";",$annonceParDefaut['avantage']);
      $data['critere']=$critere;
      //$data['avantage']=$avantage;
      $data['annonceDescri']=$annonceDescri;
      $data['nombrePersonne']=$nombrePersonne;
      return $data;
  }

  public function NombrePersonneNecessairDuBranche($brancheDepartement){ //nombre de personne à rescrruter pour un poste 
    // $brancheDepartement = $this->Generalisation->avoirTableSpecifique('branchedepartement', '*', sprintf("idbranchedepartement='%s'", $idBrancheDepartement));
   //var_dump($brancheDepartement);
    $personnesNecessaire = $brancheDepartement->njhtravail / $brancheDepartement->njhparpersonne;
    return $personnesNecessaire;
}

public function insererAnnonce($annonce,$idBesoin){
    $this->Generalisation->insertion('annonce',"(default,'".$idBesoin."','".$annonce['annonceDescri']."',".$annonce['nombrePersonne'].",'".$annonce['critere']."')");
  }

  public function getAllAnnonce($idBesoin){
    $besoinCauche=$this->Generalisation->avoirTableSpecifique("v_besoinPersonnelleAnnoncedetails","*"," idbesoin='".$idBesoin."'");
      $annonce=array();
      if($besoinCauche[0]->texte==null){
          $besoin=$this->Generalisation->avoirTableSpecifique("v_BesoinPersonnelleAnnonceDetails","*"," dateInsertion='".$besoinCauche[0]->dateinsertion."' and iddepartement='".$besoinCauche[0]->iddepartement."' and texte is null");
          var_dump($besoin);
          for($i=0;$i<count($besoin);$i++){
              $annonce[$i]=$this->genererDescriptionPoste($besoin[$i],$this->NombrePersonneNecessairDuBranche($besoin[$i]));
              $this->insererAnnonce($annonce[$i],$besoin[$i]->idbesoin);
            }
        }
      return $annonce;
    }      
    
    public function afficher($idDepartement){
      date_default_timezone_set('Africa/Nairobi');
      $aujourdui= date('d-m-Y');
      $annonce=array();
      if($idDepartement==""){
        $annonce=$this->Generalisation->avoirTableSpecifique("v_besoinpersonnelleannoncedetails","*","  dateFinDepot>'".$aujourdui."'");
        // $annonce=$this->Generalisation->avoirTable("v_besoinpersonnelleannoncedetails");
        
      }
      else{
        $annonce=$this->Generalisation->avoirTableSpecifique("v_besoinpersonnelleannoncedetails","*"," dateFinDepot>'".$aujourdui."' and iddepartement='".$idDepartement."'");
       // $annonce=$this->Generalisation->avoirTable("v_besoinpersonnelleannoncedetails");
      }
      return $annonce;
  }
}

//$now = new DateTime();;
//$str_datetime = $now->format('Y-m-d H:i:s');