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
		// $data['departement'] = $this->Generalisation->avoirTable("departement");
		$this->load->view('index');
	}
	

	// Loading view
	public function versDemandeConge()
	{
		$erreur = $this->input->get("erreur");
		if(isset($erreur)){
			$data['erreur'] = "Vous devez soumettre votre demande de conge 15 jours avant la date de debut de votre conge";
		}
		$data['typeconge'] = $this->Generalisation->avoirTable("typeconge");
		$this->load->view('header2');
		$this->load->view('demandeconge', $data);
	}

	public function versListeConge()
	{
		$idemploye = 'emp1'; //$this->input->get('idemploye');
		$tous = $this->input->get('tous');
		$data = array();
		if($_SESSION['RH']==21){
			$data['demandeemployenonvalider'] = $this->Generalisation->avoirTableSpecifique('v_demandeconge', '*', 'etat != 21 order by nom');
			$data['demandeemployevalider'] = $this->Generalisation->avoirTableSpecifique('v_demandeconge', '*', 'etat = 21 order by nom');
		}else if($_SESSION['RH']==11){
			$departement = $this->Generalisation->avoirTableSpecifique('v_employeposte', 'iddepartement', sprintf("idemploye='%s'", $_SESSION['utilisateur']));
			$data['demandeemployenonvalider'] = $this->Generalisation->avoirTableSpecifique('v_demandeconge', '*', sprintf("iddepartement='%s' and etat!=21 order by nom", $departement[0]->iddepartement));
			$data['demandeemployevalider'] = $this->Generalisation->avoirTableSpecifique('v_demandeconge', '*', sprintf("iddepartement='%s' and etat=21 order by nom", $departement[0]->iddepartement));
		}else{
			$data['conge'] = $this->Generalisation->avoirTableSpecifique('v_congeemploye', '*', sprintf("idemploye='%s' order by debutconge", $idemploye));
			$data['demande'] = $this->Generalisation->avoirTableSpecifique('v_demandeconge', '*', sprintf("idemploye='%s' order by datedebut", $idemploye));
		}
		$this->load->view('header2');
		$this->load->view('listeconge', $data);
	}

	public function versPrimeEmploye()
	{
		$data['prime'] = $this->Generalisation->avoirTable("typeprime");
		$data['employe'] = $this->Generalisation->avoirTable("employe");
		$this->load->view('header2');
		$this->load->view('primeemploye', $data);
	}

	public function versFicheDePaix(){
		$this->load->view('header2');
		$this->load->view('fichedepaix');
	}

	public function versFormulaireBesoin()
	{
		$data['departement'] = $this->Generalisation->avoirTable("departement");
		// $this->load->view('header');
		$this->load->view('header2');
		$this->load->view('formulairebesoin', $data);
	}

	public function versFicheEvaluation()
	{
		$this->load->view('formulaireficheevaluation');
	}

	public function versAcceuil(){
		$this->load->view('acceuil');
	}

	public function versQuestionsResponses(){
		$nombre = 1;
		$data['besoin'] = $this->Besoins->avoirVueBesoins($nombre);
		$this->load->view("header2");
		$this->load->view("qr", $data);
	}

	public function versFormulaireTestCandidat(){
		$nombre = 1;
		$data['besoin'] = $this->Besoins->avoirVueBesoins($nombre);
		$data['questionreponses'] = $this->QuestionsReponses->avoirQuestionsReponses($data['besoin'][0]->idbesoin);

		// var_dump($data);

		$this->load->view("formulairetestcandidat", $data);
	}

	public function versListeEmployeEnEssaie(){
		$data['employe'] = $this->Generalisation->avoirTableSpecifique('v_employeposte', '*', 'estessaie=true');
		$this->load->view('header2');
		$this->load->view('listeemployeenessaie', $data);
	} 

	public function versContratEssaie(){
		$idemploye = $this->input->get('idemploye');
		$avoir = $this->ContratEssai->aUnContratEssai($idemploye);
		if($avoir==1){
			redirect('welcome/versMonContratEssai?idemploye='.$idemploye);
		}else{
			redirect('welcome/versCreerContratEssai?idemploye='.$idemploye);
		}
	}

	public function versMonContratEssai(){
		$idemploye = $this->input->get('idemploye');
		$data['employer'] = $this->Generalisation->avoirTableSpecifique('v_employeposte', '*', sprintf("idemploye='%s'", $idemploye));
		$data['employer'][0]->datedenaissance = $this->Generalisation->dateLisible($data['employer'][0]->datedenaissance);
		$data['contrat'] = $this->Generalisation->avoirTableSpecifique('contratessai', '*', sprintf("idemploye='%s'", $idemploye));
		$data['entreprise'] = $this->Generalisation->avoirTableSpecifique('v_departementadresse', '*', sprintf("iddepartement='%s'", $data['employer'][0]->iddepartement));
		$data['avantageNature'] = $this->Generalisation->avoirTableSpecifique('v_avantagedepartement', '*', sprintf("idbranchedepartement='%s'", $data['contrat'][0]->idbranchedepartement));
		$data['services'] = $this->Generalisation->avoirTableSpecifique('v_serviceservicescandidat', '*', sprintf("idcontratessai='%s'", $data['contrat'][0]->idcontratessai));
		$this->load->view('header2');	
		$this->load->view('moncontratessai', $data);
	}

	public function versCreerContratEssai(){
		$data['idemploye'] = $this->input->get('idemploye');
		$employe =  $this->Generalisation->avoirTableSpecifique('v_employeposte', '*', sprintf("idemploye='%s'", $this->input->get('idemploye')));
		$data['poste'] =  $this->Generalisation->avoirTableSpecifique('v_branchedepartement', '*', sprintf("iddepartement='%s'", $employe[0]->iddepartement));
		$data['service'] =  $this->Generalisation->avoirTable('service');
		$this->load->view('header2');
		$this->load->view('creationcontratessai', $data);
	}

	//Test an'ilay note Employer fotsiny
	public function versCalculeNote(){
		// $idcandidat = "CAN1";
		// $note = $this->QuestionsReponses->calculNoteTest($idcandidat);
		// echo $note;

		$candidats = $this->Generalisation->avoirTable("candidat");
		$candidatNote = $this->QuestionsReponses->calculNoteParCandidat($candidats);
		var_dump($candidatNote);
	}

	// Hijery fiche de paie
	public function versChoixFicheDePaie(){
		$data['employe'] = $this->Generalisation->avoirTable("employe");
		$this->load->view('header2');
		$this->load->view('choixfichedepaix', $data);
	}

	//Calcule et insertion des reponses du test du candidat   
	public function formulairetestcansidat(){
		$idcandidat = "CAN1";
		$idbesoin = $this->input->post('idbesoin');
		$lesquestions = $this->Generalisation->avoirTableSpecifique("questions", "*", sprintf("idbesoin='%s'", $idbesoin));
		$reponses = $this->reponseAuxQuestion($lesquestions);
		$this->QuestionsReponses->insererReponseCandidat($idcandidat, $reponses);
		echo "Okey";
		
	}

	// Insertion formnulaire besoins
	public function formulaireBesoin(){
		$iddepartement = $this->input->post("iddepartement");
		$vectorBranche = $this->avoirLesBranchesAAjouter($iddepartement);
		$brancheDepartementBesoin = $this->avoirLesBesoinsParBranche($vectorBranche);
		// $this->Besoins->insertionBesoins($brancheDepartementBesoin);
		$data['branchebesoin'] = ($vectorBranche);
		$data['diplome'] = $this->Generalisation->avoirTable("diplome");
		$data['nationnalite'] = $this->Generalisation->avoirTable("nationnalite");
		$data['filiere'] = $this->Generalisation->avoirTable("filiere");
		$data['departement'] = $this->Generalisation->avoirTableSpecifique("departement", "*", sprintf("iddepartement='%s'", $iddepartement));
		$data['experience'] = $this->Generalisation->avoirTable("experience");
		$data['situation'] = $this->Generalisation->avoirTable("situationmatrimoniale");
		// var_dump($data['experience']);
		$this->load->view('header2');
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
		// Load view manaraka
	}
	
	// Insertion donnees pour le contrat essaie
	public function formulaireContratEssai(){
		$idemploye = $this->input->post('idemploye');
		$datedebut = $this->input->post('datedebut');
		$datefin = $this->input->post('datefin');
		$salaire = $this->input->post('salaire');
		$idbranchedepartement = $this->input->post('idbranchedepartement');
		// echo $idemploye;
		// echo $datedebut;
		// echo $datefin;
		// echo $salaire;
		// echo $idbranchedepartement;
		$services = $this->lesServiceschoisis();
		// var_dump($services);
		$this->ContratEssai->InsertionContratEssaiService($idemploye, $datedebut, $datefin, $salaire, $idbranchedepartement, $services);
		redirect("welcome/versMonContratEssai?idemploye=".$idemploye);
	}

	// INsertion de demande de conge
	public function formulaireDemandeConge(){
		$matricule = $this->input->post("matricule");
		$idtypeconge = $this->input->post("idtypeconge");
		$datedebut = $this->input->post("datedebut");
		// $heuredebut = $this->input->post("heuredebut");
		$datefin = $this->input->post("datefin");
		// $heurefin = $this->input->post("heurefin");

		$datedebut = str_replace("T", " ", $datedebut);
		$datefin = str_replace("T", " ", $datefin);

		// echo $matricule;
		// echo $idtypeconge;
		// echo $datedebut;
		// echo $datefin;
		// $datedebut = $datedebut." ".$heuredebut;
		// $dateatefin." ".$heurefin;fin = $d
		$retour = $this->gestionConge->insertionDemandeConge($matricule, $idtypeconge, $datedebut, $datefin);
		if($retour==false){
			redirect("welcome/versDemandeConge?erreur=1");
		}
		// echo 'Okey';
		// Load view manaraka
	}

	// Insertion Prime Employe
	public function formulairePrimeEmploye(){

	}

	// Validation demande 
	public function validationDemandeRH(){
		$iddemande = $this->input->get('iddemande');
		$this->Generalisation->miseAJour("demandeconge", "etat=21", sprintf("iddemandeconge='%s'", $iddemande));
		if($_SESSION['RH']==21){
			redirect("welcome/versListeConge?tous=1");
		}else{
			redirect("welcome/versListeConge");
		}	}


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

	// Avoir les reponses aux questions
	public function reponseAuxQuestion($question){
		$array = array();
		for ($i=0; $i < count($question); $i++) {
			$array[$i] = $this->input->post($question[$i]->idquestion);
		}
		return $array;
	}

	// Avoir les services choisis
	public function lesServiceschoisis(){
		$services=  $this->Generalisation->avoirTable('service');
		$array=array();
		for ($i=0; $i < count($services); $i++) {
			$estla = $this->input->post($services[$i]->idservice);
			if($estla!=null){
				$array[] = $services[$i]->idservice;
			}
		}
		return $array;
	}

}
