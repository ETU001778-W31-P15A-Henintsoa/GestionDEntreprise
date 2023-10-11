<?php
class QuestionsReponses extends CI_Model {
    // Fonction insertion Questions
    function insererQuestionsReponses($tableau){
        // Boucle besoin
        for ($b=0; $b<count($tableau); $b++){
                // var_dump($tableau[$b]);
            // Boucle Question
            for($q=0; $q<count($tableau[$b]); $q++){
                // var_dump($tableau[$b][$q]);
                $this->Generalisation->insertion("questions(idbesoin, libelle, coefficient)", sprintf("('%s', '%s', %s)", $tableau[$b][$q]['idbesoin'], $tableau[$b][$q]['question'], $tableau[$b][$q]['coefficient']));
                $tousquestion = $this-> Generalisation->avoirTableConditionnee("questions order by idquestion");
                $this->Generalisation->insertion("reponses(idquestion , libelle, bonnereponse)", sprintf("('%s', '%s', true)", $tousquestion[count($tousquestion)-1]->idquestion, $tableau[$b][$q]['reponse']));
                $nombreautrerepponse = count($tableau[$b][$q])-4;
                // echo $nombreautrerepponse;
                for ($a=0; $a<$nombreautrerepponse; $a++){
                    $indice = "autre".($a+1);
                    // echo $indice;
                    $this->Generalisation->insertion("reponses(idquestion , libelle, bonnereponse)", sprintf("('%s', '%s', false)", $tousquestion[count($tousquestion)-1]->idquestion, $tableau[$b][$q][$indice]));
                }
            }
        }
    }

    function avoirQuestionsReponses($idbesoin){
        // var_dump($idbesoin);        
        $lesquestions = $this->Generalisation->avoirTableSpecifique("questions", "*", sprintf("idbesoin='%s'", $idbesoin));
        // var_dump($lesquestions);
        $array = array();
        for($q=0; $q<count($lesquestions); $q++){
            // var_dump($lesquestions[$q]);
            $array[$q]['question'] = $lesquestions[$q] -> libelle;
            $array[$q]['idquestion'] = $lesquestions[$q] -> idquestion;
            $reponses = $this->Generalisation->avoirTableSpecifique("reponses", "*", sprintf("idquestion='%s'", $lesquestions[$q] -> idquestion));
            shuffle($reponses);
            $array[$q]['reponses'] = $reponses;
        }
        return $array;
    }

    function insererReponseCandidat($idcandidat, $reponses){
        for($i=0; $i<count($reponses); $i++){
            $this->Generalisation->insertion("formulairetestcandidat(idcandidat, idreponse)", sprintf("('%s', '%s')", $idcandidat, $reponses[$i]));
        }
    }
    
    function calculNoteTest($idcandidat){
        $note = 0;
        $reponsesTest = $this->Generalisation->avoirTableSpecifique("v_FTCQuestionReponse", "*", sprintf("idcandidat='%s'", $idcandidat));
        for($i=0; $i<count($reponsesTest); $i++){
            $bonnereponse = $reponsesTest[$i]->bonnereponse;
            if($bonnereponse==1){
                $note += $reponsesTest[$i]->coefficient;
            }
        }
        return $note;
    }

    function calculNoteParCandidat($candidats){
        $array = array();
        for($i=0; $i<count($candidats); $i++){
            $array[$i]['candidat'] = $candidats[$i];
            $array[$i]['note'] = $this->calculNoteTest($candidats[$i]->idcandidat);
        }
        return $array;
    }

}
