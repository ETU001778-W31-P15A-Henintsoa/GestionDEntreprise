<?php 
      class salairecontroller extends CI_Controller {
        public function prime(){
            date_default_timezone_set('Africa/Nairobi');
            $date=date('Y-m-d');
            $dateDebut=$this->input->post('datedebut');
            $dateFin=$this->input->post('datefin');
            $idemploye=$_POST['idemploye'];
            $salaire=$this->Generalisation->avoirTableSpecifique("salaire","*"," idEmploye='".$idemploye."'");
            $data['donnee']=$this->gestionSalaire->avoirsalaire($idemploye,$salaire,$dateDebut,$dateFin);
            $data['date']=$date;
            $this->load->view('header2',$data);
            $this->load->view('fichedepaix',$data);
        }
    }
?>