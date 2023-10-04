<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$data['departement'] = $this->Generalisation->avoirTable("departement");
		$this->load->view('index', $data);
	}

	public function formulaireBesoin(){
		$iddepartement = $this->input->post("iddepartement");
		$vectorBranche = $this->avoirLesBranchesAAjouter($iddepartement);
		$brancheDepartementBesoin = $this->avoirLesBesoinsParBranche($vectorBranche);
		// $this->insertionBesoins($brancheDepartementBesoin);
		$data['branchebesoin'] = ($vectorBranche);
		$data['diplome'] = $this->Generalisation->avoirTable("diplome");
		$data['nationnalite'] = $this->Generalisation->avoirTable("nationnalite");
		$data['filiere'] = $this->Generalisation->avoirTable("filiere");
		$data['departement'] = $this->Generalisation->avoirTableSpecifique("departement", "*", sprintf("iddepartement='%s'", $iddepartement));
		$this->load->view('criteres', $data);
	}

	public function formulaireCriteres(){
		$iddepartement = $this->input->post("iddepartement");
		$besoins = $this->criteresParBranches($iddepartement);
		var_dump($besoins);
	}


	// autres fonctions

	// BESOINS BRANCHE DEPARTEMENT (fonction formulaireBesoins)
	public function avoirLesBranchesAAjouter($idDepartement){
		$touteBrancheDepartement = $this->Generalisation->avoirTableSpecifique('v_branchedepartement', '*', sprintf("iddepartement='%s'", $idDepartement));
		$vectorBranche = array();
		for($i=0; $i<count($touteBrancheDepartement); $i++){ 
			$idbranche = $this->input->post($touteBrancheDepartement[$i]->idbranchedepartement);
			if($idbranche!=null){
				$vectorBranche[] = $touteBrancheDepartement[$i];
			}
		}
		return $vectorBranche;
	}

	public function avoirLesBesoinsParBranche($vecteurBranche){
		$brancheDepartementBesoin = array();
		$a = 0;
		for($i=0; $i<count($vecteurBranche); $i++){
			$nomBesoin = sprintf("B%s", $vecteurBranche[$i]->idbranchedepartement);
			$besoin = $this->input->post($nomBesoin);
			if($besoin!=null){
				$brancheDepartementBesoin[$a]['branche'] = $vecteurBranche[$i];
				$brancheDepartementBesoin[$a]['besoin'] = $this->input->post($nomBesoin);
				$a++;
			}
		}
		return $brancheDepartementBesoin;
	}

	public function insertionBesoins($brancheDepartementBesoin){
		for($i=0; $i<count($brancheDepartementBesoin); $i++){
			$sql = sprintf("('%s', %s)", $brancheDepartementBesoin[$i]['branche']->idbranchedepartement, $brancheDepartementBesoin[$i]['besoin']);
			$this->Generalisation->insertion('besoinpersonnelle(idbranchedepartement, njHTravail)', $sql);
		}
	}

	// CRITERES BRANCHE DEPARTEMENT (fonction formulaireCriteres)
	public function criteresParBranches($iddepartement){
		$branches = $this->avoirLesBranchesAAjouter($iddepartement);
		$besoins = array();
		$a=0;
		for($i=0; $i<count($branches); $i++){
			$besoins[$a]['diplome'] = $this->input->post(sprintf("D%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffdiplome'] = $this->input->post(sprintf("COD%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['sexe'] = $this->input->post(sprintf("S%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffsexe'] = $this->input->post(sprintf("COS%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['nationnalite'] = $this->input->post(sprintf("N%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffnationnalite'] = $this->input->post(sprintf("CON%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['experience'] = $this->input->post(sprintf("E%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffexperience'] = $this->input->post(sprintf("COE%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['filiere'] = $this->input->post(sprintf("COF%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coefffiliere'] = $this->input->post(sprintf("COF%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['pourcentage'] = $this->input->post(sprintf("COE%s", $branches[$i]->idbranchedepartement));
			$a++;
		}
		return $besoins;
	}

	public function insertionCritere(){

	}
}
