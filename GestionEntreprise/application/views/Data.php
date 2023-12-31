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
	
	public function index(){
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

	public function formulaireCriteres(){
		$iddepartement = $this->input->post("iddepartement");
		$besoins = $this->criteresParBranches($iddepartement);
		var_dump($besoins);
	}

	// autres fonctions ayant des valeurs de Retour

	// BESOINS BRANCHE DEPARTEMENT (fonction formulaireBesoins)
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
			$besoins[$a]['pourcentage'] = $this->input->post(sprintf("COE%s", $branches[$i]->idbranchedepartement));
			$a++;
		}
		return $besoins;
	}
}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Criteres </title>
</head>
<body>
    <div>
        <h3>Formulaire Criteres du Departement de <?php echo $departement[0]->nomdepartement; ?></h3>
        <form action=<?php echo site_url("welcome/formulaireCriteres"); ?> method="POST"> 
            <div>
            <input type="hidden" name="iddepartement" value="<?php echo $departement[0]->iddepartement; ?>">
            <?php
            for($i=0; $i<count($branchebesoin); $i++){ ?>
            <h4> Pour le <?php echo $branchebesoin[$i]->branche; ?> </h4>

            <input type="hidden" name="<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" value="<?php echo $branchebesoin[$i]->idbranchedepartement; ?>">

            <div>
                <select name= "D<?php echo $branchebesoin[$i]->idbranchedepartement;?>" id="">
                    <option value="">Diplome</option>
                </select>
                <input type="number" name="COD<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="S<?php echo $branchebesoin[$i]->idbranchedepartement;?>" id="">
                    <option value="">Sexe</option>
                    <option value="0">Homme</option>
                    <option value="1">Femme</option>
                </select>
                <input type="number" name="COS<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="N<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Nationnalite</option>
                </select>
                <input type="number" name="CON<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <select name="E<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" id="">
                    <option value="">Experience</option>
                </select>
                <input type="number" name="COE<?php echo $branchebesoin[$i]->idbranchedepartement; ?>" placeholder="Coefficient">
            </div>
            <div>
                <input type="number" placeholder="Pourcentage" name="pourcentage">
            </div>
            <?php } ?>
            </br>
            <div><input type="submit" value="OK"></div>

            </div>
        </form>
    </div>
    
</body>
</html>



