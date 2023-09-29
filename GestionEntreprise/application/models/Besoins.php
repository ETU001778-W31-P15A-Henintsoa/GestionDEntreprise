<?php
class Besoins extends CI_Model {
  public function brancheDepartement($idDepartement){
    return $this->Generalisation->avoirTableSpecifique("v_branchedepartement", " * ", sprintf("iddepartement='%s'", $idDepartement));
  }

  public function dateDisponible(){
    
  }
  

   //Fonction qui calcule le nombre de personne que l'on doit embaucher par departement par branche
   //Fonction Generale pour chaque Departement
   public function NombrePersonneNecessairDuBranche($brancheDepartement, $nombreJours){
        // $brancheDepartement = $this->Generalisation->avoirTableSpecifique('branchedepartement', '*', sprintf("idbranchedepartement='%s'", $idBrancheDepartement));
        $personnesNecessaire = $nombreJours / $brancheDepartement->nombreJourPersonne;
        return $personnesNecessaire;
   }


}
