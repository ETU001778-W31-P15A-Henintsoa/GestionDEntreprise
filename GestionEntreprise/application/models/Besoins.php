<?php
class Besoins extends CI_Model {
  public function brancheDepartement($idDepartement){
    return $this->Generalisation->avoirTableSpecifique("v_branchedepartement", " * ", sprintf("iddepartement='%s'", $idDepartement));
  }

   //Fonction qui calcule le nombre de personne que l'on doit embaucher par departement par branche
   //Fonction Generale pour chaque Departement
   public function NombrePersonneNecessairDuBranche($brancheDepartement, $nombreJours){
        // $brancheDepartement = $this->Generalisation->avoirTableSpecifique('branchedepartement', '*', sprintf("idbranchedepartement='%s'", $idBrancheDepartement));
        $personnesNecessaire = $nombreJours / $brancheDepartement->nombreJourPersonne;
        return $personnesNecessaire;
   }

 	 // Insertion des besoins dans la base 
	public function insertionBesoins($brancheDepartementBesoin){
		for($i=0; $i<count($brancheDepartementBesoin); $i++){
			$sql = sprintf("('%s', %s)", $brancheDepartementBesoin[$i]['branche']->idbranchedepartement, $brancheDepartementBesoin[$i]['besoin']);
			$this->Generalisation->insertion('besoinpersonnelle(idbranchedepartement, njHTravail)', $sql);
		}
	}

  	// Avoir les besoins dernierement inseree dans la base
	public function avoirbesoins($nombre){
		$array = array();
		$lesbesoins = $this->Generalisation->avoirTable("besoinpersonnelle");

		$nombre = count($lesbesoins) - $nombre;

		for($i=$nombre; $i<count($lesbesoins); $i++){
			$array[] = $lesbesoins[$i];
		}

		return $array;
	}

	// Avoir les besoins dernierement inseree dans la base
	public function avoirVueBesoins($nombre){
		$array = array();
		$lesbesoins = $this->Generalisation->avoirTable("v_besoinpersonnelle");

		$nombre = count($lesbesoins) - $nombre;

		for($i=$nombre; $i<count($lesbesoins); $i++){
			$array[] = $lesbesoins[$i];
		}

		return $array;
	}


}
