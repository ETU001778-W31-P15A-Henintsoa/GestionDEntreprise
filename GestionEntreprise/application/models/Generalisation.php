<?php
class Generalisation extends CI_Model {
    //Ces Fonctions retournent des tableaux d'objet

    public function avoirTable($NomTable){
        $query = $this->db->get($NomTable); // Remplacez 'table_name' par le nom de votre table PostgreSQL
		$resultats = $query->result(); // Récupération des résultats
        $raisons = array();
        $i = 0;
		foreach ($resultats as $row) {
			$raisons[$i]=$row; // Remplacez 'column_name' par le nom de la colonne que vous souhaitez afficher
            $i+=1;
		}
        return $raisons;
    }

    public function avoirTableConditionnee($NomTable){
        $sql = "SELECT * FROM $NomTable";
        $query = $this->db->query($sql);
        $resultats = array();
        $a=0;
        foreach($query->result() as $row){
            $resultats[$a] = $row;
            $a++;
        }
        return $resultats;
    }

    public function insertion($NomTable, $values){ // Metre values comme => '(data1, data2, 'data3')' par exemple
        $sql = sprintf('insert into %s values%s',$NomTable, $values);
        $this->db->query($sql);
    }

    public function avoirTableSpecifique($NomTable, $colonnes, $conditions){
        // $sql = "SELECT $colonnes FROM $NomTable WHERE $conditions";
        $sql = "SELECT $colonnes FROM $NomTable WHERE $conditions";
        echo $sql;
        $query = $this->db->query($sql);
        $resultats = array();
        $a=0;
        foreach($query->result() as $row){
            $resultats[$a] = $row;
            $a++;
        }
        return $resultats;
    }

    public function avoirTableAutrement($NomTable, $colonnes, $conditions ){//mety hoe limit ny eo
        $sql = "SELECT $colonnes FROM $NomTable $conditions";
        $query = $this->db->query($sql);
        $resultats = array();
        $a=0;
        foreach($query->result() as $row){
            $resultats[$a] = $row;
            $a++;
        }
        return $resultats;
    }
}
