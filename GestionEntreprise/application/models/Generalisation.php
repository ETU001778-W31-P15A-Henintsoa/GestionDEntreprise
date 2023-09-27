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

    function insertion($NomTable, $values){ // Metre values comme => '(data1, data2, 'data3')' par exemple
        $sql = sprintf( 'insert into %s values%s',$NomTable, $values);
        $this->db->query($sql);
    }

    public function avoirTableSpecifique($NomTable, $colonnes, $conditions ){
        $this->db->select($colonnes); // Select specific columns
        $this->db->from($NomTable); // Specify the table name

        // Add WHERE conditions
        $MesConditions = explode("//", $conditions);
        foreach ($conditions as $MesConditions) {
            $separer  = explode(", ", $conditions);
            $this->db->where($separer[0], $separer[1]);
        }

        $query = $this->db->get(); // Execute the query

        if ($query->num_rows() > 0) {
            // Data found, process it
            foreach ($query->result() as $row) {
                // Access the values using column names
                echo $row->column1;
                echo $row->column2;
                echo $row->column3;
            }
        } else {
            // No data found
            echo "No records found.";
        }


    }
}
