<?php
class Fiche extends CI_Model {
  
    public function avoirFichePoste($idemploye) {
        $sql = "SELECT * FROM v_fichedeposte where idemploye= ?";
        // echo $sql;
            $query = $this ->db->query($sql, array($idemploye));
            $result = $query->row_array();
            return $result;
    }

}
