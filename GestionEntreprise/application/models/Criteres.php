<?php
class Criteres extends CI_Model {
    // Insertion des Criteres des Branches depratements
    public function insertionCritere($besoins, $mescriteres){
		$this->Generalisation->insertion("critere(idbesoin, iddiplome, idnationnalite, idexperience, sexe, idfiliere, age, idsituation, agefin)", sprintf("('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",  $besoins->idbesoin, $mescriteres['diplome'], $mescriteres['nationnalite'], $mescriteres['experience'], $mescriteres['sexe'], $mescriteres['filiere'], $mescriteres['agedebut'], $mescriteres['situation'], $mescriteres['agefin']));
		$this->Generalisation->insertion("criterecoefficient(idbesoin, diplome, sexe, nationnalite, experience, filiere, age, pourcentagenote, situation)", sprintf("('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",  $besoins->idbesoin, $mescriteres['coeffdiplome'], $mescriteres['coeffnationnalite'], $mescriteres['coeffexperience'], $mescriteres['coeffsexe'], $mescriteres['coefffiliere'], $mescriteres['coeffage'], $mescriteres['pourcentage'], $mescriteres['coeffsituation']));
	}



}
