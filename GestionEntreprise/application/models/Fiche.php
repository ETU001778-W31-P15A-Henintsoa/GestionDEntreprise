<?php
class Fiche extends CI_Model {
  
    public function avoirFichePoste($idemploye) {
        $sql = "SELECT * FROM v_fichedeposte where idemploye= ?";
        // echo $sql;
            $query = $this ->db->query($sql, array($idemploye));
            $result = $query->row_array();
            return $result;
    }

    public function avoirAvantageDepartement($idbranchedepartement) {
        $sql = "SELECT * FROM v_avantagedepartement where idbranchedepartement= ?";
        $query = $this->db->query($sql, array($idbranchedepartement));
        $result = $query->row_array();
        return $result;
    }

    public function avoirNomBranche($idbranche) {
        $sql = "SELECT libelle from branche where idbranche= ?";
        $query = $this->db->query($sql,array($idbranche));
        $result = $query->row();
        return $result;
    }

}
