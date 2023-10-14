<?php
class ContratEssai extends CI_Model {
 
public function aUnContratEssai($idemploye){
    $contrat = $this->Generalisation->avoirTableSpecifique('contratessai', "*", sprintf("idemploye='%s'", $idemploye));
    if(count($contrat)==0){
        return false;
    }
    return true;
}

public function InsertionContratEssaiService($idemploye, $datedebut, $datefin, $salaire, $idbranchedepartement, $services){
    $this->Generalisation->insertion("contratessai(idemploye, salairebrut, idbranchedepartement, datedebut, datefin)", sprintf("('%s', %s, '%s', '%s', '%s')", $idemploye, $salaire, $idbranchedepartement, $datefin, $datedebut));
    $CE = $this->Generalisation->avoirTableConditionnee("contratessai order by idcontratessai");
    for ($i=0; $i < count($services); $i++) { 
        $this->Generalisation->insertion("servicecandidat(idservice, idcontratessai)", sprintf("('%s', '%s')", $services[$i], $CE[count($CE)-1]->idcontratessai));
    }
    $S = $this->Generalisation->avoirTableSpecifique("v_serviceservicescandidat", "*", sprintf("idcontratessai='%s'", $CE[count($CE)-1]->idcontratessai));
    $moins = 0;
    for ($i=0; $i < count($S); $i++) { 
        $moins = $moins + floatval( $S[$i]->valeur); 
    }
    $salaire = floatval($salaire) - $moins;
    $this->Generalisation->MiseAJour("contratessai", sprintf("salairenet=%s", $salaire), sprintf("idcontratessai='%s'", $CE[count($CE)-1]->idcontratessai));
}

}
