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

	// Loading view
	public function versAcceuil(){
		$this->load->view('acceuil');
	}

	public function versQuestionsResponses(){
		$nombre = 1;
		$data['besoin'] = $this->Besoins->avoirVueBesoins($nombre);
		$this->load->view("qr", $data);
	}

	public function versFormulaireTestCandidat(){
		$idutilisateur = $_SESSION["utilisateur"];
		$utilisateur = $this->Generalisation->avoirTableSpecifique("employe", "*", sprintf("idemploye='%s'", $idutilisateur));
		$this->load->view("formulairetestcandidat");
	}

	// Insertion formnulaire besoins
	public function formulaireBesoin(){
		$iddepartement = $this->input->post("iddepartement");
		$vectorBranche = $this->avoirLesBranchesAAjouter($iddepartement);
		$brancheDepartementBesoin = $this->avoirLesBesoinsParBranche($vectorBranche);
		$this->Besoins->insertionBesoins($brancheDepartementBesoin);
		$data['branchebesoin'] = ($vectorBranche);
		$data['diplome'] = $this->Generalisation->avoirTable("diplome");
		$data['nationnalite'] = $this->Generalisation->avoirTable("nationnalite");
		$data['filiere'] = $this->Generalisation->avoirTable("filiere");
		$data['departement'] = $this->Generalisation->avoirTableSpecifique("departement", "*", sprintf("iddepartement='%s'", $iddepartement));
		$data['experience'] = $this->Generalisation->avoirTable("experience");
		$data['situation'] = $this->Generalisation->avoirTable("situationmatrimoniale");
		// var_dump($data['experience']);
		$this->load->view('criteres', $data);
	}

	// Insertion formulaire criteres 
	public function formulaireCriteres(){
		$iddepartement = $this->input->post("iddepartement");
		$critereCoefficient = $this->Criteres->criteresParBranches($iddepartement);
		$besoinsentree = $this->Besoins->avoirbesoins(count($critereCoefficient));
		for($i=0; $i<count($critereCoefficient); $i++){
			$this->Criteres->insertionCritere($besoinsentree[$i], $critereCoefficient[$i]);
		}
		$this->load->view('acceuil');
	}

	//Insertion des questions et des reponses
	public function formulaireQuestionsReponses(){
		$iddepartement = $this->input->post("iddepartement");
		$existants = $this->lesbesoinsExistants($iddepartement);
		$questionsReponses = $this->receuilleDonneesQuestionsReponses($existants);
		$this->QuestionsReponses->insererQuestionsReponses($questionsReponses);
		echo 'Okey';
	}

	


	// AUTRES FONCTIONS

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

	// Les Besoins par branche
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

	// Avoir besoins Existant
	public function lesbesoinsExistants($idDepartement){
		$tousbesoins = $this->Generalisation->avoirTableSpecifique('v_besoinpersonnelle', '*', sprintf("iddepartement='%s'", $idDepartement));
		$vectorBesoins = array();
		for($i=0; $i<count($tousbesoins); $i++){ 
			$idbesoin = $this->input->post($tousbesoins[$i]->idbesoin);
			if($idbesoin!=null){
				$vectorBesoins[] = $tousbesoins[$i];
			}
		}
		return $vectorBesoins;
	}

	// CRITERES BRANCHE DEPARTEMENT (fonction formulaireCriteres)
	public function criteresParBranches($iddepartement){
		$branches = $this->avoirLesBranchesAAjouter($iddepartement);
		$besoins = array();
		$a=0;
		for($i=0; $i<count($branches); $i++){
			$besoins[$a]['idbesoin'] = $branches[$i]->idbranchedepartement;
			$besoins[$a]['diplome'] = $this->input->post(sprintf("D%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffdiplome'] = $this->input->post(sprintf("COD%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['sexe'] = $this->input->post(sprintf("S%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffsexe'] = $this->input->post(sprintf("COS%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['nationnalite'] = $this->input->post(sprintf("N%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffnationnalite'] = $this->input->post(sprintf("CON%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['experience'] = $this->input->post(sprintf("E%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffexperience'] = $this->input->post(sprintf("COE%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['filiere'] = $this->input->post(sprintf("F%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coefffiliere'] = $this->input->post(sprintf("COF%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['agedebut'] = $this->input->post(sprintf("AD%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['agefin'] = $this->input->post(sprintf("AF%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffage'] = $this->input->post(sprintf("COA%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['situation'] = $this->input->post(sprintf("M%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['coeffsituation'] = $this->input->post(sprintf("COM%s", $branches[$i]->idbranchedepartement));
			$besoins[$a]['pourcentage'] = $this->input->post("pourcentage");
			$a++;
		}
		return $besoins;
	}

	// Fonction REceuille des donnees des question
	public function receuilleDonneesQuestionsReponses($vectorBesoins){
		$array = array();
		// Boucle besoin
		for ($i=0; $i<count($vectorBesoins); $i++){
			$string = "";
			$string = $string.$vectorBesoins[$i]->idbesoin;
			
			// Boucle question
			for ($q=1; $q<6; $q++){
				$stringquestion=$string."question".$q;
				$stringreponse=$stringquestion."reponse";
				$stringcoefficient=$string."coeffquestion".$q;

				$array[$i][$q-1]['question'] = $this->input->post($stringquestion);
				$array[$i][$q-1]['reponse'] = $this->input->post($stringreponse);
				$array[$i][$q-1]['coefficient'] = $this->input->post($stringcoefficient);
				$array[$i][$q-1]['idbesoin'] = $vectorBesoins[$i]->idbesoin;
				$r=1;
				$stringautre= $stringquestion.'autre'.$r;
				$reponse = $this->input->post($stringautre);
				
				// Boucle reponse
				while($reponse!=""){
					$array[$i][$q-1]['autre'.$r] = $this->input->post($stringautre);
					$r++;
					$stringautre= $stringquestion.'autre'.$r;			
					$reponse = $this->input->post($stringautre);
				}
			}
		}
		return $array;
	}




}
