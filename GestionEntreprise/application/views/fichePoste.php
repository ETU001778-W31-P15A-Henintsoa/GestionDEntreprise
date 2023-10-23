<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mon Contrat Essai</title>
</head>

  
<div >
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fiche de</span> Poste</h4>

        <!-- Details Employe -->
        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Informations Personnels</h5>
                    </div>
                    <div class="card-body">
                      <p for=""><strong>Nom : </strong><?php echo $ficheposte['nom']; ?> </p>
                      <p for=""><strong>Prenoms : </strong><?php echo $ficheposte['prenom']; ?> </p>
                      <p for=""><strong>Date de naissance : </strong><?php echo $ficheposte['datenaissance']; ?> </p>
                      <p for=""><strong>Matricule :</strong><?php echo $ficheposte['matricule']; ?>  </p>
                      <p for=""><strong>Adresse :</strong><?php echo $ficheposte['adresse']; ?>  </p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Contacts</h5>
                    </div>
                    <div class="card-body">
                      <p for=""><strong>Email :</strong> <?php echo $ficheposte['mail']; ?> </p>
                      <p for=""><strong>Numero de Telephone : </strong><?php echo $ficheposte['numero']; ?> </p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Informations du poste</h5>
                    </div>
                    <div class="card-body">
                      <p for=""><strong>Date d'embauche :</strong><?php echo $ficheposte['dateembauche']; ?> </p>
                      <p for=""><strong>Departements :</strong><?php echo $ficheposte['departement']; ?>  </p>
                      <p for=""><strong>Poste : </strong><?php echo $ficheposte['branche']; ?> </p>
                      <p for=""><strong>Categorie : </strong> </p>
                      <p for=""><strong>Mission : </strong><?php echo $ficheposte['mission']; ?> </p>
                      <p for=""><strong>Salaire brute : </strong><?php echo $ficheposte['salairebrut']; ?> Ar</p>
                      <p for=""><strong>Salaire net : </strong><?php echo $ficheposte['salairenet']; ?> Ar</p>
                      <p for=""><strong>Supérieur Hiérarchique :</strong><?php echo $ficheposte['mgr']; ?>  </p>
                   </div>
                  </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Avantages en nature</h5>
                    </div>
                    <div class="card-body">
                      <h6><?php echo $ficheposte['libelle']; ?></h6>
                   </div>
                  </div>
                </div>
        </div>



    </div>
    </div>
</div>
