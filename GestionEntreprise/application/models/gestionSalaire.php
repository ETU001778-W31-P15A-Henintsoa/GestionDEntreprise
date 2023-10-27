<?php
class gestionSalaire extends CI_Model {

    // public function valeurabs($nombre){
    //     if($nombre==0){
    //         return 0;
    //     }else if($nombre>0){
    //         return $nombre;
    //     }else{
    //         return $nombre*-1;
    //     }
    // }
    // public function congeNegatifARetirer($salaireMois,$idEmploye){
    //     $aRetirer=0;
    //     $congeRetrait=$this->Generalisation->avoirTableSpecifique("retraitConge","*"," where idEmploye='".$idEmploye."'");
    //     $salaireJour=$salaireMois/30;
    //     if($congeRetrait[0]->reste<0){
    //         $aRetirer=($congeRetrait[0]->reste*-1)*$salaireHeure;

    //     }
    // }

    // public function enleverCnapsSanitaire($slr){
    //     $smig=$this->Generalisation->avoirTableAutrement("smig","*"," order by dateentre desc limit 1")[0];
    //     $plafondCnaps=($smig->valeur*8)/100;
    //     $salaire=$slr[0]->montantbrute;
    //     $cnaps=$salaire/100;
    //     $sanitaire=$salaire/100;
    //     if($cnaps>$plafondCnaps){
    //         $cnaps=$plafondCnaps;
    //     }
    //     $sal['montant']=$salaire;
    //     $sal['cnaps']=$cnaps;
    //     $sal['sanitaire']=$cnaps;
    //     $sal['heure']=number_format($sal['montant']/173.33, 2, ',', '');
    //     $sal['jour']=number_format($sal['montant']/30, 2, ',', '');
    //     $sal['imposable']=$salaire-$cnaps-$sanitaire;
    //     return $sal;
    // }

    // public function avoirValeurIrsa($intervalle,$salaire){
    //     $j=0;
    //     $indice=array();
    //     $irsa=array();
    //     //var_dump($intervalle);
    //     for ($i=0; $i <count($intervalle)-1 ; $i++) { 
    //         if($intervalle[$i]->fin<=$salaire){
    //             $irsa[$j]['debut']=$intervalle[$i]->debut;
    //             $irsa[$j]['fin']=$intervalle[$i]->fin;
    //             $irsa[$j]['montant']=(($intervalle[$i]->fin-$intervalle[$i]->debut)*$intervalle[$i]->pourcentage)/100;
    //             $irsa[$j]['pourcentage']=$intervalle[$i]->pourcentage;
    //             $j++;
    //         }
    //     }
    //     $i=count($intervalle)-1;
    //     if($intervalle[$i]->debut<$salaire){
    //         $irsa[$j]['debut']=$intervalle[$i]->debut;
    //         $irsa[$j]['fin']="";
    //         $salaireSans=$this->enleverCnapsSanitaire($salaire)['montant'];//sans sanitaire et cnaps
    //         $irsa[$j]['montant']=(($salaireSans-$intervalle[$i]->debut)*$intervalle[$i]->pourcentage)/100;
    //         $irsa[$j]['pourcentage']=$intervalle[$i]->pourcentage;
    //         $j++;
    //     }
    //     return $irsa;
    // }

    // public function sommeIrsa($irsa){
    //     $somme=0;
    //     for ($i=0; $i <count($irsa) ; $i++) { 
    //         $somme=$somme+$irsa[$i]['montant'];
    //     }
    //     return $somme;
    // }



    // public function sommeQuantitePrime($primeEmploye){
    //     $somme=0;
    //     for ($i=0; $i <count($primeEmploye) ; $i++) { 
    //         $somme=$somme+$primeEmploye[$i]->quantite;
    //     }
    //     return $somme;
    // }


    public function calculerGenPrime($nomPrime,$idEmploye,$date,$salaire,$dateDebut,$dateFin){//raha manome date izy dia izay omeny sinon today
        $mois=$date->format('n');
        $primeEmploye=$this->Generalisation->avoirTableSpecifique("v_moistypeprimeemploye","*"," idEmploye='".$idEmploye."' and libelle='".$nomPrime."' and dateprime>='".$dateDebut."'and dateprime<='".$dateFin."'");
        if(count($primeEmploye)!=0){
            $somme=$this->sommeQuantitePrime($primeEmploye);
            $prime['montant']=number_format((($primeEmploye[0]->pourcentage*($salaire/173.33))/100)*$somme, 2, ',', '');
            $prime['taux']=number_format(($primeEmploye[0]->pourcentage*($salaire/173.33))/100, 2, ',', '');
            $prime['nombre']=$somme;
            return $prime;
        }
        $prime['montant']=0;
        $prime['taux']=number_format((($primeEmploye[0]->pourcentage*($salaire/173.33))/100)*$somme, 2, ',', '');
        $prime['nombre']=0;
        return $prime;
    }

    // public function calculerGenPrime($nomPrime,$idEmploye,$date,$salaire,$dateDebut,$dateFin){//raha manome date izy dia izay omeny sinon today
    //     $mois=$date->format('n');
    //     $primeEmploye=$this->Generalisation->avoirTableSpecifique("v_moistypeprimeemploye","*"," idEmploye='".$idEmploye."' and libelle='".$nomPrime."' and dateprime>='".$dateDebut."' and dateprime<='".$dateFin."'");
    //     if(count($primeEmploye)!=0){
    //         $somme=$this->sommeQuantitePrime($primeEmploye);
    //         $prime['montant']=number_format((($primeEmploye[0]->pourcentage*($salaire/173.33))/100)*$somme, 2, ',', '');
    //         $prime['taux']=number_format(($primeEmploye[0]->pourcentage*($salaire/173.33))/100, 2, ',', '');
    //         $prime['nombre']=$somme;
    //         return $prime;
    //     }
    //     $prime['montant']=0;
    //     $prime['taux']=number_format((($primeEmploye[0]->pourcentage*($salaire/173.33))/100)*$somme, 2, ',', '');
    //     $prime['nombre']=0;
    //     return $prime;
    // }


    // public function calculerAnciennetePrime($idemploye,$date,$salaire){
    //     $employe=$this->Generalisation->avoirTableSpecifique("v_employePoste","*"," idEmploye='".$idemploye."'");
    //     $anciennete=new DateTime($employe[0]->dateembauche);
    //     $diff=$date->diff($anciennete);
    //     var_dump($diff);
    //     $ancien=$diff->y;
    //     $typeAnciennete=$this->Generalisation->avoirTableSpecifique("ancienete","*"," debut<='".$ancien."' and fin>'".$ancien."'");
    //    // var_dump($typeAnciennete);
    //     // $primeEmploye=$this->Generalisation->avoirTableSpecifique("v_moistypeprimeemploye","*"," idEmploye='".$employe."' and libelle='".$nomPrime."' and moisPrime='".$mois."' and libelle='anciennete'");
    //     // $somme=$this->sommeQuantitePrime($primeEmploye);
    //     if(count($typeAnciennete)!=0){
    //         return $typeAnciennete[0]->valeur;
    //     }
    //     return 0;
    // }

    // public function calculerPrimeRendement($idEmploye,$salaire,$date,$dateDebut,$dateFin){
    //     $salaireHeure=$salaire/173.33;
    //         $mois=$date->format('n');
    //         $primeEmploye=$this->Generalisation->avoirTableSpecifique("v_moistypeprimeemploye","*"," idEmploye='".$idEmploye."' and libelle='Prime de Rendement' and dateprime>='".$dateDebut."'and dateprime<='".$dateFin."'");
    //         $emp=$this->Generalisation->avoirTableSpecifique("v_employeposte","*"," idEmploye='".$idEmploye."'");
    //         if(count($primeEmploye)!=0 && $emp[0]->rendement!=0){
    //             $prixSurPlus=($primeEmploye[0]->quantite*$salaireHeure)/$emp[0]->rendement;
    //             return $prixSurPlus;
    //         }
    //     return 0;
    // }

    // public function calculerAutreValeur($idEmploye,$nomAutre,$dateDebut,$dateFin){
    //     $primeEmploye=$this->Generalisation->avoirTableSpecifique("autreValeurSalaire","*"," idEmploye='".$idEmploye."' and libelle='".$nomAutre."' and date>='".$dateDebut."' and date<='".$dateFin."'");
    //     if(count($primeEmploye)!=0){
    //         $autre['nombre']=$primeEmploye[0]->nombre;
    //         $autre['taux']=$primeEmploye[0]->valeur;
    //         $autre['montant']=$primeEmploye[0]->nombre*$primeEmploye[0]->valeur;
    //         return $autre;
    //     }
    //     $autre['nombre']=0;
    //     $autre['taux']=0;
    //     $autre['montant']=0;
    //     return $autre;
    // }

    // public function pourcentageSalaire($salaire,$pourcentage){
    //     return ($salaire*$pourcentage)/100;
    // }

    // public function primeDivers($idEmploye,$date,$dateDebut,$dateFin){
    //     $mois=$date->format('n');
    //     $primeEmploye=$this->Generalisation->avoirTableSpecifique("v_moistypeprimeemploye","*"," idEmploye='".$idEmploye."'and dateprime>='".$dateDebut."'and dateprime<='".$dateFin."' and libelle='Prime Diverse'");
    //     if(count($primeEmploye)!=0){
    //         return $this->sommeQuantitePrime($primeEmploye);
    //     }
    //     return 0;
    // }

    // public function tousPrime($idEmploye,$salaire,$date,$dateDebut,$dateFin){
    //     $prime['heureSup']=$this->calculerGenPrime("Heure Suplementaire 16h",$idEmploye,$date,$salaire[0]->montantbrute,$dateDebut,$dateFin);
    //     $prime['travailnuit']=$this->calculerGenPrime("Travail de nuit",$idEmploye,$date,$salaire[0]->montantbrute,$dateDebut,$dateFin);
    //     $prime['jourferier']=$this->calculerGenPrime("Travaux Jour Feries",$idEmploye,$date,$salaire[0]->montantbrute,$dateDebut,$dateFin);
    //     $prime['travailweekend']=$this->calculerGenPrime("Travail Week-End",$idEmploye,$date,$salaire[0]->montantbrute,$dateDebut,$dateFin);
    //     $prime['divers']=$this->primeDivers($idEmploye,$date,$dateDebut,$dateFin);
    //     $prime['anciennete']=$this->calculerAnciennetePrime($idEmploye,$date,$salaire[0]->montantbrute);
    //     $prime['rendement']=$this->calculerPrimeRendement($idEmploye,$salaire[0]->montantbrute,$date,$dateDebut,$dateFin);
    //     $prime['droitConge']=0;
    //     return $prime;
    // }

    // public function totalRetenus($details){
    //      $somme=$details['prime']['heureSup']['montant']+$details['prime']['travailnuit']['montant']+$details['prime']['jourferier']['montant']+$details['prime']['travailweekend']['montant']+$details['prime']['divers']+$details['prime']['anciennete']+$details['prime']['rendement']+$details['prime']['droitConge']+$details['irsa']['total']+$details['periodeanterieur']['montant']+$details['droitConge']['montant']+$details['licenciement']['montant']-$details['preavis']['montant'];
        
    //     return number_format($somme, 2, ',', '');
    // }


    public function avoirsalaire($idEmploye,$sal,$dateDebut,$dateFin){
        date_default_timezone_set('Africa/Nairobi');
        $date=new DateTime(date('Y-m-d'));
        $dDebut=new DateTime($dateDebut);
        $dfin=new DateTime($dateFin);
        $intervalleIrsa=$this->Generalisation->avoirTable("irsa");
        $employe=$this->Generalisation->avoirTableSpecifique("v_employePoste","*"," idEmploye='".$idEmploye."'");
        $salaire['prime']=$this->tousPrime($idEmploye,$sal,$date,$dateDebut,$dateFin);
        $salaire['irsa']=$this->avoirValeurIrsa($intervalleIrsa,$sal);
        $salaire['irsa']['total']=$this->sommeIrsa($salaire['irsa']);
        $salaire['salaire']=$this->enleverCnapsSanitaire($sal);
        $salaire['employe']=$employe[0];
        $ancien=$date->diff(new DateTime($employe[0]->dateembauche));
        $salaire['employe']->anciennete=$ancien->y;
        $salaire['date']=$date;
        $salaire['dateDebut']=$dateDebut;
        $salaire['dateFin']=$dateFin;
        $salaire['periodeanterieur']=$this->calculerAutreValeur($idEmploye,"periodeanterieur",$dateDebut,$dateFin);
        $salaire['droitConge']=$this->calculerAutreValeur($idEmploye,"droitConge",$dateDebut,$dateFin);
        $salaire['preavis']=$this->calculerAutreValeur($idEmploye,"preavis",$dateDebut,$dateFin);
        $salaire['licenciement']=$this->calculerAutreValeur($idEmploye,"licenciement",$dateDebut,$dateFin);
        $salaire['totalRetenus']=$this->totalRetenus($salaire);
        $salaire['aPaye']=$sal[0]->montantbrute-$salaire['totalRetenus'];
         $diffe=$dfin->diff($dDebut);
        if($diffe->d<28){
            echo "sdfghjk",
            $salaire['aPaye']=( $salaire['aPaye']/20)*$diffe->d;
        }
        // $salaire['abscence']=$this->payeAbscense($idEmploye,$sal);
        return $salaire;
    }

    public function insertionPrime($idEmploye,$typePrime,$nombre,$date){
        $valeur="(default,'".$idEmploye."','".$typePrime."',".$nombre."'".$date."')";
        $this->Generalisation->insertion("primeEmploye",$valeur);
    }

    public function payeAbscense($idEmploye,$salaire){
        $congeDernier=$this->Generalisation->avoirTableSpecifique("v_retraitCongeEmploye","*"," idEmploye='".$idEmploye."' order by idretraitconge limit 1");
        $jour=$salaire/30;
        if($congeDernier[0]->reste<0){
            $aPayer=$jour*$congeDernier[0]->reste*-1;
            $this->Generalisation->modifier("retraitConge"," reste=2.5 where idRetraitConge='".$congeDernier[0]->idretraitconge."'");
            return $aPayer;
        }
        return 0;
    }

    public function  tousFichePaix($debut,$fin,$employes){
        $salairesmois=array();
        for ($i=0; $i <count($employes) ; $i++) { 
            $salaire=$this->Generalisation->avoirTableSpecifique("salaire","*"," idEmploye='".$employes[$i]->idemploye."'");
            $salaireMois[$i]=$this->avoirsalaire($employes[$i]->idemploye,$salaire,$debut,$fin);
        }
        return $salairesmois;
    }

    // public function avoirsalaire($idEmploye,$sal,$dateDebut,$dateFin){
    //     date_default_timezone_set('Africa/Nairobi');
    //     $date=new DateTime(date('Y-m-d'));
    //     $intervalleIrsa=$this->Generalisation->avoirTable("irsa");
    //     $employe=$this->Generalisation->avoirTableSpecifique("v_employePoste","*"," idEmploye='".$idEmploye."'");
    //     $salaire['prime']=$this->tousPrime($idEmploye,$sal,$date,$dateDebut,$dateFin);
    //     $salaire['irsa']=$this->avoirValeurIrsa($intervalleIrsa,$sal);
    //     $salaire['irsa']['total']=$this->sommeIrsa($salaire['irsa']);
    //     $salaire['salaire']=$this->enleverCnapsSanitaire($sal);
    //     $salaire['employe']=$employe[0];
    //     $ancien=$date->diff(new DateTime($employe[0]->dateembauche));
    //     $salaire['employe']->anciennete=$ancien->y;
    //     $salaire['date']=$date;
    //     $salaire['dateDebut']=$dateDebut;
    //     $salaire['dateFin']=$dateFin;
    //     $salaire['periodeanterieur']=$this->calculerAutreValeur($idEmploye,"periodeanterieur",$dateDebut,$dateFin);
    //     $salaire['droitConge']=$this->calculerAutreValeur($idEmploye,"droitConge",$dateDebut,$dateFin);
    //     $salaire['preavis']=$this->calculerAutreValeur($idEmploye,"preavis",$dateDebut,$dateFin);
    //     $salaire['licenciement']=$this->calculerAutreValeur($idEmploye,"licenciement",$dateDebut,$dateFin);
    //     $salaire['totalRetenus']=$this->totalRetenus($salaire);
    //     $salaire['aPaye']=$sal[0]->montantbrute-$salaire['totalRetenus'];
    //     return $salaire;
    // }

}