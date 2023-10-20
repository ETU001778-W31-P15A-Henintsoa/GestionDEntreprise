<?php 
    if(! defined('BASEPATH')) exit('No direct script access allowed');
    class gestionBack extends CI_Model{

        public function avoirDetailsEmploye($idEmploye) {
            $sql = "SELECT * from v_employeposte";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        
    }
?>