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
		$this->load->view('index');
	}

	public function essayage(){
		$this->Besoins->essaie();
	}

	// autres fonctions
	public function avoirIdDepartement(){
		return $this->input->post('iddepartement');
	}

	public function avoirLesBranchesAAjouter($idDepartement){
		$touteBrancheDepartement = $this->Generalisation->avoirTableSpecifique('brancheDepartement', '*', sprintf("iddepartement='%s'", $idDepartement));
		$vectorBranche = [];
		for($i=0; $i<count($touteBrancheDepartement); $i++){
			if($this->input->post($touteBrancheDepartement[$i]->idBrancheDepartement)!=null){
				$vectorBranche[] = $touteBrancheDepartement[$i];
			}
		}
		return $vectorBranche;
	}

	public function avoirLesBesoinsParBesoins($vecteurBranche){
		$brancheDepartementBesoin = array();
		$a = 0;
		for($i=0; $i<count($vecteurBranche); $i++){
			$nomBesoin = sprintf("B%s", $vecteurBranche[$i]->idBrancheDepartement);
			if($this->$input->post($nomBesoin)!=null){
				$brancheDepartementBesoin[$a]['branche'] = $vecteurBranche[$i];
				$brancheDepartementBesoin[$a]['besoin'] = $this->$input->post($nomBesoin);
				$a++;
			}
		}
		return $brancheDepartementBesoin;
	}

	public function insertionBesoins($brancheDepartementBesoin){
		for($i=0; $i<count($brancheDepartementBesoin); $i++){
			$sql = sprintf("('%s', %s)", $brancheDepartementBesoin[$i]['branche']->idbranchedepartement, $brancheDepartementBesoin[$i]['besoin']);
			$this->Generalisation->insertion('brancheDepartement(idBrancheDepartement, nombreJours)', $sql);
		}
	}

}
