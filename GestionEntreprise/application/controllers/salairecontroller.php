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

        public function insertionPrime(){
            $idemploye=$_POST['idEmploye'];
            $typePrime=$this->Generalisation->avoirTable("typeprime");
            for ($i=0; $i <count($typePrime) ; $i++) { 
                if(isset($_POST[$typePrime[$i]->idtypeprime])){
                    $id= $typePrime[$i]->idtypeprime;
                    $date=$_POST[$id."D"];
                    $quantite=$_POST[$id."Q"];
                    $this->gestionSalaire->insertionPrime($idemploye,$id,$quantite,$date);
                }
            }
            redirect('listeController/listeEmploye');

        }

        public function etatDePaix(){
            $dateDebut=date("2023-10-01");
            $dateFin=date("2023-10-30");
        }
    }
?>