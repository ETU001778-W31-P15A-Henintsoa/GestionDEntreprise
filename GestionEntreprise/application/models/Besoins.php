<?php
class Besoins extends CI_Model {
   //Fonction qui calcule le nombre de personne que l'on doit embaucher par departement par branche
   //Fonction Generale pour chaque Departement
   public function NombrePersonneNecessairDuBranche($idBrancheDepartement, $nombreJours){
        $brancheDepartement = $this->Generalisation->avoirTableSpecifique('$BrancheDepartement', '*', sprintf("idBrancheDepartement='%s'", $idBrancheDepartement));
        $personnesNecessaire = $nombreJours / $brancheDepartement->nombreJourPersonne;
        return $personnesNecessaire;
   }

   public function essaie(){
     echo $this->input->post('valeur');
   }
}
