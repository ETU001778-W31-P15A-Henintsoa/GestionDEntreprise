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
		// echo $iddepartement;
		$vectorBranche = $this->avoirLesBranchesAAjouter($iddepartement);
		$brancheDepartementBesoin = $this->avoirLesBesoinsParBranche($vectorBranche);
		$this->insertionBesoins($brancheDepartementBesoin);
		echo "OK";
	}

	// autres fonctions

	public function avoirLesBranchesAAjouter($idDepartement){
		$touteBrancheDepartement = $this->Generalisation->avoirTableSpecifique('branchedepartement', '*', sprintf("iddepartement='%s'", $idDepartement));
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

}
